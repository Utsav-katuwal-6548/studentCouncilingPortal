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
        Select Time : 
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