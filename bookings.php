<?php
$host = "304.itpwebdev.com";
$user = "itp460_team3";
$pass = 'u$cItp2023';
$db = 'itp460_team3';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
  echo $mysqli->connect_error;
  exit();
}

if (isset($_GET['name']) && trim($_GET['name']) != '' && isset($_GET['email']) && trim($_GET['email']) != '') {
  $name = $_GET['name'];
  $email = $_GET['email'];
  $sql = "SELECT reservation.id, reservation.date, reservation.library_id, reservation.time, reservation.room, reservation.student_email, reservation.student_name, library.libraryName
  FROM `reservation`
  LEFT JOIN `library`
  ON library.id = reservation.library_id
  WHERE reservation.student_email = '" . $email . "' AND student_name = '" . $name . "'";
  $results = $mysqli->query($sql);

  if ($results == false) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }
?>
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
    <div class="container py-5">
      <h2><?php echo $name?>'s Upcoming Reservations</h2>
      <div class="primary-container mt-3 rounded p-5">
        <div class="row justify-content-around">
          <?php
          while ($row = $results->fetch_assoc()) { ?>
            <div class="card col-md-3">
              <img class="card-img-top" src="classroom.jpeg" alt="" />
              <div class="card-body">
                <h4 class="card-title pb-2"><?php echo $row['libraryName']?></h4>
                <p class="card-text m-0">Date: <?php echo $row['date']?></p>
                <p class="card-text m-0">Time: <?php echo $row['time']?></p>
                <p class="card-text">Pod Number: <?php echo $row['room']?></p>
                <a href="" class="btn btn-block btn-danger">Cancel</a>
              </div>
            </div>

          <?php }
          ?>
        </div>
      </div>
    </div>
  </section>
<?php } else { ?>
  <!-- Start HTML -->
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
    <div class="container py-5">
      <h2>No Upcoming Reservations</h2>
    </div>
  </section>
  <!-- END HTML -->
<?php
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PodSC | Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>