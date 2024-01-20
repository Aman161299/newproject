<?php
session_start();
$con=mysqli_connect("localhost","root","","test");

if(isset($_POST["add_product"])){
    $file_name=$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"],"assets/uploads/".$file_name);
    $select="insert into products (category,sub_category,product_name,price,quantity,description,image) values('".$_POST["category"]."','".$_POST["sub_category"]."','".$_POST["product_name"]."','".$_POST["Price"]."','".$_POST["Quantity"]."','".$_POST["Description"]."','".$file_name.
    "')";
    $query=mysqli_query($con,$select);
    header("Location:manage_product.php");

}
if(isset($_POST["delete_product"]))
{
    $select="DELETE FROM products WHERE id='".$_POST['record_id']."'";
    $query=mysqli_query($con,$select);
    header("Location:manage_product.php");
}
if(isset($_POST["update_product"]))
{
    $select="UPDATE products SET category='".$_POST["category"]."', sub_category='".$_POST["sub_category"]."', product_name='".$_POST["product_name"]."', price='".$_POST["Price"]."', quantity='".$_POST["Quantity"]."', description='".$_POST["Description"]."' WHERE id='".$_POST["record_id"]."'";
    $query=mysqli_query($con,$select);
    header("Location:manage_product.php");
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
                            <span class="m-0 font-weight-bold text-primary">Manage Product</span>
                            <span>
                            <button style="margin-left:400px;" type="button" class="btn btn-success btn-md add_cat" data-toggle="modal" data-target="#myModal_add">Add Product</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="ghj">
                                <table class="table table-bordered" >
                                    <tr>
                                        <td align="center"><b>Id</b></td>
                                        <td align="center"><b>Category</b></td>
                                        <td align="center"><b>Sub Category</b></td>
                                        <td align="center"><b>Product Name</b></td>
                                        <td align="center"><b>image</b></td>
                                        <td align="center"><b>Price</b></td>
                                        <td align="center"><b>Quatity</b></td>
                                        <td align="center"><b>Description</b></td>
                                        <td colspan="2" align="center"><b>Action</b></td>
                                    </tr>
                                    <?php
                                        $query="select products.*, category.Category, sub_cat.subcat_name from products inner join category on products.category = category.id inner join sub_cat on products.sub_category = sub_cat.id";
                                        $result=mysqli_query($con,$query); 
                                        while($data = mysqli_fetch_assoc($result)){?>
                                        <tr>
                                            <td><?php echo ($data['id'])?></td>

                                            <td id="category_<?php echo $data["id"]?>" rel="<?php echo $data["category"]?>">
                                            <?php echo($data['Category'])?></td>

                                            <td id="sub_cat_<?php echo $data["id"]?>" rel="<?php echo $data["sub_category"]?>"><?php echo($data['subcat_name'])?></td>

                                            <td id="name_<?php echo $data["id"]?>"><?php echo $data["product_name"]?>
                                            </td>

                                            <td>
                                            <?php if(!empty($data["image"])){
                                                ?>    
                                            <img src="assets/uploads/<?php echo $data["image"]?>"/>
                                            <?php
                                            }?>
                                            </td>

                                            <td id="price_<?php echo $data["id"]?>"><?php echo $data["price"]?>
                                            </td>

                                            <td id="quantity_<?php echo $data["id"]?>"><?php echo $data["quantity"]?>
                                            </td>

                                            <td id="description_<?php echo $data["id"]?>"><?php echo $data["description"]?>
                                            </td>

                                            <td align="center">
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-info btn-lg update_subcat" data-toggle="modal" data-target="#myModal_update_product">Edit</button>
                                            </td>
                                            </td>
                                            <td align="center"> 
                                            <button type="button" rel="<?php echo $data['id'] ?>" class="btn btn-danger btn-lg delete_product" data-toggle="modal" data-target="#myModal_delete">Delete</button>  
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

    <div id="myModal_add" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
            <form method="post" enctype="multipart/form-data" action="manage_product.php">
                <div class="form-group">
                    <lable>
                    Category:
                    </lable>
                    <select name="category" class="form-control category">
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
                    <lable>
                    Sub Category:
                    </lable>
                    <select name="sub_category" class="form-control sub_cat">
                    
                    </select>
                        <lable>
                        Product Name:
                        </lable>
                        <input type="text" class="form-control" name="product_name"/>
                        <lable>
                        Price:
                        </lable>
                        <input type="text" class="form-control" name="Price"/>
                        <lable>
                        Quantity:
                        </lable>
                        <input type="text" class="form-control" name="Quantity"/>
                        <lable>
                        Description:
                        </lable>
                        <textarea rows="6" cols="6" class="form-control" name="Description"></textarea>
                        <label>
                        Add Image :
                        </lable><br>
                        <input type="file" class="form-control" name="image"/><br>
                    <input type="submit" id="submit_cat" name="add_product"class="btn btn-primary btn-lg" value="Add Category">
                </div>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".category").change(function(){
                $.ajax({
                    url:'get_subcat.php',
                    data:'id='+$(this).val(),
                    type:'GET',
                    success:function(result){
                        $(".sub_cat").html(result);
                    }
                });
            });
        });
    </script>



<div id="myModal_delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
        <table class="table">
            <form method="post" action="manage_product.php">
            <tr>
                <h3>Are You Really Want To Delete This Product!!</h3>
            </tr>
            <input type="hidden" class="record_id" name=record_id value="">
            <tr>
            <td align="center">
                <input type="submit" value="Yes" name="delete_product" class="btn btn-danger btn-lg">
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
        $(".delete_product").click(function(){
            var id = $(this).attr("rel");
            $(".record_id").val(id);

        });

    });
</script>


<div id="myModal_update_product" class="modal fade" role="dialog">
    <div class="modal-dialog">

<div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
    <div class="modal-body">
    <form method="post" action="manage_product.php">
                <div class="form-group">
                    <lable>
                    Category:
                    </lable>
                    <select name="category" id="edit_category" class="form-control">
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
                    <lable>
                    Sub Category:
                    </lable>
                    <select name="sub_category" id="edit_subcategory" class="form-control ">
                    
                    </select>
                        <lable>
                        Product Name:
                        </lable>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="" />
                        <lable>
                        Price:
                        </lable>
                        <input type="text" class="form-control" id="Price" name="Price" value="" />
                        <lable>
                        Quantity:
                        </lable>
                        <input type="text" class="form-control" id="Quantity" name="Quantity" value="" />
                        <lable>
                        Description:
                        </lable>
                        <textarea rows="6" cols="6" id="Description" class="form-control" name="Description" value="" ></textarea>
                        <input type="hidden" value="" class="record_id" name="record_id">
                    <input type="submit" id="submit_cat" name="update_product"class="btn btn-primary btn-lg" value="Update Product">
                </div>
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
            var name =$("#name_"+id).text();
            var price =$("#price_"+id).text();
            var quantity =$("#quantity_"+id).text();
            var Description =$("#description_"+id).text();
            var category = Number($("#category_"+id).attr("rel"));
            var subcategory = Number($("#sub_cat_"+id).attr("rel"));
            $("#product_name").val(name);
            $("#Price").val(price);
            $("#Quantity").val(quantity);
            $("#Description").val(Description);
            $("#edit_category").val(category);
            $(".record_id").val(id);
            $.ajax({
                    url:'get_subcat.php',
                    data:'id='+category ,
                    type:'GET',
                    success:function(result){
                        $("#edit_subcategory").html(result);
                        $("#edit_subcategory").val(subcategory);
                    }
                });
        });

    });
</script>


</body>

</html>