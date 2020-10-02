@include('includes.student.header')
<div class="text-center">
    <h4>Select Time For Appointment</h4>  
   
</div>
<h5><a href="/student/allCourses">Courses</a> / {{$courseId}} / {{$teacher->full_name}}</h5>
<br>
<form action="/finaliseAppointment" method="post">
    @csrf
<div class="row">
    <div class="col-md-5">
        Select Date: 
        <input type="date" class="form-control" id="date" name="date" required>

    </div>

    <div class="col-md-5">
        Teacher Available Time : 
        <input type="text" class="form-control"  name="time"  value="{{$time1}}" readonly>


    </div>

    <div class="col-md-2 mt-4">

    <a type="button" class="btn btn-primary" href="#" onclick="checkAvailablity('{{$teacher->user_id}}')">
            <i class="fa fa-clock-o"></i>&nbsp; Check Date Availability</a>
    </div>

   
    <div class="col-md-12">
        Enter Message 
        <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div>
        <input type="hidden" name="teacherId" value="{{$teacher->user_id}}"/>
        <input type="hidden" name="courseId" value="{{$courseId}}"/>
    </div>


    <div class="col-md-4 mt-3" >
        <button class="btn btn-success form-control"  id="finalButton" disabled >Finalise Appointment</button>
    </div>


</div>
</form>



@include('includes.student.footer')      
                        
                     
<script>

$( document ).ready(function() {
    $('#date').datepicker({minDate: 0});
});



function checkAvailablity(user_id){

var a = document.getElementById("date").value;

if(a == ''){
    alert('Select Date First!');
}
else{
  
    $.ajax({
        url: '/checkTeacherDate/'+a + '/' + user_id,
        type:"get",
        success:function(response){
            if(response == 'false'){
                alert("Not Available This Week.");
                $('#finalButton').attr( "disabled",'true' );

            }
            else{
                
          
                alert("Selected Date Is Available! Can Proceed");
                $('#finalButton').removeAttr( "disabled" );

          

        
            }
        },
    });

}



}

</script>