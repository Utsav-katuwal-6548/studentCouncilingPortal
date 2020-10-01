@include('includes.teacher.header')



<div class="row m-t-25">
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c1">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="fas fa-calendar-check-o"></i>
                    </div>
                    <div class="text">
                        <h2>{{$pending}}</h2>
                       <a href="/teacher/pendingAppointment"><span>Pending Appointments</span></a>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c2">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                        <h2>{{$today}}</h2>
                        <span>Today's Appointments</span>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-4">
        <div class="overview-item overview-item--c3">
            <div class="overview__inner">
                <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                    </div>
                    <div class="text">
                    <h2>{{$tomorrow}}</h2>
                        <span>Tommorow Appointments</span>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    
</div>



@include('includes.teacher.footer')
