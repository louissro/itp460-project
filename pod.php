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


  $sql = "SELECT library.id, libraryName, description, location, feature, picture 
            FROM library 
              LEFT JOIN library_features 
                ON library.libraryFeatures = library_features.id 
              LEFT JOIN features 
                ON library.libraryFeatures = features.id
              LEFT JOIN library_features AS libraryfeat
                ON library_features.featureID = features.id
              LEFT JOIN library_features AS libraryfeat2
                ON library_features.libraryID = library.id";


if (isset($_GET['select_location']) && trim($_GET['select_location']) != '') {
  $select_location = $_GET['select_location'];
  $sql = $sql . " WHERE library.id = $select_location";
}


  $sql = $sql . ";";

  $results_library = $mysqli->query($sql);

  if (!$results_library) {
    echo $mysqli->error;
    $mysqli->close();
    exit();
  }

    $libraryName = '';
    $description = '';
    $feature = '';
    $location = '';
    while ($row = mysqli_fetch_array($results_library)) {
      $libraryName =($row['libraryName']);
      $description = ($row['description']);
      $feature =($row['feature']);
      $location =($row['location']);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PodSC | Pod Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <style>
        .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }
    #accordionExample{
      padding-top: 25px;
    }
    </style>
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
                <a class="nav-link" href="bookings.php">Bookings</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <main>
        <div class="container mt-5 p-3">
            <h1><?php echo $libraryName ?></h1>
            <div class = "row">
                <div class = "col-sm-6">
                    <div class="row pt-4">
                        <img id = "giantphoto" src="https://play-lh.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="Name">
                        <hr>
                    </div> <!-- row -->
                    <div class="row">
                        <div class="col">
                            <img class = "img-responsive thumbnail" style="width: 100%; height: 100%" id = "thumbnail1" src="https://play-lh.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="Name">
                        </div> <!-- col -->
                        <div class="col">
                            <img class = "img-responsive thumbnail" style="width: 100%; height: 100%" id = "thumbnail2" src="https://play-lh.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="Name">
                        </div> <!-- col -->
                        <div class="col">
                            <img class = "img-responsive thumbnail" style="width: 100%; height: 100%" id = "thumbnail3" src="https://play-lh.googleusercontent.com/IeNJWoKYx1waOhfWF6TiuSiWBLfqLb18lmZYXSgsH1fvb8v1IYiZr5aYWe0Gxu-pVZX3" alt="Name">
                        </div> <!-- col -->
                    </div> <!-- row -->
                    
                       
                </div> <!-- col-sm-8-->
                <div class="col-sm-6">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              About <?php echo $libraryName ?>
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <?php echo $description ?>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Features
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <?php echo $feature ?>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                             Location on Campus
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <?php echo $location ?>
                            </div>
                          </div>
                        </div>
                      </div>
                </div> <!-- col-sm-8-->
            </div> <!-- row --> 
           </div> <!-- container --> 

           <div class="container mt-5 p-3">
            <h1>Booking Availability</h1>
            <div class = "row">
              <p><b>2/23/23 at 1:00PM</b></p>
            </div>
            <div class = "row">
              <table class = "table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Time</th>
                    <th scope="col">11:30AM</th>
                    <th scope="col">12:00PM</th>
                    <th scope="col">12:30PM</th>
                    <th scope="col">1:00PM</th>
                    <th scope="col">1:30PM</th>
                    <th scope="col">2:00PM</th>
                    <th scope="col">2:30PM</th>
                    <th scope="col">3:00PM</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Room 200</th>
                    <td class="table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-success">Free</td>
                    <td class="table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-secondary">Busy</td>
                  </tr>

                  <tr>
                    <th scope="row">Room 201</th>
                    <td class="table-secondary">Busy</td>
                    <td class = "table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-success">Free</td>
                    <td class="table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-secondary">Busy</td>
                  </tr>

                  <tr>
                    <th scope="row">Room 201</th>
                    <td class="table-secondary">Busy</td>
                    <td class = "table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-success">Free</td>
                    <td class="table-success">Free</td>
                    <td class="table-secondary">Busy</td>
                    <td class="table-secondary">Busy</td>
                  </tr>
                  

                </tbody>
              </table>
            </div> <!-- row -->  

            <div class="row">
              <div class = "col-11">

              </div>
              <div class="col-1">
                <a href="bookings.php" class="btn btn-primary">Reserve</a>
              </div>
              
            </div>


           </div> <!-- container --> 
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>