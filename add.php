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

    <div id="content-wrapper">

<div class="container-fluid pt-5">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="student_home.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Classes</li>
  </ol>

  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Select Course to Add</div>
    <div class="card-body">
      <div class="table-responsive table-hover">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="table-primary">
            <tr>
              <th>Subject</th>
              <th>Course</th>
              <th>Teacher</th>
              <th>Period</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Subject</th>
              <th>Course</th>
              <th>Teacher</th>
              <th>Period</th>
            </tr>
          </tfoot>
          <tbody>
              <?php
                $lenny = "";
                $res = pg_query($db, "select co.num, co.areaofstudy, co.coursename, emp.lname, sec.classperiod 
                                      from section sec inner join course co on sec.courseid = co.id inner join faculty fac on sec.facemployeeid = fac.id inner join employee emp on fac.id = emp.id
                                      where sec.semesteryear = '2018S'::char(5)
                                      order by co.num");
                while ($row = pg_fetch_row($res)){
                    echo "<tr>";
                    echo "<th>$row[1] $row[0]</th>";
                    echo "<th>$row[2]</th>";
                    echo "<th>$row[3]</th>";
                    echo "<th>$row[4]</th>";
                    echo "</tr>";
                    $lenny = "$row[1] $row[0] | $row[2] | $row[3] | $row[4] ?";
                } 
              ?>
          </tbody>
        </table> 
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

  <p class="small text-center text-muted my-5">
    <em>More table examples coming soon...</em>
  </p>

</div>
<!-- /.container-fluid -->


</div>
<!-- /.content-wrapper -->
<div class="col-xl-4 card card-body mt-5">
                <h4>Are you sure you want to add this course?</h4>
                <p><?php echo $lenny ?></p>

          <p><a class="btn btn-success" href="add.php" role="button">Add</a></p>
            </div>

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
  </div>
</div>
<?php
    require_once("./footer.php");
?>