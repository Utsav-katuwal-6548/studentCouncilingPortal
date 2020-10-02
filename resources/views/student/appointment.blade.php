@include('includes.student.header')
   
<h3 class="title-5 m-b-35"> My Appointment Details</h3>
<div class="row">

   
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="display table table-borderless table-striped table-earning" style="width:100%">
            <thead>
                <tr>
                    <th>Teacher</th>
                    <th>Course</th>
              
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($app as $a)
                <tr>
                <td>{{$a->teacher->full_name}}</td>
                <td>{{$a->course_id}}</td>
          
                <td>{{$a->date}}</td>
                <td>{{$a->time}}</td>
                @if($a->status == 0)
                    <td><span class="badge badge-info">Waiting For Approval</span></td>
                @elseif($a->status == 1)
                        <td> <span class="badge badge-success">Approved</span></td>
                @elseif($a->status == 2)
                        <td> <span class="badge badge-danger">Rejected</span></td>
                        @elseif($a->status == 3)
                        <td> <span class="badge badge-primary">Completed</span></td>
                        @elseif($a->status == 4)
                        <td> <span class="badge badge-secondary">Cancled</span></td>
                @endif

              
                    <td>
                            @if($a->status == 0 ||  $a->status == 1 )
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-decline-{{$a->appointment_id}}">
                                <i class="fa fa-times"></i>&nbsp; Cancel Appointment</button>
                                @endif   
                    </td>
            
                
                
        
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>



@include('includes.student.footer')      



<script>

    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
       
    } );
    
    </script>

    
@foreach ($app as $b)
<div class="modal fade" id="modal-decline-{{$b->appointment_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title">Cancel Appointment </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">Course</div>
                    <div class="col-md-8">  {{$b->course_id}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Student</div>
                    <div class="col-md-8"> {{$b->teacher->user_id}} / {{$b->teacher->full_name}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Date/ Time</div>
                    <div class="col-md-8"> {{$b->date}} / {{$b->time}} </div>
                </div>
                <div class="row">
                    <div class="col-md-4">Message</div>
                    <div class="col-md-8">{{$b->message}}  </div>
                </div>

                <form action="/student/cancel/{{$b->appointment_id}}" method="post">
                    @csrf
                        Message : 
                        <textarea name="student_reject_message" class="form-control" autofocus></textarea>
                        <button type="submit" class="btn btn-danger mt-3">Cancel Appointment</button>
                   </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach