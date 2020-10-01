@include('includes.teacher.header')
   
<h3 class="title-5 m-b-35"> Pending Appointments </h3>
<div class="row">

   
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="display table table-borderless table-striped table-earning" style="width:100%">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                  
                </tr>
            </thead>
            <tbody>
                @foreach($app as $a)
                <tr>
                <td>{{$a->student->full_name}}</td>
                <td>{{$a->course_id}}</td>
                <td>{{$a->date}}</td>
                <td>{{$a->time}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-centered-{{$a->appointment_id}}">
                        <i class="fa fa-eye"></i>&nbsp; View</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-accept-{{$a->appointment_id}}">
                        <i class="fa fa-check"></i>&nbsp; Accept</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-decline-{{$a->appointment_id}}">
                            <i class="fa fa-times"></i>&nbsp; Decline</button>   
                </td>
        
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>



@include('includes.teacher.footer')      



<script>

    $(document).ready(function() {
        $('#example').DataTable( {
            "order": [[ 3, "desc" ]]
        } );
       
    } );
    
</script>

@foreach ($app as $b)
<div class="modal fade" id="modal-centered-{{$b->appointment_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title">View Appointment Details</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">Course</div>
                    <div class="col-md-8">  {{$b->course_id}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Student</div>
                    <div class="col-md-8"> {{$b->student->user_id}} / {{$b->student->full_name}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Date/ Time</div>
                    <div class="col-md-8"> {{$b->date}} / {{$b->time}} </div>
                </div>
                <div class="row">
                    <div class="col-md-4">Message</div>
                    <div class="col-md-8">{{$b->message}}  </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach

@foreach ($app as $b)
<div class="modal fade" id="modal-accept-{{$b->appointment_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title">Accept Appointment </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">Course</div>
                    <div class="col-md-8">  {{$b->course_id}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Student</div>
                    <div class="col-md-8"> {{$b->student->user_id}} / {{$b->student->full_name}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Date/ Time</div>
                    <div class="col-md-8"> {{$b->date}} / {{$b->time}} </div>
                </div>
                <div class="row">
                    <div class="col-md-4">Message</div>
                    <div class="col-md-8">{{$b->message}}  </div>
                </div>

                <form action="/teacher/accept/{{$b->appointment_id}}" method="post">
                    @csrf
                        Teacher Message : 
                        <textarea name="teacher_message" class="form-control" autofocus></textarea>
                        <button type="submit" class="btn btn-success mt-3">Accept Appointment</button>
                   </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach


{{-- decline code here --}}

@foreach ($app as $b)
<div class="modal fade" id="modal-decline-{{$b->appointment_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title">Decline Appointment </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">Course</div>
                    <div class="col-md-8">  {{$b->course_id}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Student</div>
                    <div class="col-md-8"> {{$b->student->user_id}} / {{$b->student->full_name}}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Date/ Time</div>
                    <div class="col-md-8"> {{$b->date}} / {{$b->time}} </div>
                </div>
                <div class="row">
                    <div class="col-md-4">Message</div>
                    <div class="col-md-8">{{$b->message}}  </div>
                </div>

                <form action="/teacher/decline/{{$b->appointment_id}}" method="post">
                    @csrf
                        Teacher Message : 
                        <textarea name="teacher_message" class="form-control" autofocus></textarea>
                        <button type="submit" class="btn btn-danger mt-3">Decline Appointment</button>
                   </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach