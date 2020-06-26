<?php
include('config.php');
$id = $_POST['id'];

$sql = "select * from bins where a_id='".$id."'";
$pos = array();
if (mysqli_query($db, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

$result = mysqli_query($db , $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
            while($row = mysqli_fetch_assoc($result)) { 
                                    
                  $pos[] = array(
                         "lat" => $row['lat'], 
                         "lng" => $row['lng'], 
                         
                  );
            }
}
 else {
      echo "No bins in selected Area!";
}


echo json_encode($pos);
?>