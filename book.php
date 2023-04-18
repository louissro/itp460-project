<!-- Book.php: this page is the final step before a user books their pod. 
It asks the user for their name and email address, then sends this info
to confirmation.php where booking details are displayed and email is sent.
Booking details from this page are received from pod.php. -->


<!-- TODO: Receive booking details from pod.php -->
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
            <a class="nav-link" href="bookings.php">Bookings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section>
    <div class="container-fluid mt-3 mx-auto">
      <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11">
          <div class="px-4 py-2">
            <h2 class="text-center mt-3 mb-3">Enter your information to complete your reservation!</h2>
            <div class="primary-container rounded text-center py-3 px-5">
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
              </div>
            </div>
            <div class="primary-container rounded mt-3 py-3 px-5">
              <!-- TODO:Add in booking detail variables to link -->
              <form action="confirmation.php" method="POST">
                <div class="form-group mb-2">
                  <label class="text-left" for="studentName">Full Name</label>
                  <input type="text" class="form-control" id="studentName" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                </div>
                <div class="form-group mb-2">
                  <label class="text-left" for="studentEmail">Email Address</label>
                  <input type="email" class="form-control" id="studentEmail" name="email" placeholder="Enter email">
                </div>
                <div class="form-group text-center justify-content-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>