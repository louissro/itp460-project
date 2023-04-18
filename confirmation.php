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

   // submitting SQL query

   //library drop down
   $sql = "SELECT * FROM library;";

   $results_library = $mysqli->query($sql);

   if (!$results_library) {
       echo $mysqli->error;
       $mysqli->close();
       exit();
   }


   // close mySQL connection
   $mysqli->close();

   // Include PHP of error if they need to submit another request for a different time.

   // Email Confirmation: 

   $toUser = $_POST['email'];
   $toAdmin = "tanyachen54@gmail.com";
   $subject = "PodSC Booking Confirmation";
   $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
   $message = file_get_contents("email_template.html");

   
  //  mail($toUser, $subject, $message, $headers);
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
                <span class="text-muted">2/03/23</span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Time</strong><span>
                <span class="text-muted">2:00PM</span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Location</strong><span>
                <span class="text-muted">Doheny Library</span>
              </div>

              <div class="d-flex justify-content-between">
              <strong><span style="color:#ac6620;">Pod Number</strong><span>
                <span class="text-muted">5</span>
              </div>

              <button class="btn btn-primary">All Bookings</button>
            </div>

          </div>
         </div>
        </div>
       </div>
  </section>

      <!-- <main>
        <p>Language: <?php echo $_POST['language'];?></p>
        <p>Country: <?php echo $_POST['country'];?></p>
        <p>Pages: <?php echo $_POST['pages'];?></p>

        <h1>You also received an email confirmation!</h1>
      </main> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>