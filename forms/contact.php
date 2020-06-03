<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  
  include 'MailChimp.php';

   use \DrewM\MailChimp\MailChimp;

  $api_key='-';
  $list_id='b7678ba30c';

  $MailChimp = new MailChimp($api_key);
  if (isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];


    $result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => $email,
        'merge_fields' => ['FNAME'=>$name, 'PHONE'=>$phone, 'SERVICE'=>$service],
				'status'        => 'subscribed',
			]);

    if ($MailChimp->success()) {
	  echo "Submitted";	
    } else {
      $subscriber_hash = MailChimp::subscriberHash($email);

      $result = $MailChimp->patch("lists/$list_id/members/$subscriber_hash", [
        'merge_fields' => ['FNAME'=>$name, 'PHONE'=>$phone, 'SERVICE'=>$service],
        'status'        => 'subscribed',
      ]);
      if ($MailChimp->success()) {
        echo "You are already a subscriber, Updated Successfully"; 
      } else{
        echo $MailChimp->getLastError();
      }
    }
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

    }
?>
