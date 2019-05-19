<?php
  session_start();
  if (!$_SESSION["studentid"]) {
    $_SESSION["studentid"] = $_POST["studentid"];
  }
  require_once("./connect.php");
  require_once("./header.php");
?>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3"><?php echo $stuname ?>'s Schedule<h1>
        <table class="table table-bordered table-striped">
          <thead class="table-primary">
            <tr>
              <th>Course</th>
              <th>Instructor</th>
              <th>Room #</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody class="">
          <?php
            $res = pg_query($db, "select * from student_schedule where $stuid = id");
            while ($row = pg_fetch_row($res)){
              echo "<tr>";
                echo "<th>$row[1]</th>";
                echo "<th>$row[3]</th>";
                echo "<th>$row[4]</th>";
                echo "<th>$row[5]</th>";
              echo "</tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4 card card-body" style="background-color:PowderBlue">
          <h2>Course History</h2>
          <p>See your previous courses and GPA.</p>
          <p><a class="btn btn-primary" href="history.php" role="button">View history&raquo;</a></p>
        </div>
        <div class="col-md-4 card card-body bg-light">
          <h2>Drop Classes</h2>
          <p>Drop courses from next semester's schedule.</p>
          <p><a class="btn btn-danger" href="drop.php" role="button">Drop &raquo;</a></p>
        </div>
        <div class="col-md-4 card card-body" style="background-color:PowderBlue">
          <h2>Add Classes</h2>
          <p>Add courses to your next semester's schedule.</p>
          <p><a class="btn btn-success" href="add.php" role="button">Add &raquo;</a></p>
        </div>
      </div>

      <hr>

    </div> <!-- /container -->

  </main>
<?php
  require_once("./footer.php");
/*
  <footer class="container">
    <p>&copy; David Porter 2019</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>
*/
?>