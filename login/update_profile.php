<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <link rel="shortcut icon" sizes="2x2" href="data:image/jpeg;base64,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">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">
 
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>