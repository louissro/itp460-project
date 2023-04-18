<?php
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

  // CHECKING RESERVATION AVAILABILITY ---------------------------------
  // User submits request --> Submit SQL Query
  $sql = "SELECT reservation.id, reservation.date, reservation.library_id, reservation.time, reservation.room
  FROM `reservation`
  LEFT JOIN `library`
  ON library.id = reservation.library_id
  WHERE 1=1";

  if (isset($_POST['date']) && trim($_POST['date']) != ''){
    $date = $_POST['date'];
    $sql = $sql . " AND date LIKE '%$date%'";
  }

  if (isset($_POST['time']) && trim($_POST['time']) != ''){
    $time = $_POST['time'];
    $sql = $sql . " AND time LIKE '%$time%'";
  }

  if (isset($_POST['libraryName']) && trim($_POST['libraryName']) != '') {
    $libraryName = $_POST['libraryName'];
    $sql = $sql . " AND library_id LIKE $libraryName";
  }

  $sql = $sql . ";";

  
  // --------------------------------------------
  // Check if time is available:
  // var count is pods taken
  $count = 0;
  // var assigned_pod 
  $room;

  // while loop through all rows in reservation table
    // If library_id = i and time = i and date = i:
      // count=+;

  $results = $mysqli->query($sql);

  if ($results == false){
    echo $results->error;
    $mysqli->close();
    exit();
  }

  while($row = $results->fetch_assoc())
  {
    if($date == $row['date'] && $time == $row['time'] && $libraryName == $row['library_id']){
      $count = $count + 1;
    }
  }

  if ($count < 5){
    // if count < 5:
    // Assign pod number to be count+1
    $room = $count + 1;

    // Add to reservation table 
    $insertSQL = "INSERT INTO reservation (date, library_id, time, room)
    VALUES ('$date', $libraryName, '$time', $room);";

    $insertResults = $mysqli->query($insertSQL);

  } else{
    // else:
    // Error Message: Reserve another pod
    echo "All pods for this location are booked at that time! Please reserve another day or time.";
  }
          

  // SEND EMAIL -------------------------------------------------------

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
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
    $phpmailer->setFrom('from@example.com', 'Mailer');
    $phpmailer->addAddress('ashleysol2001@gmail.com', 'Joe User'); 

    //Content
    $phpmailer->isHTML(true);                                  //Set email format to HTML
    $phpmailer->Subject = 'Here is the subject';
    $phpmailer->Body    = 'This is the HTML message body <b>in bold!</b>';
    $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //Commenting this out for now to prevent email spam
    // $phpmailer->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
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

            <h2 class="mt-5 mb-5">Thanks for booking with PodSC! We have reserved you a spot.</h2>

            <div class ="primary-container rounded p-5">
              <h3 style="color:#ac6620;">Booking Details</h3>
              <div class="mb-3">
              <hr class="new1">

              <div class="d-flex justify-content-between">
                <strong><span style="color:#ac6620;">Date</strong><span>
                <span class="text-muted"><?php echo $date?></span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Time</strong><span>
                <span class="text-muted"><?php echo $time?></span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Location</strong><span>
                <span class="text-muted"><?php echo $libraryName?></span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Pod Number</strong><span>
                <span class="text-muted"><?php echo $room?></span>
              </div>

              <button class="btn btn-primary">All Bookings</button>
            </div>

          </div>
         </div>
        </div>
       </div>
  </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>