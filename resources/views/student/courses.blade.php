@include('includes.student.header')
   
<div class="row">

    @foreach($courses as $c)

    <div class="col-md-4">
        <div class="card border border-success">
        <div class="card-header">
        <strong class="card-title">{{$c->short_name}}</strong>
        </div>
        <div class="card-body">
        <p class="card-text">
            <p class="mb-4"> Course : {{$c->long_name}}</p>
        <a type="button" class="btn btn-primary" href="/getTeacherFromCourse/{{$c->course_id}}">
            <i class="fa fa-clock-o"></i>&nbsp; Book Appointment</a>
          
        </p>
        </div>
        </div>
        </div>
    @endforeach
</div>



@include('includes.student.footer')      

{{-- <script>

function setCourse(x){

    $.ajax({
        url: '/getTeacherFromCourse/'+x,
        type:"get",
        success:function(response){
            if(response == ''){
                alert("No Teacher Enrolled!");
            }
            else{
                
          
                $('#mediumModal ').modal('toggle');

          

           console.log(response);
            }
        },
    });

}




</script> --}}
                        
                    
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="mediumModalLabel">Select Teacher</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <p>
    There are three species of zebras: the plains zebra, the mountain zebra and the Grévy's zebra. The plains zebra and the mountain
    zebra belong to the subgenus Hippotigris, but Grévy's zebra is the sole species of subgenus Dolichohippus. The latter
    resembles an ass, to which it is closely related, while the former two are more horse-like. All three belong to the
    genus Equus, along with other living equids.
    </p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-primary">Confirm</button>
    </div>
    </div>
    </div>
    </div>

