<?php
session_start();
$con=mysqli_connect("localhost","root","","test");
if(isset($_POST["submit"]))
{
        $update= "UPDATE user_data SET first_name='".$_POST["first_name"]."',last_name='".$_POST["last_name"]."',email='".$_POST["email"]."' WHERE id='". $_POST["record_id"]."'";
        $result=mysqli_query($con,$update);
        header("Location:manage_users_modal.php"); 
}
if(isset($_POST["delete_user"]))
{
    $select="DELETE FROM user_data WHERE id='".$_POST['record_id']."'";
    $query=mysqli_query($con,$select);
    header("Location:manage_users_modal.php");
}
if(isset($_POST["add_user"]))
{
    $insert ="insert into user_data(first_name,last_name,email,password) values('".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".md5($_POST["password"])."')";
    $id=mysqli_query($con,$insert);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include("head_url.php")
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
                        <span class="m-0 font-weight-bold text-primary">Manage Users</span>
                            <span>
                            <button style="margin-left:450px" type="button" class="btn btn-success btn-md add_user" data-toggle="modal" data-target="#myModal_add_user">Add User</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="ghj">
                                <table class="table table-bordered" >
                                    <tr>
                                        <td>Id</td>
                                        <td>First_name</td>
                                        <td>Last_Name</td>
                                        <td align="center">Email</td>
                                        <td colspan="2" align="center">Action</td>
                                    </tr>
                                    <?php
                                        $query="select * from user_data";
                                        $result=mysqli_query($con,$query); 
                                        while($data = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($data['id'])?></td>
                                            <td id="first_name_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['first_name'])?></td>
                                            <td id="last_name_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['last_name']) ?></td>
                                            <td id="email_<?php echo $data["id"]?>"><?php echo htmlspecialchars($data['email'])?></td>
                                            <td align="center">
                                            
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-info btn-lg passingID" data-toggle="modal" data-target="#myModal">Edit</button>
                                           
                                            </td>
                                            <td align="center">
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-danger btn-lg delete_user" data-toggle="modal" data-target="#myModal_delete_user">Delete</button>  
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
                include("footer.php")
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
    <div id="myModal_add_user" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <table class="table table-bordered">
            <form method="post" action="manage_users_modal.php">
            <tr>
                <td>First_name</td>
                <td><input type="text" class="form-control form-control-user" name="first_name"></td>
            </tr>
            <tr>
                <td>Last_name</td>
                <td><input type="text" class="form-control form-control-user" name="last_name" ></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" class="form-control form-control-user"  name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password"  class="form-control form-control-user"  name="password" value=""></td>
            </tr>
            <tr>
                <input type="hidden" name=record_id value="">
                <td colspan="2" align="center"><input type="submit" id="submit" name="add_user"class="btn btn-primary btn-lg" value="Add User"></td>
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
        $(".add_user").click(function(){
            var id = $(this).attr("rel");
            $("#record_id").val(id);

        });

    });
</script>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <form method="post" action="manage_users_modal.php">
            <tr>
                <td>First_name</td>
                <td><input type="text" id="first_name" class="form-control form-control-user" name="first_name" value=""></td>
            </tr>
            <tr>
                <td>Last_name</td>
                <td><input type="text" id="last_name" class="form-control form-control-user" name="last_name" value=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" id="email" class="form-control form-control-user"  name="email" value=""></td>
            </tr>
            <tr>
                <input type="hidden" id="record_id" name=record_id value="">
                <td colspan="2" align="center"><input type="submit" id="submit" name="submit"class="btn btn-primary btn-lg" value="Update"></td>
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

        $(".passingID").click(function(){
            var id = $(this).attr("rel");
            var first_name = $("#first_name_"+id).text();
            var last_name = $("#last_name_"+id).text();
            var email = $("#email_"+id).text();
            $("#first_name").val(first_name);
            $("#last_name").val(last_name);
            $("#email").val(email);
            $("#record_id").val(id);

        });

    });
</script>



   <!-- Modal 2-->
   <div id="myModal_delete_user" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <table class="table">
            <form method="post" action="manage_users_modal.php">
            <tr>
                <h3>Are You Really Want To Delete This Category!!</h3>
            </tr>
            <input type="hidden" id="record_id2" name="record_id" value="">
            <tr>
            <td align="center">
                <input type="submit" value="Yes" name="delete_user" class="btn btn-danger btn-lg">
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
        $(".delete_user").click(function(){
            var id = $(this).attr("rel");
            $("#record_id2").val(id);

        });

    });
</script>
</body>

</html>