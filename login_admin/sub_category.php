<?php
session_start();
$con=mysqli_connect("localhost","root","","test");
if(isset($_POST["update_subcat"]))
{
        $update= "UPDATE sub_cat SET subcat_name='".$_POST["subcat_name"]."'";
        $result=mysqli_query($con,$update);
        header("Location:sub_category.php"); 
}
if(isset($_POST["delete_subcat"]))
{
    $select="DELETE FROM sub_cat WHERE id='".$_POST['record_id']."'";
    $query=mysqli_query($con,$select);
    header("Location:sub_category.php");
}
if(isset($_POST["add_subcat"]))
{
    $insert ="insert into sub_cat (subcat_name,cat_id) values('".$_POST["subcat_add"]."','".$_POST["category"]."')";
    $id=mysqli_query($con,$insert);
    header("Location:sub_category.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include("head_url.php");
?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include("side_navbar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include("top_navbar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="m-0 font-weight-bold text-primary">Sub Category</span>
                            <span>
                            <button style="margin-left:400px;" type="button" class="btn btn-success btn-md add_cat" data-toggle="modal" data-target="#myModal_add">Add Sub Category</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="ghj">
                                <table class="table table-bordered" >
                                    <tr>
                                        <td align="center">Id</td>
                                        <td align="center">sub_cat_name</td>
                                        <td align="center">cat_id</td>
                                        <td colspan="2" align="center">Action</td>
                                    </tr>
                                    <?php
                                        $query="select sub_cat.*, category.category as cat_name from sub_cat inner join category on sub_cat.cat_id = category.id";
                                        $result=mysqli_query($con,$query); 
                                        while($data = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($data['id'])?></td>
                                            <td id="sub_cat_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['subcat_name'])?></td>
                                            <td rel="<?php echo $data["cat_id"]?>" id="category_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['cat_name'])?></td>
                                            <td align="center">
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-info btn-lg update_subcat" data-toggle="modal" data-target="#myModal_update_subcat">Edit</button>
                                            </td>
                                            </td>
                                            <td align="center"> 
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-danger btn-lg delete_subcat" data-toggle="modal" data-target="#myModal_delete">Delete</button>  
                                            </td>
                                            </tr>
                                            <?php
                                        }?>
                                        </table>
                                    </div>
                            </div>  
                            </div> 
                        </div>
                        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
                include("footer.php");
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <?php
        include("footer_lib.php");
    ?>

    <!-- Modal 1-->
    <div id="myModal_add" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
            <form method="post" action="sub_category.php">
                <div class="form-group">
                    <div class="form-group">
                    Category:
                    <select name="category" class="form-group">
                    <?php 
                    $select= "select * from category";
                    $query=mysqli_query($con,$select);
                    while($result=mysqli_fetch_assoc($query)){
                        ?>
                        <option value='<?php echo $result["id"]?>'><?php echo $result["Category"]?>
                        </option>;
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    Sub_Category
                    <input type="text" class="form-control form-control-user" name="subcat_add">
                    </div>
                    <input type="submit" id="submit_cat" name="add_subcat"class="btn btn-primary btn-lg" value="Add Category">
                </div>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>







   <!-- Modal 2-->
   <div id="myModal_delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <table class="table">
            <form method="post" action="sub_category.php">
            <tr>
                <h3>Are You Really Want To Delete This Category!!</h3>
            </tr>
            <input type="hidden" class="record_id" name=record_id value="">
            <tr>
            <td align="center">
                <input type="submit" value="Yes" name="delete_subcat" class="btn btn-danger btn-lg">
            </td>
            <td align="center">
                <button type="button" data-dismiss="modal" class="btn btn-info btn-lg">No</button>
            </td>
            </tr>
            </form>
        </table>
        </div>
    </div>
    </div>
    </div>
<script>
    $(document).ready(function() {

        $(".delete_subcat").click(function(){
            var id = $(this).attr("rel");
            $(".record_id").val(id);

        });

    });
</script>







    <!-- Modal -->
<div id="myModal_update_subcat" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
            <form method="post" action="sub_category.php">
            <div class="form-group">
                    Category:
                    <select name="category" id="select" class="form-group">
                    <?php 
                    $select= "select * from category";
                    $query=mysqli_query($con,$select);
                    while($result=mysqli_fetch_assoc($query)){
                        ?>
                        <option value='<?php echo $result["id"]?>'><?php echo $result["Category"]?>
                        </option>;
                    <?php
                    }
                    ?>
                    </select>
                    </div>
                <div class="form-group">
                subcat_name
                <input type="text" id="sub_category" class="form-control form-control-user" name="subcat_name" value="">
                </div>
                <input type="hidden" class="record_id" name=record_id value="">
                <input type="submit" id="submit_cat" name="update_subcat"class="btn btn-primary btn-lg" value="Update">
            </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>
<script>
    $(document).ready(function() {

        $(".update_subcat").click(function(){
            var id =$(this).attr('rel');
            var sub_cat= $("#sub_cat_"+id).text();
            var category=$("#category_"+id).attr('rel');
            $("#sub_category").val(sub_cat);
            $("#select").val(category);
        });

    });
</script>


</body>

</html>