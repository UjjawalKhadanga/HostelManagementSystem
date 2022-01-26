<!-- Starting a session -->
<?php
    session_start();
?>
<!-- Connecting database -->
<?php include('./dbconnection.php') ?>

<!-- Handling post data -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $Password = $_POST['Password'];
        $RollNo = $_SESSION['user_RollNo'];
        $prev_Hostel = $_SESSION['user_Hostel'];
        $prev_Room = $_SESSION['user_Room'];

        $result = $conn->query("select Password from studentdata where RollNo='${RollNo}'");
        $row = $result->fetch_array();
        if ($row['Password'] == $Password){
            $conn->query("update studentdata set Hostel=NULL,Room=NULL where RollNo='${RollNo}'");
            $conn->query("update hostel set Availability=TRUE where Hostel='${prev_Hostel}' and Room='${prev_Room}'");
            $_SESSION['user_Hostel']='';
            $_SESSION['user_Room']='';
            header("Location: "."http://localhost/HostelManagementSystem/user.php");
            die();
        }
        else{
            echo "Incorrect Password";
            echo "<a href='http://localhost/HostelManagementSystem/user.php'>Try Again</a>";
        }
    }
    else{
        echo 'Page Not Found';
    }    

?>