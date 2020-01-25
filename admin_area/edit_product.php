<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_product'])){
    
    $edit_id = $_GET['edit_product'];
    
    $get_p = "select * from products where product_id='$edit_id'";
    
    $run_edit = mysqli_query($con,$get_p);
    
    $row_edit = mysqli_fetch_array($run_edit);
    
    $p_id = $row_edit ['product_id'];
    
    $p_title = $row_edit ['product_title'];
    
    $p_cat = $row_edit ['p_cat_id'];
    
    $cat = $row_edit ['cat_id'];
    
    $p_image1 = $row_edit ['product_img1'];
    
    $p_image2 = $row_edit ['product_img3'];
    
    $p_image3 = $row_edit ['product_img3'];
    
    $p_qty = $row_edit ['product_quantity'];
    
    $p_price = $row_edit ['product_price'];
    
    $p_desc = $row_edit ['product_desc'];
    
    $p_keywords = $row_edit ['product_keywords'];
    
    
}
    
$get_p_cat = "select * from product_categories where p_cat_id = '$p_cat'";

  $run_p_cat = mysqli_query($con,$get_p_cat);
    
$row_p_cat = mysqli_fetch_array($run_p_cat);
    
$p_cat_title = $row_p_cat ['p_cat_title'];
    
$get_cat = "select * from categories where cat_id = '$cat'";
    
$run_cat = mysqli_query($con,$get_cat);
    
$row_cat =mysqli_fetch_array($run_cat);
    
$cat_title = $row_cat ['cat_title'];
    



?>

<!DOCTYPE html>

<html>

<head>

<title> Edit Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Products

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Products

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Title </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required value="<?php echo $p_title ;?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Category </label>

<div class="col-md-6" >

<select name="product_cat" class="form-control">

<option value="<?php echo $p_cat ;?>"> <?php echo $p_cat_title; ?> </option>


<?php

$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}


?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option value="<?php echo $cat ;?>"> <?php echo $cat_title ;?> </option>

<?php

$get_cat = "select * from categories ";

$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_title = $row_cat['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 1 </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" required >

<br><img src="product_images/<?php echo $p_image1;?>" alt="" width="70" height="70">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 2 </label>

<div class="col-md-6" >

<input type="file" name="product_img2" class="form-control" required >

<br><img src="product_images/<?php echo $p_image2;?>" alt="" width="70" height="70">


</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 3 </label>

<div class="col-md-6" >

<input type="file" name="product_img3" class="form-control" required >

<br><img src="product_images/<?php echo $p_image3;?>" alt="" width="70" height="70">


</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Quantity </label>

<div class="col-md-6" >

<input type="text" name="product_quantity" class="form-control" required value="<?php echo $p_qty ; ?>" >

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Price </label>

<div class="col-md-6" >

<input type="text" name="product_price" class="form-control" required value="<?php echo $p_price ; ?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Keywords </label>

<div class="col-md-6" >

<input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords ; ?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Description </label>

<div class="col-md-6" >

<textarea name="product_desc" class="form-control" rows="6" cols="19" >
    <?php echo $p_desc ; ?>
</textarea>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$product_price = $_POST['product_price'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");
    

$product_quantity = $_POST['product_quantity'];    



$update_product="update products set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_quantity='$product_quantity',product_price='$product_price',product_desc='$product_desc',product_keywords='$product_keywords' where product_id='$p_id'";
    
$run_product = mysqli_query($con,$update_product);
    
if($run_product)
    
{
    
    echo "<script>alert('Product has been updated successfully!!!')</script>";
    
    echo "<script>window.open('index.php?view_products','_self')</script>";
    
}


}

?>

<?php } ?>
