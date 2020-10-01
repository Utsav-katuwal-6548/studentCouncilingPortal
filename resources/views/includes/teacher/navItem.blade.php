<li @if($title == 'Dashboard') class="active" @endif>
    <a href="/teacher/dashboard"  >
        <i class="fas fa-home"></i>Dashboard</a>
</li>

{{-- 
<li @if($title == 'My Appointment' ) class="active" @endif>
    <a href="/teacher/myAppointment" >
        <i class="fas  fa-calendar-check-o"></i>My Appointments</a>
</li> --}}

<li  @if($title == 'My Appointment'  || $title == "Pending Appointment") class="active has-sub"  @else class="has-sub" @endif>
    <a class="js-arrow" href="#">
    <i class="fas fa-calendar-check-o"></i>Appointments</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list" @if($title == 'My Appointment' || $title == "Pending Appointment" ) style="display:block" @else style="display:none"  @endif >
    <li @if($title == 'Pending Appointment' ) class="active" @endif >
    <a href="/teacher/pendingAppointment">Pending Appointments</a>
    </li>

    <li @if($title == 'My Appointment' ) class="active" @endif>
        <a href="/teacher/myAppointment" >All Appointments</a>
    </li>
    
   
    </ul>
    </li>
