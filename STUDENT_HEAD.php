<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-md navbar-dark  fixed-top" style="background-color: rgb(0, 0, 0,0.9);">

        <a class="navbar-brand  px-md-5" href="#">Navbar</a>

      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hover">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse my-2" id="hover">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link  px-md-5" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  px-md-5" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  px-md-5" href="rules.php">Rules & Regulation</a>
            </li>
            <?php if(isset($_SESSION["AdminName"])){; ?>
              <li class="nav-item">
                  <a class="nav-link  px-md-5" href="admin.php">Admin Pannel</a>
              </li>

            <?php }; ?>
            <?php if(isset($_SESSION["UserName"])){; ?>
            <li class="nav-item">
              <a class="nav-link  px-md-5" href="logout.php?data=student">Logout</a>
            </li>
            <?php }else{; ?>
            <li class="nav-item">
              <a class="nav-link  px-md-5" href="login.php">Login</a>
            </li>
            <?php }; ?>
          </ul>
        </div>
      </nav>

        <div id="carouselExampleIndicators" class="row carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="wall_img/hostel4.jpg" alt="First slide" style="height:400px;">
                <div class="carousel-caption">
                <?php if(isset($_SESSION["UserName"])){; ?>
                    <a href="profile.php?email=<?php echo $row1["email"]; ?>"><img src="image/<?php echo $row1["img"]; ?>" width="85px" height="85px" style="border-radius:40px;"></a>
                <?php }else{ ; ?>
                  <a href="login.php" style="font-size:1rem"><i class="fa fa-user-circle-o fa-5x text-warning" aria-hidden="true"></i></a>
                <?php };?>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="wall_img/h4.jpg" alt="Second slide" style="height:400px;">
                <div class="carousel-caption">
                  <?php if(isset($_SESSION["UserName"])){; ?>
                      <a href="profile.php"><img src="image/<?php echo $row1["img"]; ?>" width="85px" height="85px" style="border-radius:40px;"></a>
                  <?php }else{ ; ?>
                    <a href="login.php" style="font-size:1rem"><i class="fa fa-user-circle-o fa-5x text-warning" aria-hidden="true"></i></a>
                  <?php };?>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="wall_img/p2.webp" alt="Third slide" style="height:400px;">
                <div class="carousel-caption">
                  <?php if(isset($_SESSION["UserName"])){; ?>
                      <a href="profile.php"><img src="image/<?php echo $row1["img"]; ?>" width="85px" height="85px" style="border-radius:40px;"></a>
                  <?php }else{ ; ?>
                    <a href="login.php" style="font-size:1rem"><i class="fa fa-user-circle-o fa-5x text-warning" aria-hidden="true"></i></a>
                  <?php };?>
                </div>
              </div>
            </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
</body>
</html>
