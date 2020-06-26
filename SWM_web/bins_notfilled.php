<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src = "jquery/jquery.js"></script>
              <script type="text/javascript" >
               /* $(document).ready(function(){
                  setInterval(function(){
                    //alert("mah");
                    $('#show').load('#');
                  },15000);
                });*/
                setTimeout(function(){
                   window.location.reload(1);
                }, 5000);
              </script>
</head>
<body>
  <h3 class="text-primary">bins Details</h3>
<div class=" col-lg-12 content-wrapper">

      <div class="row" id="show">

                    <table class="table table-hover">
                       <thead>
                          <tr class="text-primary">
                             <th>#</th>
                             <th>bin_id</th>
                             <th>bin_capac</th>
                             <th>bin_address</th>
                             <th>lat</th>
                             <th>lng</th>
                          </tr>
                       </thead>

<?php
include('config.php');
$sql = "select * from bins where bins_cap_fill < 80 " ;
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
                              <?php echo $row['bins_cap_fill']; ?>
                              </td>
                              <td>
                              <?php echo $row['bins_add']; ?>
                              </td>
                              <td>
                              <?php echo $row['lat']; ?>
                              </td>
                              <td>
                              <?php echo $row['lng']; ?>
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
</body>
</html>
