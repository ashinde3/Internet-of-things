
<?php
 include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="index.php"><h3>Smart Waste Disposal</h3><a>
                </div>

                <ul class="list-unstyled components">
                    <p>DashBoard</p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">SYSTEM ACTION</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                          <li><a href="current_bins.php">CURRENT BINS COLLECTION</a></li>

                        </ul>
                    </li>
                    <li>

                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">SYSTEM MONITORING</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                          <li><a href="bins_notfilled.php">BINS NOT FILLED</a></li>

                        </ul>
                    </li>
                </ul>
                 <ul class="list-unstyled CTAs">
                    <li><a>copyright</a></li>
                    <li><a>IOT_project_2020</a></li>
                </ul>

            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>MENU</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a ><?php echo $login_session; ?></a></li>
                               <li><a href="bins_details.html">Bins Details</a></li>
                                <li><a href="Area.php">bin locations</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class=" col-lg-12 content-wrapper">

      <div class="row" id="show">

                    <table class="table table-hover">
                       <thead>
                          <tr class="text-primary">
                             <th>#</th>
                             <th>bin_id</th>
                             <th>bin_add</th>
                             <th>last collected</th>
                             <th>no. of times(in a day)</th>
                          </tr>
                       </thead>

<?php
//include('config.php');
$sql = "select * from bins_analysis" ;

if (mysqli_query($db, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
$count=1;
$result = mysqli_query($db , $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th scope="row">
                              <?php echo $count; ?>
                              </th>
                              <td>
                              <?php echo $row['bins_id']; ?>
                              </td>
                              <td>
                              <?php echo $row['bin_add']; ?>
                              </td>
                              <td>
                              <?php echo $row['last_collected']; ?>
                              </td>
                              <td>
                              <?php echo $row['times']; ?>
                              </td>
                           </tr>
                        </tbody>
<?php
$count++;
}
} else {
echo "0 results";
}
?>
      </table>


</div>
</div>

       <div class=" col-lg-12 content-wrapper">

         <div class="row" id="show">







         </div>
      </div>

             <!--  <div class="row">
                 <div class="col-sm-4" >
                   <div class="card  mb-3" style="max-width: 36rem;">
                     <div class="card-body">
                       <h3 class="card-title">Numbers of bins</h3>
                       <p class="card-text"><h3><?php echo  $count; ?></h3></p>
                       <a href="bins_notfilled.php" class="btn btn-info">View Details</a>
                     </div>
                   </div>
                 </div>

                <div class="col-sm-4">
                   <div class="card">
                     <div class="card-body">
                       <h3 class="card-title">Number of trucks</h3>
                       <p class="card-text"><h3><?php echo  $count1; ?></h3></p>
                       <a href="idle_truck.php" class="btn btn-info" >View Details</a>
                     </div>
                   </div>
                 </div>

                 <div class="col-sm-4">
                   <div class="card ">
                     <div class="card-body">
                       <h3 class="card-title">Supporting Area</h3>
                       <p class="card-text"><h4>click to see the details of supporting area and regions which we cover</h4></p>
                       <a href="Area.php" class="btn btn-info">View Details</a>
                     </div>
                   </div>
                 </div>

               </div> -->




             <div class="container">
    <!--<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <!--<div class="carousel-inner"  style = " max-width:100%;  max-height: 300px ">
      <div class="item active">
        <img src="images/swachh-bharat.jpg" alt="Los Angeles" style="width:100%; height: 50%">
      </div>

      <div class="item">
        <img src="images/images.jpg" alt="Chicago" style="width:100%; height: 50%">
      </div>

      <div class="item">
        <img src="images/swachh.jpg" alt="New york" style="width:100%;height: 50%">
      </div>
    </div> -->

    <!-- Left and right controls -->
    <!--<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>-->
</div>






        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
