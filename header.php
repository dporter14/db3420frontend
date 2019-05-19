<?php
session_start();
$stuid = $_SESSION["studentid"];
$db = $_SESSION["db"];
  if ($stuid > 0 && $stuid < 6) {
    //do a query for the name and put it in $stuname
    $res = pg_query($db, "select fname from student where $stuid = id");
    $student = pg_fetch_row($res);
    $stuname = "$student[0]";
  } else {
    $stuname = "Noname";
  }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="David Porter">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Student Home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="student_home.php"><?php echo "Welcome $stuname!" ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="student_home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="history.php">History</a> 
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Class Manager</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="add.php">Add Classes</a>
            <a class="dropdown-item" href="drop.php">Drop Classes</a>
          </div>
        </li>
      </ul>
      <form action="index.php" class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Log Out</button>
      </form>
    </div>
  </nav>