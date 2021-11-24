<?php

$servername = "localhost";
$username = "root";
$password = "outlook8009";
$dbname = "phpBot";

// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE TABLE myData (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Governor_ID VARCHAR(30) NOT NULL,
Player VARCHAR(30) NOT NULL,
Alliance VARCHAR(30) NOT NULL,
Power VARCHAR(30) NOT NULL,
Kills VARCHAR(30) NOT NULL,
T1_Kills VARCHAR(30) NOT NULL,
T2_Kills VARCHAR(30) NOT NULL,
T3_Kills VARCHAR(30) NOT NULL,
T4_Kills VARCHAR(30) NOT NULL,
T5_Kills VARCHAR(30) NOT NULL,
Kill_Points VARCHAR(30) NOT NULL,
Deads VARCHAR(30) NOT NULL,
Gathered VARCHAR(30) NOT NULL,
Assistance VARCHAR(30) NOT NULL,
DateScan VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();


function insert($Governor_ID, $Player, $Alliance, $Power, $Kills, $T1_Kills, $T2_Kills, $T3_Kills, $T4_Kills, $T5_Kills, $Kill_Points, $Deads, $Gathered, $Assistance, $DateScan){

    $conn = new mysqli("localhost", "root", "outlook8009" , "phpBot");

    $sql = "INSERT INTO myData (Governor_ID, Player, Alliance, Power, Kills, T1_Kills, T2_Kills, T3_Kills, T4_Kills, T5_Kills, Kill_Points, Deads, Gathered, Assistance, DateScan)
            VALUES ('$Governor_ID', '$Player', '$Alliance', '$Power', '$Kills', '$T1_Kills', '$T2_Kills', '$T3_Kills', '$T4_Kills', '$T5_Kills', '$Kill_Points', '$Deads', '$Gathered', '$Assistance', '$DateScan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        return 1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return 0;
    }

}

function search($Governor_ID , $search){

    $conn = new mysqli("localhost", "root", "outlook8009" , "phpBot");


    if($search == 'Player' || $search == 'player'){
        $sql = "SELECT Player FROM myData where Governor_ID = '$Governor_ID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['Player'];
            }
        } else {
            return 0;
        }
    }elseif ($search == 'Alliance' || $search == 'alliance'){
        $sql = "SELECT Alliance FROM myData where Governor_ID = '$Governor_ID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['Alliance'];
            }
        } else {
            return 0;
        }
    }elseif ($search == 'Power' || $search == 'power'){
        $sql = "SELECT Power FROM myData where Governor_ID = '$Governor_ID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['Power'];
            }
        } else {
            return 0;
        }
    }elseif ($search == 'Kills' || $search == 'kills'){
        $sql = "SELECT Kills FROM myData where Governor_ID = '$Governor_ID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['Kills'];
            }
        } else {
            return 0;
        }
    }elseif ($search == 'T1_Kills' || $search == 't1_kills'){
        $sql = "SELECT T1_Kills FROM myData where Governor_ID = '$Governor_ID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                return $row['T1_Kills'];
            }
        } else {
            return 0;
        }
    }

}