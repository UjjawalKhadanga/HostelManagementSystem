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
        $Hostel = $_POST['Hostel'];
        $Room = $_POST['Room'];
        if($Hostel=='none' or $Room=='none'){
            header("Location: "."http://localhost/HostelManagementSystem/user.php");
            die();
        }

        $roll=$_SESSION["user_RollNo"];
        $result = $conn->query("select Password, Hostel, Room from studentdata where RollNo='${roll}'");
        $row = $result->fetch_array();
        if ($row['Password'] == $Password){
            echo "User Verified!!";
            if($row['Hostel'] == NULL and $row['Room'] == NULL){
                if($conn->query("update studentdata set Hostel='${Hostel}', Room='${Room}' where RollNo='${roll}'") == TRUE){
                    $conn->query("update hostel set availability=FALSE where Hostel='${Hostel}'and Room='${Room}'");
                    echo "Congrats!! Hostel is Booked";
                    $_SESSION['user_Hostel']= $Hostel;
                    $_SESSION['user_Room']= $Room;
                    header("Location: "."http://localhost/HostelManagementSystem/user.php");
                    die();
                }
            }
            else{
                // echo "<script>alert('Sorry, You have Already Booked. Use the SWAP section if you want to change your Hostel and Room')</script>"; 
                header("Location: "."http://localhost/HostelManagementSystem/user.php");
                die();
                
                
            }
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