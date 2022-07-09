<?php
  include "connect.php";
  session_start();

  if(!isset($_SESSION["u_name"])){
    header("Location: {$hostname}/admin/");
  }
  
  if(isset($_FILES['p_photo'])){
    $errors = array();

  $file_name = $_FILES['p_photo']['name'];
  $file_size = $_FILES['p_photo']['size'];
  $file_tmp = $_FILES['p_photo']['tmp_name'];
  $file_type = $_FILES['p_photo']['type'];
    //  echo  $file_ext = end(explode('.',$_FILES['p_photo']['name']));
  $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time()."-".basename($file_name);
    $target = "upload/".$new_name;

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }
    $p_name =mysqli_real_escape_string($conn, $_POST['p_name']);
    $p_category =mysqli_real_escape_string($conn, $_POST['p_category']);
    $p_disc =mysqli_real_escape_string($conn, $_POST['p_disc']);
    $p_price =mysqli_real_escape_string($conn, $_POST['p_price']);
    $p_discount =mysqli_real_escape_string($conn, $_POST['p_discount']);
    $p_qty =mysqli_real_escape_string($conn, $_POST['p_qty']);
    $p_status =mysqli_real_escape_string($conn, $_POST['p_status']);


  $sql = "INSERT INTO product(p_name, p_photo, p_cat, p_disc, p_price, p_discount,p_qty, p_status) VALUES ('{$p_name}','{$new_name}', {$p_category},'{$p_disc}',{$p_price},{$p_discount},{$p_qty},{$p_status});";
   $sql .= "UPDATE category SET cat_stock = cat_stock + {$p_qty} WHERE cat_id = {$p_category}";

  if(mysqli_multi_query($conn, $sql)){
    header("location: {$hostname}/admin/product.php");
    echo "successfully added";
  }else{
    echo "<div class='alert alert-danger'>Query Failed.</div>" ;
  }

?>
