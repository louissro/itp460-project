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
    $sql = "SELECT library.id, library.libraryName, library.description, library.numOfPods, library.picture
            FROM `library`
            WHERE 1=1";

    if(isset($_POST['libraryName']) || trim($_POST['libraryName']) != ''){
        $library_id = $_POST['libraryName'];
        $sql = $sql . " AND library.id = $library_id";
    } else {
      // testing to see why there's an undefined index
       echo 'hello';
    }

    $sql = $sql . ';';

    $results_library = $mysqli->query($sql);

    if (!$results_library) {
        echo $mysqli->error;
        $mysqli->close();
        exit();
    }


    // close mySQL connection
    $mysqli->close();
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
    <link rel="stylesheet" href="/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
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

  <?php while ($row = $results_library -> fetch_assoc()) : ?>

    <main>
      <!-- Book a Pod -->
      <section>
        <div class="container py-5">
          <h2>Book a Pod</h2>
          <div class="primary-container rounded p-5">
            <form class="row">
              <!-- Date -->
              <div class="col-md-3">
                <label for="select-date" class="form-label">Date</label>
                <select class="form-select col-3" id="select-date" aria-label="Default select example">
                  <option selected>
                  <?php if(isset($_POST["date"])){
                    if($_POST["date"] == ""){
                      echo "any";
                    }
                    else{
                    echo $_POST["date"];
                    }
                  }
                  else{
                    echo "any";
                  }?>
                  </option>
                </select>
              </div>
              <!-- Time -->
              <div class="col-md-3">
                <label for="select-date" class="form-label">Time</label>
                <select class="form-select col-3" id="select-date" aria-label="">
                <option selected>
                <?php if(isset($_POST["time"])){
                    if($_POST["time"] == ""){
                      echo "any";
                    }
                    else{
                    echo $_POST["time"];
                    }
                  }
                  else{
                    echo "any";
                  }?>
                  </option>
                </select>
              </div>
              <!-- Location -->
              <div class="col-md-3">
                <label for="select-location" class="form-label">Location</label>
                <select class="form-select col-3" id="select-location" aria-label="Default select example">
                  <option selected>
                  <?php if(isset($_POST["libraryName"])){
                    if($_POST["libraryName"] == ""){
                      echo "any";
                    }
                    else{
                     echo $row['libraryName'];
                    }
                  }
                  else{
                    echo "any";
                  }?>
                  </option>
                </select>
              </div>
            </form>
          </div>
        </div>
      </section>

<!-- Search Results -->
<section>
  <div class="container py-5">
    <h2>Search Results</h2>
    <div class="primary-container mt-3 rounded p-5">
      <div class="row justify-content-around">
        <a href='pod.php?libraryID=<?php echo $row['id'];?>' class="col-md-3">
          <div class="card">
            <!-- <img class="card-img-top" src="classroom.jpeg" alt="" /> -->

            <?php 

            echo "<img src = 'images/{$row['picture']}' alt = '{$row['libraryName']}'>";

            ?>

            <div class="card-body">
                <!-- <h4 class="card-title pb-2">Doheny Library</h4> -->
                <h4 class="card-title pb-2"> <?php echo $row['libraryName'];?> </h4>
                <!-- <p class="card-text m-0">Description: room with conference table and chairs.</p> -->
                <p class="card-text m-0"> <?php echo $row['description'];?> </p>
                <!-- <small class="text-success">53 rooms open</small> -->
                <small class="text-success"> <?php echo $row['numOfPods'];?> rooms open</small>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<?php endwhile ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
</html>