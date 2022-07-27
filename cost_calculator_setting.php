<?php  include('../Connection.php');?>

<?php include('header.php'); ?>

<?php

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
       <!--  <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        <link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" /> -->
<div class="content-page">
    <!-- Start content -->
 <div class="content">

 <div class="row">
    	<div class="container">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Show Products</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Master Crafter</a>
                                        </li>
                                        <li>
                                            <a href="#">Forms </a>
                                        </li>
                                        <li class="active">
                                            Show Products
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                        		  <div class="row">
                                    <div class="container">
                <!-- <div class="col-lg-12">
         <a href="{{route('product.create"> <button class="btn btn-success waves-effect waves-light m-b-5"> <i class="fa fa-plus-square m-r-5"></i> <span>New Product</span> </button></a> </div> --> </div>
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                        <tr>
                                            
                                            <th>Product ID</th>
                                            <th>Party Name</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $QUERY = "SELECT A.*,PT.PARTY_NAME,B.STATUS_NAME,BR.NAME AS BRAND_NAME,CAT.CAT_NAME AS CATE_NAME,
                                             CL.NAME AS CLASS_NAME FROM tbl_item A 
                                             LEFT OUTER JOIN TBL_PARTY_LIST PT ON A.PARTY_CODE = PT.PARTY_CODE
                                             LEFT OUTER JOIN TBL_STATUS B ON A.STATUS_ID = B.STATUS_ID
                                             LEFT OUTER JOIN TBL_BRAND BR ON A.BRAND_ID = BR.ID
                                             LEFT OUTER JOIN TBL_CLASS CL ON A.CLASS_ID = CL.ID
                                             LEFT OUTER JOIN TBL_CATEGORY CAT ON A.CATE_ID = CAT.CAT_ID";
                                       $result = mysqli_query($conn,$QUERY); 
                                       while($row = mysqli_fetch_array($result)) {
                                       $imid=$row["ITEM_CODE"]; ?>
                                            
                                        <tr>
                                            
                                            <td><?php echo $row["ITEM_CODE"]; ?></td>
                                            <td><?php echo $row["PARTY_NAME"]; ?></td>
                                            <td><img src="upload/<?php echo $row['ITEM_IMG']; ?>" style="height:50px; width:50px"/></td>
                                            <td><?php echo $row["ITEM_NAME"]; ?></td>
                                            <td>
                                         <a href="set_calculator_rate.php?itemid=<?php echo $imid  ?>" class="btn btn-info">Set Qty</a>
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
        <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>


      <!--   <script src="plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script> -->

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


