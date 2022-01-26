<!-- starting a session -->
<?php
    session_start();
?>

<!-- Connecting database -->
<?php include('./dbconnection.php') ?>

<!-- Handling post data -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $Password = $_POST['Password'];
        $prev_Hostel = $_SESSION['user_Hostel'];
        $prev_Room = $_SESSION['user_Room'];
        if($_POST['preffered-hostel']){$Hostel = $_POST['preffered-hostel'];}
        else{$Hostel = '';}
        if($_POST['preffered-room']){$Room = $_POST['preffered-room'];}
        else{$Room = '';}

        if($Hostel=='none' or $Room=='none'){header("Location: "."http://localhost/HostelManagementSystem/user.php"); die();}   

        $roll=$_SESSION["user_RollNo"];
        $result = $conn->query("select Password, Hostel, Room from studentdata where RollNo='${roll}'");
        $row = $result->fetch_array();
        if ($row['Password'] == $Password){
            echo "User Verified!!";
            if($row['Hostel'] != NULL and $row['Room'] != NULL){
                if($conn->query("update studentdata set Hostel='${Hostel}', Room='${Room}' where RollNo='${roll}'") == TRUE){
                    $conn->query("update hostel set Availability=FALSE where Hostel='${Hostel}' and Room='${Room}'");
                    $conn->query("update hostel set Availability=TRUE where Hostel='${prev_Hostel}' and Room='${prev_Room}'");
                    echo "Congrats!! You have swapped your Choise";
                    $_SESSION['user_Hostel']= $Hostel;
                    $_SESSION['user_Room']= $Room;
                    header("Location: "."http://localhost/HostelManagementSystem/user.php");
                    die();
                }
            }
            else{
                echo "<script>alert('Sorry, You have not Booked before. Use the BOOK section to choose your Hostel and Room.')</script>";
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