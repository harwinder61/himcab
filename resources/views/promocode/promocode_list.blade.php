@extends('layouts.default')
@section('content')
<style>
form a.btn.abc.delete {
    color: #fff;
    background-color: #f44336;
    border-color: #f44336;
}
form a.btn.abc.delete i.fa.fa-trash {
    margin: 0 !important;
}
.delete-conformation-div .bg-danger {
    background-color: #9c27b0 !important;
    color: #fff;
}
.delete-conformation-div .close {
    color: #ffffff;
    text-shadow: 0 1px 0 #6c6a6a;
}
.delete-conformation-div .btn.btn-danger {
    color: #fff;
    background-color: #9c27b0;
    border-color: #9c27b0;
}
.card form {
    display: inline-block;
}
td a.btn-btn-primary {
    display: inline-block;
    margin: 0px 0px 0 15px;
}
</style>
    <div class="content">
      <div class="container-fluid">
      <div class="row">
        <a href="{{url('/createPromocode')}}" style="float: right;" >
        <i class="fa fa-plus">Add Rider</i></a>
            <div class="col-md-12">
      @if(Session::has('flash_message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  {{ Session::get('flash_message') }} 
            </div>
        @endif 
      <div class="col-md-12">
        <div class="alert-class alert-info">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Promocode Listing</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Promo Name</th>
                                <th>Promo Type</th>
                                <th>Offer</th>
                                <th>Usage Limit</th>
                                <th>Expire Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Active</td>
                                <td>Edit/Delete</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                    <div class="text-center">
                    </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   <div class="modal fade" id="user-modal">
  </div>
  <div id="DeleteModal" class="modal fade text-danger delete-conformation-div" role="dialog">
   <div class="modal-dialog" >
     <!-- Modal content-->
     <form action="" id="localDelete" method="post" >
         <div class="modal-content">
             <div class="modal-header bg-danger">
                
                <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                 <p class="text-center dltext">Are You Sure Want To Delete ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formLOcalSubmit()">Yes, Delete</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
  
  <div id="BlockModal" class="modal fade text-danger delete-conformation-div" role="dialog">
   <div class="modal-dialog" >
     <!-- Modal content-->
     <form action="" id="blockForm" method="post" >
         <div class="modal-content">
             <div class="modal-header bg-danger">
                
                 <h4 class="modal-title text-center comfirm">Block CONFIRMATION</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
                
                 <p class="text-center dltext xxx">Are You Sure Want To Block ?</p>
             </div>
             <div class="modal-footer">
                 <center>
                     <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                     <button type="submit" name="" class="btn btn-danger yess" data-dismiss="modal" onclick="formBlockSubmit()">Yes, Block</button>
                 </center>
             </div>
         </div>
     </form>
   </div>
  </div>
  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@stop