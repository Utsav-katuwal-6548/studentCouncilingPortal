@include('includes.teacher.header')
   
<h3 class="title-5 m-b-35"> Change Available Time</h3>
<div class="row">

   
    <div class="table-responsive table-responsive-data2">
        <form action="/teacher/updateTime" method="post">
            @csrf
            <h5>Current Time : </h5>
        <input type="text" name="time" value="{{$time1}}" class="form-control" required> <br>
        <input type="submit" class="btn btn-warning mt-4" value="Update Time">
        </form>
      
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




