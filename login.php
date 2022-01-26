<!-- Starting a session -->
<?php
    session_start();
?>

<!-- Connecting database -->
<?php include('./dbconnection.php') ?>

<!-- Handleing post data -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $RollNo = $_POST['RollNo'];
        $Password = $_POST['Password'];

        $loginquery = "select * from studentdata where RollNo=\"${RollNo}\" and Password=\"${Password}\" ";

        $result = $conn->query($loginquery);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            // Storing session variables for user.php page
            $_SESSION['user_Name'] = $row["Name"];
            $_SESSION['user_RollNo'] = $row["RollNo"];
            $_SESSION['user_Hostel'] = $row["Hostel"];
            $_SESSION['user_Room'] = $row["Room"];
            
            header("Location: "."http://localhost/HostelManagementSystem/user.php");
            die();
        }
        else {
            echo "<br>UserName/Password incorrect.<br>If not registered, plz register <a href='index.php'>here</a>";
        }

    }
    else{
        echo 'Page Not Found';
    }
?>