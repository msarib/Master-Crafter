<?php 
include('../Connection.php');
include('header.php');
?>
 <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
<div class="content-page">
    <!-- Start content -->
 <div class="content">
 <div class="row">
        <div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Brand</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Brand
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <form action="" id="userInserUpdateForm" name="userInserUpdateForm" method="POST">
                                       
                                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 id="userModel" class="modal-title">Brand</h4>
                                                </div>

                                     <div class="modal-body">
                                        <div class="row">
                                         <input type="hidden" class="form-control" name="id" id="id">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="field-1" class="control-label">Brand Name</label>
                                                  <input type="text" class="form-control" id="name" name="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Brand Status</label>
                                                               <select id="age" name="age" class="form-control">
                                                           

                                                            <option value="0">Select Status</option>
                                                             <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_status ");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {

                                                      echo '<option value="' .$row['STATUS_ID'] .'">' .$row['STATUS_NAME'] .'</option>';
                                                    }
                                                ?>
                                                        </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                                    </form>

                             <div class="row">
                              <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <button type="button" id="addNewUser" style="margin-top: -20px;" class="btn btn-success" >Add Brand</button>   
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            	
                                            <th>Brand ID</th>
                                            <th>Brand Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
                                       $result = mysqli_query($conn,"SELECT A.ID ,A.NAME,A.STATUS_ID,B.STATUS_NAME FROM tbl_brand A
                                       	LEFT OUTER JOIN TBL_STATUS B
                                       	ON A.STATUS_ID = B.STATUS_ID");

                                           while($row = mysqli_fetch_array($result)){ ?>
                                            <tr>

                                           	 <td><?php echo $row["ID"] ?></td>
                                           
                                            <td><?php echo $row["NAME"] ?></td>
                                           
                                            <td><?php echo $row["STATUS_NAME"] ?></td>
                                        
                                                  <td><a href="javascript:void(0)" data-toggle="modal" class="edit" data-idd="tbl_brand" data-id="<?php echo $row[0];?>" 
                                                 data-target="#con-close-modal" ><img src="../icons/Edit_icon.ico" style="height: 25px; width: 25px;" /></a>
                                                    
                                                    <?php if ($_SESSION['id']!=null && $_SESSION['role_id']!=null && $_SESSION['role_id'] == 1 ) { ?>
												<a href="javascript:void(0)" data-toggle="modal" class="delete" data-idd="tbl_brand" data-id="<?php echo $row[0];?>" 
                                                 data-target="#con-close-modal"><img src="../icons/Trash_icon.ico"style="height: 25px; width: 25px;" /></a>
                                                 <?php }?>
                                                  </td>
                                        </tr> 
                                    <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        
 <?php include('footer.php'); ?>
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="plugins/datatables/dataTables.colVis.js"></script>
        <script src="plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>

<script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
        </script>
        <script type="text/javascript">
$(document).ready(function($){
$('#addNewUser').click(function () {
$('#userInserUpdateForm').trigger("reset");
$('#userModel').html("Add New Brand");
$('#con-close-modal').modal('show');
});
$('body').on('click', '.edit', function () {
var id = $(this).data('id');
var idd = $(this).data('idd');
// ajax
$.ajax({
type:"POST",
url: "edit.php",
data: { id: id ,
		 idd : idd},
dataType: 'json',
success: function(res){
$('#userModel').html("Edit Brand");
$('#user-model').modal('show');
$('#id').val(res.ID);
$('#name').val(res.NAME);
$('#age').val(res.STATUS_ID);
}
});
});
$('tbody').on('click', '.delete', function () {
if (confirm("Delete Record?") == true) {
var id = $(this).data('id');
var idd = $(this).data('idd');
// ajax
$.ajax({
type:"POST",
url: "delete.php",
data: { id: id ,
		 idd : idd},
dataType: 'json',
success: function(res){
$('#name').html(res.name);
$('#age').html(res.age);
window.location.reload();
}
});
}
});

$('#userInserUpdateForm').submit(function() {
// ajax
$.ajax({
type:"POST",
url: "insert-update.php",

data: $(this).serialize(), // get all form field value in 
dataType: 'json',
success: function(res){
window.location.reload();
}
});
});
});
</script>






