<?php


    if (!isset($_GET['id']) || trim($_GET['id']) == '') {
        $error = "Unable to cancel reservation.";
    } else {

        $host = "304.itpwebdev.com";
        $user = "itp460_team3";
        $pass = 'u$cItp2023';
        $db = 'itp460_team3';

        $mysqli = new mysqli($host, $user, $pass, $db);

        if ($mysqli->connect_errno) {
            echo $mysqli->connect_error;
            exit();
        }

        $sql = "DELETE FROM reservation
                WHERE id = " . $_GET['id'] . ";";

        $results = $mysqli->query($sql);

        if (!$results) {
			echo $mysqli->error;
			$mysqli->close();
			exit();
		}

		$mysqli->close();

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodSC | Delete Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mission.php">Mission</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">Bookings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
		<div class="row mt-4">
			<div class="col-12">
				
				<?php if ( isset($error) && trim($error) != '' ) : ?>

					<div class="text-danger">
						<!-- Show Error Messages Here. -->
						<?php echo $error; ?>
					</div>
				
				<?php else : ?>

					<div class="text-success">
						Your reservation has been successfully deleted.
					</div>

				
				<?php endif; ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="bookings.php" role="button" class="btn btn-primary">Back to Bookings</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->

    
</body>
</html>