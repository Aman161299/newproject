<?php
session_start();
$con=mysqli_connect("localhost","root","","test");
if(isset($_POST["submit_cat"]))
{
        $update= "UPDATE category SET Category='".$_POST["category"]."' WHERE id='". $_POST["record_id"]."'";
        $result=mysqli_query($con,$update);
        header("Location:category.php"); 
}
if(isset($_POST["add_cat"]))
{
        $insert ="insert into category (Category) values('".$_POST["category_add"]."')";
        $id=mysqli_query($con,$insert);
}
if(isset($_POST["delete"]))
{
    $select="DELETE FROM category WHERE id='".$_POST['record_id']."'";
    $query=mysqli_query($con,$select);
    header("Location:category.php");
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
                            <span class="m-0 font-weight-bold text-primary">Category</span>
                            <span>
                            <button style="margin-left:460px" type="button" class="btn btn-success btn-md add_cat" data-toggle="modal" data-target="#myModal_add">Add Category</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="ghj">
                                <table class="table table-bordered" >
                                    <tr>
                                        <td align="center">Id</td>
                                        <td align="center">Category</td>
                                        <td colspan="2" align="center">Action</td>
                                    </tr>
                                    <?php
                                        $query="select * from category";
                                        $result=mysqli_query($con,$query); 
                                        while($data = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($data['id'])?></td>
                                            <td id="category_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['Category'])?></td>
                                            <td align="center">
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-info btn-lg edit_cat" data-toggle="modal" data-target="#myModal_cat">Edit</button>
                                            </td>
                                            </td>
                                            <td align="center"> 
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-danger btn-lg delete" data-toggle="modal" data-target="#myModal_delete">Delete</button>  
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
            <?php
                include("footer.php");
            ?>
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
        <table class="table table-bordered">
            <form method="post" action="category.php">
            <tr>
                <td>Category</td>
                <td><input type="text" class="form-control form-control-user" name="category_add"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" id="submit_cat" name="add_cat"class="btn btn-primary btn-lg" value="Add Category"></td>
            </tr>
            </form>
        </table>
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
            <form method="post" action="category.php">
            <tr>
                <h3>Are You Really Want To Delete This Category!!</h3>
            </tr>
            <input type="hidden" id="record_id" name=record_id value="">
            <tr>
            <td align="center">
                <input type="submit" value="Yes" name="delete" class="btn btn-danger btn-lg">
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

        $(".delete").click(function(){
            var id = $(this).attr("rel");
            $("#record_id").val(id);

        });

    });
</script>











    <!-- Modal -->
<div id="myModal_cat" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <table class="table table-bordered">
            <form method="post" action="category.php">
            <tr>
                <td>Category</td>
                <td><input type="text" id="category" class="form-control form-control-user" name="category" value=""></td>
            </tr>
            <tr>
                <input type="hidden" id="record_id" name=record_id value="">
                <td colspan="2" align="center"><input type="submit" id="submit_cat" name="submit_cat"class="btn btn-primary btn-lg" value="Update"></td>
            </tr>
            </form>
        </table>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>
<script>
    $(document).ready(function() {

        $(".edit_cat").click(function(){
            var id = $(this).attr("rel");
            var category = $("#category_"+id).text();
            $("#category").val(category);
            $("#record_id").val(id);

        });

    });
</script>
</body>

</html>