<?php
    session_start();
    require_once("./connect.php");
    require_once("./header.php");
?>

<div class="container-fluid">
    <h2>Section title</h2>
    <div class="table-responsive">
    <table class="table">
          <thead class="table-primary">
            <tr>
              <th>Course</th>
              <th>Instructor</th>
              <th>Semester</th>
              <th>Grade</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $res = pg_query($db, "select * from student_grades where $stuid = id AND semesteryear != '2017F'");
            $cksemester = "2014F";
            $lastsemester;
            $classcount = 0;
            $gpacount = 0;
            while ($row = pg_fetch_row($res)){
              if ($cksemester != $row[4]) {
                  $res2 = pg_query($db, "select calc_student_gpa($stuid, '$cksemester')");
                  $gpa = pg_fetch_row($res2);
                  echo "<tr>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th class='table-active'>GPA:</th>";
                    echo "<th class='table-active'>$gpa[0]</th>";
                  echo "<tr>";
                  $cksemester = $row[4];
                  $gpacount += $gpa[0];
                  $classcount++;
              }
              echo "<tr>";
                echo "<th>$row[2]</th>";
                echo "<th>$row[5]</th>";
                echo "<th>$row[4]</th>";
                echo "<th>$row[6]</th>";
              echo "</tr>";
              $lastsemester = $row[4];
            }
                  $res2 = pg_query($db, "select calc_student_gpa($stuid, '$lastsemester')");
                  $gpa = pg_fetch_row($res2);
                  echo "<tr>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "<th class='table-active'>GPA:</th>";
                    echo "<th class='table-active'>$gpa[0]</th>";
                  echo "<tr>";
                  $gpacount += $gpa[0];
                  $classcount++;
                $ogpa = $gpacount / $classcount;
                if ($ogpa > 3.0) {
                    echo "<tr class='table-success'>";
                } elseif ($ogpa > 2.0) {
                    echo "<tr class='table-warning'>"; 
                } else {
                    echo "<tr class='table-danger'>";
                }
                    echo "<th></th>";
                    echo "<th></th>";
                echo "<th>Overall GPA:</th>";
                echo "<th>$ogpa</th>";
            echo "<tr>";
          ?>
          </tbody>
        </table>
      </div>
    <button class="btn btn-primary">
      Print Report Card
    </button>
    </div>
</div>

<?php
    require_once("./footer.php");
?>