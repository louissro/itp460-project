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


$sql = "SELECT library.id, libraryName, description, location, feature, picture, picture2, picture3, picture4
            FROM library 
              LEFT JOIN library_features 
                ON library.libraryFeatures = library_features.id 
              LEFT JOIN features 
                ON library.libraryFeatures = features.id";


if (isset($_GET['libraryID']) && trim($_GET['libraryID']) != '') {
  $libraryID = $_GET['libraryID'];
  $sql = $sql . " WHERE library.id = $libraryID";
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
  $libraryName = ($row['libraryName']);
  $description = ($row['description']);
  $feature = ($row['feature']);
  $location = ($row['location']);
  $picture = ($row['picture']);
  $picture2 = ($row['picture2']);
  $picture3 = ($row['picture3']);
  $picture4 = ($row['picture4']);
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
    .item{
      height: 400px;
    }
    .item img {
      width: 100%;
      /* Set width to 100% */
      height: 100%;
      object-fit: cover;
      float: left;

    }

    #accordionExample {
      padding-top: 25px;
    }


    .slider {
      width: 100%;
      max-width: 800px;
      height: 350px;
      position: relative;
      overflow: hidden;
      border-radius: 15px;
    }

    .slide {
      width: 100%;
      max-width: 800px;
      height: 350px;
      position: absolute;
      transition: all 0.5s;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .btn-slider {
      position: absolute;
      width: 40px;
      height: 40px;
      padding: 10px;
      border: none;
      border-radius: 50%;
      z-index: 10px;
      cursor: pointer;
      background-color: #fff;
      font-size: 18px;
    }

    .btn-slider:active {
      transform: scale(1.1);
    }

    .btn-prev {
      top: 45%;
      left: 2%;
    }

    .btn-next {
      top: 45%;
      right: 2%;
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

  <?php while ($row = mysqli_fetch_array($results_library)) ?>

  <main>
    <div class="container mt-5 p-3">
      <h1><?php echo $libraryName ?></h1>
      <div class="row">
        <div class="col-sm-6">
        <div class="slider">
          <!-- slide 1 -->
          <div class="slide">
       
           <img src="images/<?php echo $picture ?>"alt="" />
          </div>

          <!-- slide 2 -->
          <div class="slide">
           <img src="images/<?php echo $picture2 ?>" alt="" />

          </div>

          <!-- slide 3 -->
          <div class="slide">
            <img src="images/<?php echo $picture3 ?>" alt="" />
          </div>

          <!-- slide 4
          <div class="slide">
            <img src="https://source.unsplash.com/random?landscape,city" alt="" />
          </div> -->

          <!-- Control buttons -->
          <button class="btn-slider btn-next">></button>
          <button class="btn-slider btn-prev"><</button>
        </div>
          

       </div> <!-- col-sm-6-->
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

    <div class="container py-5">
      <h2>Book This Pod</h2>
      <div class="primary-container rounded p-5">
        <form action="book.php" method="POST">
          <div class="row">
            <!-- Date -->
            <div class="col-3">
              <label for="select-date" class="form-label">
                Date <span class="text-danger">*</span>
              </label>
              <select class="form-select col-3" id="select-date" name="date" aria-label="Default select example">
                <option value="" selected>Select Date</option>
                <option value="5/1">5/1</option>
                <option value="5/2">5/2</option>
                <option value="5/3">5/3</option>
                <option value="5/4">5/4</option>
                <option value="5/5">5/5</option>
                <option value="5/6">5/6</option>
                <option value="5/7">5/7</option>
                <option value="5/8">5/8</option>
                <option value="5/9">5/9</option>
                <option value="5/10">5/10</option>
                <option value="5/11">5/11</option>
                <option value="5/12">5/12</option>
                <option value="5/13">5/13</option>
                <option value="5/14">5/14</option>
              </select>
            </div>
            <!-- Time -->
            <div class="col-3">
              <label for="select-time" class="form-label">
                Time <span class="text-danger">*</span>
              </label>
              <select class="form-select col-3" id="select-time" name="time" aria-label="Default select example">
                <option value="" selected>Select Time</option>
                <option value="6:00AM">6:00AM</option>
                <option value="6:30AM">6:30AM</option>
                <option value="7:00AM">7:00AM</option>
                <option value="7:30AM">7:30AM</option>
                <option value="8:00AM">8:00AM</option>
                <option value="8:30AM">8:30AM</option>
                <option value="9:00AM">9:00AM</option>
                <option value="9:30AM">9:30AM</option>
                <option value="10:00AM">10:00AM</option>
                <option value="10:30AM">10:30AM</option>
                <option value="11:00AM">11:00AM</option>
                <option value="11:30AM">11:30AM</option>
              </select>
            </div>
            <!-- Location -->
            <div class="col-3">
              <label for="select-location" class="form-label">Location <span class="text-danger">*</span>
              </label>
              <select name="libraryID" class="form-select col-3" id="select-location" aria-label="Default select example">
                <option value="<?php echo $libraryID ?>" selected><?php echo $libraryName ?></option>
              </select>

            </div>
            <div class="col-2" id="search-btn-div">
              <!-- Change this to button when doing submitting form -->
              <button type="submit" class="btn bottom btn-primary">Reserve</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    const slides = document.querySelectorAll(".slide");

// loop through slides and set each slides translateX
slides.forEach((slide, indx) => {
  slide.style.transform = `translateX(${indx * 100}%)`;
});

// select next slide button
const nextSlide = document.querySelector(".btn-next");

// current slide counter
let curSlide = 0;
// maximum number of slides
let maxSlide = slides.length - 1;

// add event listener and navigation functionality
nextSlide.addEventListener("click", function () {
  // check if current slide is the last and reset current slide
  if (curSlide === maxSlide) {
    curSlide = 0;
  } else {
    curSlide++;
  }

  //   move slide by -100%
  slides.forEach((slide, indx) => {
    slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
  });
});

// select next slide button
const prevSlide = document.querySelector(".btn-prev");

// add event listener and navigation functionality
prevSlide.addEventListener("click", function () {
  // check if current slide is the first and reset current slide to last
  if (curSlide === 0) {
    curSlide = maxSlide;
  } else {
    curSlide--;
  }

  //   move slide by 100%
  slides.forEach((slide, indx) => {
    slide.style.transform = `translateX(${100 * (indx - curSlide)}%)`;
  });
});

    
  </script>
</body>



</html>