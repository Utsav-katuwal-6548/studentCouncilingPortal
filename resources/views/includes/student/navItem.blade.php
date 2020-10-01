<li @if($title == 'Dashboard') class="active" @endif>
    <a href="/student/dashboard"  >
        <i class="fas fa-home"></i>Dashboard</a>
</li>


<li @if($title == 'All Courses' || $title == 'Select Teacher' || $title =='Select Time') class="active" @endif>
    <a href="/student/allCourses"  >
        <i class="fas fa-book"></i>Courses</a>
</li>

<li @if($title == 'My Appointment' ) class="active" @endif>
    <a href="/student/myAppointment" >
        <i class="fas  fa-calendar-check-o"></i>My Appointment</a>
</li>
