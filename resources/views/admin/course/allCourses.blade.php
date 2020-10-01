@include('includes.header')
   <style>
.modal-backdrop {
    z-index: 1040 !important;
}
.modal-content {
    margin: 2px auto;
    z-index: 1100 !important;
}

   </style>

<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35">Course Details</h3>
        <div class="table-data__tool">
            <div class="table-data__tool-left">
            </div>
            <div class="table-data__tool-right">
                <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal"
                    data-target="#exampleModalCenter"">
                        <i class=" zmdi zmdi-plus"></i>Import CSV</button>

            </div>
        </div>
        <div class="table-responsive table-responsive-data2">
            <table id="example" class="display table table-borderless table-striped table-earning" style="width:100%">
                <thead>
                    <tr>
                        <th>Course ID </th>
                        <th>Course Short Name </th>
                        <th>Course Name</th>
                        <th>Acc Id</th>
                        <th>Term Id</th>
                        <th>Course Format</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $c)
                    <tr>
                    <td>{{$c->course_id}}</td>
                    <td>{{$c->short_name}}</td>
                    <td>{{$c->long_name}}</td>
                    <td>{{$c->account_id}}</td>
                    <td>{{$c->term_id}}</td>
                    <td>{{$c->course_format}}</td>
                    <td>{{$c->status}}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</div>


@include('includes.footer')      

<script>

$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 0, "asc" ]]
    } );
    $(".dropify").dropify();
} );

</script>
                   
  <!-- Modal -->
  <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
          <form method="post" action="/admin/importCourse" enctype="multipart/form-data">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Import Course Data</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">

                      @csrf
                      <input type="file" name="file" class="dropify" required data-allowed-file-extensions="csv" >

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Import CSV">
                  </div>
              </div>
            </form>
      </div>
  </div>
                     
