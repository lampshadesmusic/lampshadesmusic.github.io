<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  
  if (isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];


    // $servername = "localhost";
    // $username = "username";
    // $password = "password";
    // $conn = mysqli_connect($servername, $username, $password);
    // if (!$conn) {
    //   die("Connection failed: " . mysqli_connect_error());
    // }
    // else{
    //   $query = "INSERT INTO employee(`name`,`email`, `phone`) VALUES ('". mysqli_real_escape_string($conn, $name) ."','". mysqli_real_escape_string($conn,$email) ."','". mysqli_real_escape_string($conn, $phone) ."')";
    //   mysqli_query($conn, $query);
    // }

    echo $name."\n".$email."\n".$phone."\n".$service."Submitted..." ;
  }
?>
