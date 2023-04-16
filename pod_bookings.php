<!-- Louis doing config file, connect to database, reading and filling top half of page;

Book form will be [room] [date] [time] 

<?php
$servername = "304.itpwebdev.com";
$username = "itp460_team3";
$password = 'u$cItp2023';
$db = "itp460_team3";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Array of available times
$available_times = ["10AM", "11AM", "12PM", "1PM", "2PM", "3PM", "4PM", "5PM", "6PM"];

//For each room in this library - get row from reservations
$sql = "SELECT library_id, date, time, room  FROM reservation WHERE library_id=1 AND room=1";
$result = $conn->query($sql);

//remove booked time from available times
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    for($i = 0; $i < sizeof($available_times); $i++){
        if($available_times[$i] == $row['time']){
            array_splice($available_times, $i, 1);
        }
    }
  }
} else {
  echo "0 results";
}

//New available times, put into <option> tags for booking form
echo implode(" ", $available_times);

$conn->close();
?>