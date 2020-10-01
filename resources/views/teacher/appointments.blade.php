@include('includes.teacher.header')
   
<h3 class="title-5 m-b-35"> All Appointments</h3>
<div class="row">

   
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="display table table-borderless table-striped table-earning" style="width:100%">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Student</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>       
                </tr>
            </thead>
            <tbody>
                @foreach($app as $a)
                <tr>
                <td>{{$a->course_id}}</td>
                <td>{{$a->student->full_name}}</td>
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
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-centered-{{$a->appointment_id}}">
                        <i class="fa fa-eye"></i>&nbsp; View</button>
                   
                        @if($a->status == 1)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-date-time-{{$a->appointment_id}}">
                            <i class="fa fa-clock"></i>&nbsp; Change Date & Time</button>
                       
                        @endif
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


{{-- change Date and time --}}
@foreach ($app as $b)
<div class="modal fade" id="modal-date-time-{{$b->appointment_id}}" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title">Change Date & Time</h5>
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

                <form action="/teacher/updateAppointmentTime/{{$b->appointment_id}}" method="post">
                    @csrf
                       New Date : 
                       <input type="date" class="form-control" id="date" name="date" required>

                       Time : 
                       <select name="time" class="form-control" id="time" required>
                        <option value="00:00">12.00 AM</option>
                        <option value="00:30">12.30 AM</option>
                        <option value="01:00">01.00 AM</option>
                        <option value="01:30">01.30 AM</option>
                        <option value="02:00">02.00 AM</option>
                        <option value="02:30">02.30 AM</option>
                        <option value="03:00">03.00 AM</option>
                        <option value="03:30">03.30 AM</option>
                        <option value="04:00">04.00 AM</option>
                        <option value="04:30">04.30 AM</option>
                        <option value="05:00">05.00 AM</option>
                        <option value="05:30">05.30 AM</option>
                        <option value="06:00">06.00 AM</option>
                        <option value="06:30">06.30 AM</option>
                        <option value="07:00">07.00 AM</option>
                        <option value="07:30">07.30 AM</option>
                        <option value="08:00">08.00 AM</option>
                        <option value="08:30">08.30 AM</option>
                        <option value="09:00">09.00 AM</option>
                        <option value="09:30">09.30 AM</option>
                        <option value="10:00">10.00 AM</option>
                        <option value="10:30">10.30 AM</option>
                        <option value="11:00">11.00 AM</option>
                        <option value="11:30">11.30 AM</option>
                        <option value="12:00">12.00 PM</option>
                        <option value="12:30">12.30 PM</option>
                        <option value="13:00">01.00 PM</option>
                        <option value="13:30">01.30 PM</option>
                        <option value="14:00">02.00 PM</option>
                        <option value="14:30">02.30 PM</option>
                        <option value="15:00">03.00 PM</option>
                        <option value="15:30">03.30 PM</option>
                        <option value="16:00">04.00 PM</option>
                        <option value="16:30">04.30 PM</option>
                        <option value="17:00">05.00 PM</option>
                        <option value="17:30">05.30 PM</option>
                        <option value="18:00">06.00 PM</option>
                        <option value="18:30">06.30 PM</option>
                        <option value="19:00" selected="">07.00 PM</option>
                        <option value="19:30">07.30 PM</option>
                        <option value="20:00">08.00 PM</option>
                        <option value="20:30">08.30 PM</option>
                        <option value="21:00">09.00 PM</option>
                        <option value="21:30">09.30 PM</option>
                        <option value="22:00">10.00 PM</option>
                        <option value="22:30">10.30 PM</option>
                        <option value="23:00">11.00 PM</option>
                        <option value="23:30">11.30 PM</option>
                    </select>
                    Teacher Message : 
                    <textarea name="change_time_message" class="form-control" autofocus></textarea>
                        <button type="submit" class="btn btn-success mt-3">Update Appointment</button>
                   </form>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach