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
    <style>
      .initiatives .card {
        width: 342px;
        height: 304px;
        border-radius: 25px;
        text-align: left;
        margin: 20px;
      }
      .initiatives .card-title {
        text-align: center;
      }

      .white {
        border: 4px solid #D3D3D3;
      }

      .blue {
        border: 4px solid #D3D3D3;
        background-color: #D3D3D3;
      }

      .initiatives{
        padding: 40px;
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
                <a class="nav-link active" href="mission.php">Mission</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bookings.php">Bookings</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <main>
        <div class="container-fluid body initiatives">
          <div class="row initiatives-header">
            <h1 style='color:#824101' class="text-center" id="mission-section">
              <strong >Our Mission</strong>
            </h1>
            <br />
            <br />
          </div>
    
          <div class="statement row">
            <p style="font-weight: 500; color:#ac6620;" class="text-center">
              PodSC’s mission is to minimize stress and maximize productivity with curated study pods made for you.
            </p>
          </div>

          <div class="row d-flex justify-content-center">
            <div class="card primary-container col-lg-4 col-sm-12">
              <div class="card-body">
                <h4 class="card-title">
                  <strong>1. Find a Pod</strong>
                </h4>
                <p class="card-text">
                  Our platform allows students to find study spots, otherwise known as Pods, on campus 
                  so that they can study more easily. These pods are equipped with amenities and privacy
                  to ensure an enjoyable studying environment. 
                </p>
              </div>
            </div>

            <div class="card secondary-container col-lg-4 col-sm-12">
              <div class="card-body">
                <h4 class="card-title">
                  <strong>2. Reserve the Pod</strong>
                </h4>
                <p class="card-text">
                  Once you find a pod that meets your standards, simply reserve it for a time that works for
                  you. This will allow you to study in peace without any distractions.
                </p>
              </div>
            </div>
            <div class="card primary-container  col-lg-4 col-sm-12">
              <div class="card-body">
                <h4 class="card-title">
                  <strong>3. Show up!</strong>
                </h4>
                <p class="card-text">
                  After reserving your pod, simply show up and enjoy your studying experience!
                </p>
              </div>
            </div>
          </div>
        </div>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>