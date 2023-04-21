<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// establishing mySQL connection
$host = "304.itpwebdev.com";
$user = "itp460_team3";
$pass = 'u$cItp2023';
$db = "itp460_team3";

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
  echo $mysqli->connect_error;
  exit();
}

if (isset($_GET['id']) && trim($_GET['id']) != '') {
  $libraryID = $_GET['id'];
  $date = $_GET['date'];
  $time = $_GET['time'];
  $libraryName = $_GET['library'];
  $room = $_GET['room'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Add to reservation table 
  $insertSQL = "INSERT INTO reservation (date, library_id, time, room, student_name, student_email)
  VALUES ('$date', $libraryID, '$time', $room, '$name', '$email');";
  $insertResults = $mysqli->query($insertSQL);
} else {
  echo "something went wrong, try again.";
  echo $mysqli->error;
  $mysqli->close();
  exit();
}

// Send confirmation email
$phpmailer = new PHPMailer();

try {
  //Server settings
  $phpmailer->isSMTP();
  $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'b0b97d38f44b87';
  $phpmailer->Password = '4955b6f7008913';


  //Recipients
  $phpmailer->setFrom('no-reply@podsc.com', 'Mailer');
  $phpmailer->addAddress($email, $name);

  //Content
  $phpmailer->isHTML(true);
  $phpmailer->Subject = 'PodSC: Booking Confirmation';
  $phpmailer->Body    = "<section style='width:80%; margin:100px auto; text-align:center'>
  <h2 style='color:#824101;'>Thanks for booking with PodSC, $name! Your reservation details are below.</h2>

  <div style='border:1px solid #ac6620'>
    <h3 style='color:#ac6620;'>Booking Details</h3>
    <div style='width:100%; height:1px; background-color:#ac6620'></div>
    <div style='padding: 10px 0px'>  
      <div style='padding-top:5px'>
        <strong><span style='color:#ac6620;'>Date: </strong><span>
        <strong><span class='text-muted'>$date</span><strong>
      </div>

      <div style='padding-top:5px'>
      <strong><span style='color:#ac6620;'>Time: </strong><span>
      <strong><span class='text-muted'>$time</span><strong>
      </div>

      <div style='padding-top:5px'>
      <strong><span style='color:#ac6620;'>Location: </strong><span>
      <strong><span class='text-muted'>$libraryName</span><strong>
      </div>

      <div style='padding-top:5px'>
        <strong><span style='color:#ac6620;'>Pod Number: </strong><span>
        <strong><span class='text-muted'>$room</span><strong>
      </div>
    </div>
  </div>
</section>";
  $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

  //Commenting this out for now to prevent email spam
  if ($phpmailer->send()) {
    //email send
  } else {
    echo $phpmailer->ErrorInfo;
    exit();
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PodSC | Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg primary-container">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="index.php">Pod<span class="logo-USC">SC</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mission.php">Mission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="bookings.php">Bookings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container-fluid px-1 py-5 mx-auto">
      <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
          <div class="px-4 py-5">

            <h2 class="mt-5 mb-5">Thanks for booking with PodSC, <?php echo $name ?>! We have reserved you a spot and sent a confirmation email to <?php echo $email ?>.</h2>

            <div class="primary-container rounded p-5">
              <h3 style="color:#ac6620;">Booking Details</h3>
              <div class="mb-3">
                <hr class="new1">

                <div class="d-flex justify-content-between">
                  <strong><span style="color:#ac6620;">Date</strong><span>
                    <span class="text-muted"><?php echo $date ?></span>
                </div>

                <div class="d-flex justify-content-between">
                  <strong><span style="color:#ac6620;">Time</strong><span>
                    <span class="text-muted"><?php echo $time ?></span>
                </div>

                <div class="d-flex justify-content-between">
                  <strong><span style="color:#ac6620;">Location</strong><span>
                    <span class="text-muted"><?php echo $libraryName ?></span>
                </div>

                <div class="d-flex justify-content-between">
                  <strong><span style="color:#ac6620;">Pod Number</strong><span>
                    <span class="text-muted"><?php echo $room ?></span>
                </div>

                <a href="bookings.php?name=<?php echo $name ?>&email=<?php echo $email ?>">
                  <button type="submit" class="btn btn-primary">All Bookings</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <!-- <main>
        <p>Language: <?php echo $_POST['language']; ?></p>
        <p>Country: <?php echo $_POST['country']; ?></p>
        <p>Pages: <?php echo $_POST['pages']; ?></p>

        <h1>You also received an email confirmation!</h1>
      </main> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>