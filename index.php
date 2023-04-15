<?php
    
    // establishing mySQL connection
    $host = "304.itpwebdev.com";
    $user = "itp460_team3";
    $pass = "u$cItp2023";
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="index.html">Pod<span class="logo-USC">SC</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mission.html">Mission</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bookings.html">Bookings</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <form action = "index.php" method = "GET">

      <main>
        <!-- Book a Pod -->
           <section>
            <div class="container py-5">
                <h2>Book a Pod</h2>
                <div class="form-container bg-light rounded p-5">
                    <form class="row">
                        <!-- Date -->
                        <div class="col-md-3">
                            <label for="select-date" class="form-label">Date</label>
                            <select class="form-select col-3" id="select-date" aria-label="Default select example">
                                <option selected>Select Date</option>
                                <option value="1">3/1</option>
                                <option value="2">3/2</option>
                                <option value="3">3/3</option>
                                <option value="1">3/4</option>
                                <option value="2">3/5</option>
                                <option value="3">3/6</option>
                                <option value="1">3/7</option>
                                <option value="2">3/8</option>
                                <option value="3">3/9</option>
                                <option value="1">3/10</option>
                                <option value="2">3/11</option>
                                <option value="3">3/12</option>
                                <option value="3">3/13</option>
                                <option value="3">3/14</option>
                            </select>
                        </div>
                        <!-- Time -->
                        <div class="col-md-3">
                            <label for="select-date" class="form-label">Time</label>
                            <select class="form-select col-3" id="select-date" aria-label="Default select example">
                                <option selected>Select Time</option>
                                <option value="1">6:00AM</option>
                                <option value="1">6:30AM</option>
                                <option value="1">7:00AM</option>
                                <option value="1">7:30AM</option>
                                <option value="1">8:00AM</option>
                                <option value="1">8:30AM</option>
                                <option value="1">9:00AM</option>
                                <option value="1">9:30AM</option>
                                <option value="1">10:00AM</option>
                                <option value="1">10:30AM</option>
                                <option value="1">11:00AM</option>
                                <option value="1">11:30AM</option>
                            </select>
                        </div>
                        <!-- Location -->
                        <div class="col-md-3">
                            <label for="select-date" class="form-label">Location</label>
                            <select class="form-select col-3" id="select-date" aria-label="Default select example">
                                <option selected>Select Location</option>
                                <!-- <option value="1">Leavy</option>
                                <option value="1">Doheny</option>
                                <option value="1">SAL</option> -->


                                <!-- display libraries  -->
                                <?php while($row = $results_library->fetch_assoc()): ?>
                                    <option value="<?php echo $row['id']; ?>">
                                        <?php echo $row['libraryName']; ?>
                                    </option>
                                <?php endwhile; ?>

                            </select>
                        </div>
                        <div class="col-md-3" id="search-btn-div">
                            <a href="results.html" class="col-6 btn bottom btn-primary">Search</a>
                        </div>
                    </form>
                </div>
            </div>
            </section>

            <!-- Featured Pods -->
            <section>
                <div class="container py-5">
                    <h2>Featured Pods</h2>
                    <div class="bg-light mt-3 rounded">
                      <div class="row justify-content-around py-5">
                        <div class="col-md-3">
                          <div class="card">
                            <img class="card-img-top" src="classroom.jpeg" alt="" />
                            <div class="card-body">
                                <h4 class="card-title pb-2">Doheny Library</h4>
                                <p class="card-text m-0">Description: room with conference table and chairs.</p>
                                <small class="text-success">53 rooms open</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="card">
                            <img class="card-img-top" src="classroom.jpeg" alt="" />
                            <div class="card-body">
                                <h4 class="card-title pb-2">Leavey Library</h4>
                                <p class="card-text m-0">Description: room with desk chairs and whiteboard.</p>
                                <small class="text-success">36 rooms open</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                              <img class="card-img-top" src="classroom.jpeg" alt="" />
                              <div class="card-body">
                                <h4 class="card-title pb-2">Viterbi SAL</h4>
                                <p class="card-text m-0">Description: open table, chairs, and whiteboard.</p>
                                <small class="text-success">10 rooms open</small>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </section>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>