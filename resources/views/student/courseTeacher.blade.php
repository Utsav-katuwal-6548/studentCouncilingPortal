@include('includes.student.header')
<div class="text-center">
    <h4>Select Teacher For Appointment</h4>  
   
</div>
<h5><a href="/student/allCourses">Courses</a> / {{$courseId}} /Select Teacher</h5>


<br>
<div class="row">
    @foreach($teachers as $t)
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-user"></i>
                <strong class="card-title pl-2">{{$t->full_name}}</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                   
                <h5 class="text-sm-center mt-2 mb-1">{{$t->full_name}}</h5>
                    <div class="location text-sm-center">
                        <i class="fa fa-mail"></i> {{$t->email}}</div>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                <a type="button" class="btn btn-primary" href="/selectTime/{{$courseId}}/{{$t->user_id}}">
                        <i class="fa fa-clock-o"></i>&nbsp; Proceed</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>



@include('includes.student.footer')      
                        
                     
