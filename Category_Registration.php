
<?php include('../Connection.php');

if(isset($_POST['btn_save']))
{


$CAT_NAME = $_POST['txt_cate_name'];
$PARENT_CODE = $_POST['cmb_parent_category'];
$ACT_TYPE = $_POST['cmb_act_type'];
$cmb_status = $_POST['cmb_status'];
$chasisno = $_POST['txt_chasisno'];

$date = date('d-m-y h:i:s');
$machinename = getenv('COMPUTERNAME');
$ip_address = gethostbyname("www.google.com");  

$insert = "INSERT INTO tbl_category(CAT_NAME,ACT_TYPE,ACT_PARENT_CODE,STATUS_ID, CREATED_AT, ADD_IP_ADDRESS, ADD_CMP_NAME, UPDATED_AT, EDIT_IP_ADDRESS, EDIT_CMP_NAME) VALUES ( '".$CAT_NAME."','".$ACT_TYPE."','".$PARENT_CODE."','".$cmb_status."','".$date."','".$ip_address."','".$machinename."','".$date."','".$ip_address."','".$machinename."')";

    $query = mysqli_query($conn,$insert);
    
        if($query!="")
        {
          echo '<script> alert("Your Category Registered Successfully!");</script>';    
        } 
        else
        {
            echo 'Not Inserted';
        }
    }



    if(isset($_POST['btn_inactive']))
{

$CAT_ID = $_POST["txt_cate_id"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_category SET STATUS_ID = 2 , UPDATED_AT='".$date."' WHERE CAT_ID = '".$CAT_ID."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Party InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }

if(isset($_POST['btn_active']))
{

$CAT_ID = $_POST["txt_cate_id"];
$date = date('d-m-y h:i:s');

$UPDATE = "UPDATE tbl_category SET STATUS_ID = 1 , UPDATED_AT='".$date."' WHERE CAT_ID = '".$CAT_ID."'";

    $query = mysqli_query($conn,$UPDATE);
    
        if($query!="")
        {
            echo '<script> alert("Party InActive Successfully!");</script>';
        } 
        else
        {
            echo 'Not Updated';
        }
    }



if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $del="delete from tbl_category where CAT_ID='$did'";
    $run_del=mysqli_query($conn,$del);

    if($run_del)
    {
echo '<script> alert("Category Deleted");</script>';
echo '<script>window.open("Category_Registration.php","_self");</script>';
    }
    else
    {
        echo '<script> alert("Category Not Deleted");</script>';
        echo '<script>window.open("Category_Registration.php","_self");</script>';
    }
}   




if(isset($_GET['did2']))
{
    $did2=$_GET['did2'];
    $feth="select * from tbl_category where CAT_ID='$did2'";
    $run_feth=mysqli_query($conn,$feth);
    $row_feth=mysqli_fetch_array($run_feth);
    $CAT_NAMESS=$row_feth['CAT_NAME'];
} 

if(isset($_POST['supdate']))
{
    $ucat=$_POST['ucat'];
    $updates="update tbl_category set CAT_NAME='$ucat' where CAT_ID='$did2'";
    $run_updates=mysqli_query($conn,$updates);
    if($run_updates)
    {
echo '<script> alert("Category Updated");</script>';
echo '<script>window.open("Category_Registration.php","_self");</script>';
    }
    else
    {
        echo '<script> alert("Category Not Updated");</script>';
echo '<script>window.open("Category_Registration.php","_self");</script>';
    }
}

?>
 <?php include('header.php');?>
 <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />

 <div class="content-page">
                <!-- Start content -->
                <div class="content">
 <div class="row">

    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Category</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Category
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

         <?php
          if(isset($_GET['did2']))
          { ?>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" style="border:1px solid black;padding:10px">

                <div class="row">
                    <div class="col-sm-12"><center><h3>Update</h3></center></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                         <input type="text" name="ucat" class="form-control" placeholder="Category Name" value="<?php echo $CAT_NAMESS ?>">
                    </div>

                    <div class="col-sm-3">
                        <input type="submit" name="supdate" class="btn btn-info" value="Update">
                    </div>



                </div>


            </form>



         <?php } ?>

                      <form class="form-horizontal" method="post" enctype="multipart/form-data">
                
                            <div class="col-sm-12">
                                <div class="card-box">
                                   
                        			<div class="row">
                        				<div class="col-lg-12">
                        
                                                    <div class="form-group">
	                                                <div class="col-lg-6">
	                                               <input type="text" name="txt_cate_name" class="form-control" placeholder="Category Name">
	                                                </div>
                                                  <div class="col-lg-2">
                                                        <select name="cmb_act_type" class="form-control">
                                                            <option value="0">Select Type</option>
                                                             
                                                <?php
        
                                             $result1 = mysqli_query($conn,"SELECT * FROM tbl_act_type");
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    {
                                                        echo '<option value="' .$row['TYPE_CODE'] .'">' .$row['TYPE_NAME'] .'</option>';
                                                    }
                                                ?>  
                                                        </select>
                                                    </div>
                                                  <div class="col-lg-2">
                                                        <select name="cmb_parent_category" class="form-control select2">
                                                      <option value="0">Select Parent</option>
                                    
                                                  <?php
        
                                                    $result2 = mysqli_query($conn,"SELECT * FROM tbl_category where ACT_TYPE = 1 AND STATUS_ID = '1'");
                                                  
                                                    while($row1 = mysqli_fetch_array($result2)) 
                                                    {
                                                     echo '<option value="' .$row1['CAT_ID'] .'"> ' .$row1['CAT_NAME'] .'</option>';
                                                    }
                                                    
                                                ?>
                                       
                                                    </select>
                                                  </div>
                                                   <div class="col-lg-2">
                                                        <select name="cmb_status" class="form-control">
                                                           

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
                            <!-- end col-->
                    </div>
                          <div class="wrapper" align="right" >
                                                   
                                        <button type="submit" name="btn_save" style="margin-top:10px"  class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">Save</button> 
                                                
                                                </div> 
	                                        
                        				</div>
                        			</div>
                              </form>
                          </div>
                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th>Category ID</th>
                                             <th>Category Name</th>
                                              <th>Status</th>
                                              <th>Action</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <tr>
                                        	<?php  

                                        	$QUERY = "SELECT A.*,B.STATUS_NAME FROM tbl_category A 
                                        	LEFT OUTER JOIN tbl_status B ON A.STATUS_ID = B.STATUS_ID";
                                        	$result1 = mysqli_query($conn,$QUERY);
                                                    while($row = mysqli_fetch_array($result1)) 
                                                    { ?>
                                            <td><?php echo  $row["CAT_ID"] ?></td>
                                            <td><?php echo  $row["CAT_NAME"] ?></td>
                                            <td><?php echo  $row["STATUS_NAME"] ?></td>
                                           <td>
                                            <form action="" method="post">
                                                 <input type="hidden" name="txt_cate_id" value="<?php echo $row["CAT_ID"]; ?>">
                                                <?php if ($row["STATUS_ID"] == 1)  { ?>

                                                     <button  type="submit" onclick="return confirm('Are you sure want to Inactive product');" name="btn_inactive" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 "> <i class="fa fa-check-circle m-r-5"></i> In Active </button>

                                              <?php  } else { ?>
                                             <button  type="submit" onclick="return confirm('Are you sure want to active product');" name="btn_active" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> Active </button>


                                              
                                           <?php  } ?>
                                            <a href="?did=<?php echo $row["CAT_ID"] ?>" onclick="return confirm('Are you sure want to Delete Category');" class="btn btn-icon waves-effect waves-light btn-success m-b-5 "> Delete </a>

                                               <a href="?did2=<?php echo $row["CAT_ID"] ?>" class="btn btn-icon waves-effect waves-light btn-info m-b-5 "> Update </a>
                                                </form>
                                            </td>

                                          
                                           
                                   
                                        </tr> 
                                       <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <?php include('footer.php');?> 

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
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>


        <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

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
            $('#con-close-modal').on('show.bs.modal',function(event){
                var button = $(event.relatedTarget)
                var cate_id = button.data('cate_id')
                var cname = button.data('up_catename')
                var cslug = button.data('up_cateslug')
                var cdescp = button.data('up_catedescp')
                 var brand = button.data('up_cmb_brand')
                  var image = button.data('up_image')
                var modal = $(this)
                modal.find('.modal-body #up_catename').val(cname);
                modal.find('.modal-body #up_cateslug').val(cslug);
                modal.find('.modal-body #up_catedescp').val(cdescp);
                modal.find('.modal-body #up_cmb_category').val(cate_id); 
                modal.find('.modal-body #up_cmb_brand').val(brand);
                modal.find('.modal-body #up_image').val(image);                    
                modal.find('.modal-body #cate_id').val(cate_id);
            });
        </script>
          <script type="text/javascript">
  function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
    </script>
@endsection

