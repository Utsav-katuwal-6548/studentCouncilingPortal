@include('includes.student.header')
<div class="text-center">
   

    </div>   

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Appointments</strong>
            </div>
            <div class="card-body">

                <div id='calendar'>
                <hr>
                <div class="card-text text-sm-center">

                </div>
            </div>
        </div>
    </div>


  


@include('includes.student.footer')      
                        
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var t = <?php echo json_encode($dates);  ?>;
  var calendar = new FullCalendar.Calendar(calendarEl, {


    initialView: 'dayGridMonth',
    initialDate: '2020-09-07',
    timeFormat: 'H(:mm)', // uppercase H for 24-hour clock
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
     
    },
    events: t,
  });

  calendar.render();
});

</script>
                     
