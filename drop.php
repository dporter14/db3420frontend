<?php
    session_start();
    require_once("./connect.php");
    require_once("./header.php");
?>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="student_home.php">
              <span data-feather="home"></span>
              Student Home<span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Requirements
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Planner
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Contact Counselor
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Course Search 
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 py-5">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Drop Classes</h1>
      </div>
      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-sm">
        <thead class="table-primary">
            <tr>
              <th>Course</th>
              <th>Instructor</th>
              <th>Room #</th>
              <th>Period</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $res = pg_query($db, "select * from student_schedule where $stuid = id");
            while ($row = pg_fetch_row($res)){
              echo "<tr>";
                echo "<th>$row[1]</th>";
                echo "<th>$row[3]</th>";
                echo "<th>$row[4]</th>";
                echo "<th>$row[5]</th>";
                echo '<th><button type="button" class="btn btn-danger btn-sm">Drop</button></th>';
              echo "</tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php
    require_once("./footer.php");
?>