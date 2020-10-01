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
                @endif
                
        
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