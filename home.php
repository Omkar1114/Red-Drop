<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
require('db.php');
$username = $_SESSION['username'];
$result = mysqli_query($con, "SELECT bloodtype FROM user WHERE username='$username'");
$r = mysqli_fetch_array($result);
$bloodType = $r['bloodtype'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Drop</title>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Pacifico|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9e19fba627.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-transparent px-4 ">

        <a class="navbar-brand text-danger pl-2" href="#">
            <h3>Red Drop</h3>
        </a>

        <button class="navbar-toggler btn btn-outline-secondary" type="button" data-toggle="collapse" data-remote="myRemoteURL.do" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse " id="mainNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active ">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item ">
                    <form id="logout" action="logout.php" method="POST">
                        <a class="nav-link btn btn-outline-danger" href="javascript:{}" onclick="document.getElementById('logout').submit();">Log Out</a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>


    <!-- header -->
    <div class="main-section d-flex justify-content-center mb-5">
        <div class="row">
            <form class="form-inline col-12 d-flex justify-content-center mt-5">
                <div class="input-group">
                    <input class="form-control search-bar rounded-pill" type="search" placeholder="Search for Blood" aria-label="Search">
                </div>
            </form>
            <p class="qoute text-secondary col-12 d-flex justify-content-center">Be a Blood Donar, be a real Hero</p>
        </div>
    </div>

    <!-- cards -->
    <div class="container">
        <div class="row">
            <?php
            $getData = mysqli_query($con, "SELECT * FROM `request` WHERE `bloodtype`='$bloodType'");
            $cr = mysqli_num_rows($getData);
            if ($cr != 0) {
                while ($row = mysqli_fetch_assoc($getData)) {
                    echo '<div class="col col-md-3 col-lg-2">
                    <div class="card sub-card fix2 mb-4" style="width: 9rem;">
                    <div class="card-body">
                    <h5 class="card-title">' . $row['patientname'] . '</h5>
                    <p class="card-text">' . $row['city'] . '</p>
                    <h6 class="card-subtitle mb-2 text-muted">' . $row['phone'] . '</h6>
                    <h5 class="text-danger">' . $row['bloodtype'] . '</h5>
                    </div>
                    </div>
                </div>
            ';
                }
            }
            ?>
        </div>
    </div>

    <!-- footer -->
    <section id="footer">
        <div class="container text-center text-white mb-0 py-3 mt-5">
            <a class="navbar-brand text-white pb-3" href="#">
                <h4>Red Drop</h4>
            </a>
            <p>
                <i class="fab fa-twitter-square px-2 "></i>
                <i class="fab fa-instagram px-2"></i>
                <i class="fab fa-facebook-square px-2"></i>
            </p>
            <p>© Copyright 2019 Red Drop</p>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>