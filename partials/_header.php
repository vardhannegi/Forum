<?php
session_start();
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Adout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Catagories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contact.php">Contact</a>
        </li>
      </ul>
      <div class="row mx-2">';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

        echo '<form class="d-flex">
        <input class="form-control me-2 mx-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
        </form>
        <p class="my-2 mx-2 text-light"> Welcome '.$_SESSION['useremail'].'</p>
        <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
         
        </div>';
      }else{
        echo '<form class="d-flex">
            <input class="form-control me-2 mx-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>
        <button class="btn  btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Singup</button>';

      }

       echo ' </div>
    </div>
  </nav>
  ';

  include 'partials/_loginModal.php';
  include 'partials/_signupModal.php';
  if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] =="true"){
    echo '
            <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You can now login.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
  }
?>