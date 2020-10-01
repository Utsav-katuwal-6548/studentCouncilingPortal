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
        <h3 class="title-5 m-b-35">User Details</h3>
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
                        <th>User_ID</th>
                        <th>Auth Provider</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td>{{$u->user_id}}</td>
                        <td>{{$u->	authentication_provider_id	}}</td>
                        <td>{{$u->first_name}}</td>
                        <td>{{$u->last_name}}</td>
                        <td>{{$u->full_name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->status}}</td>
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
          <form method="post" action="/admin/importUser" enctype="multipart/form-data">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Import User's Data</h5>
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
                     
