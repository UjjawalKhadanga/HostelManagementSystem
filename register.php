
<!-- Connecting database -->
<?php include('./dbconnection.php') ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $Name = $_POST['Name'];
        $RollNo = $_POST['RollNo'];
        $Email = $_POST['Email'];
        $Branch = $_POST['Branch'];
        $Password = $_POST['Password'];

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // Validation
        if (!preg_match("/^[a-zA-Z-' ]*$/",test_input($Name))) {
            echo "Invalid Name : Only letters and white space allowed<br>";
            exit();
        }
        if (!preg_match("/([ABTD]|[abcd])([0][8-9]|[1-2][0-9])[0-9][0-9][0-9]/",test_input($RollNo))) {
            echo "Roll No. invalid<br>";
            exit();
        }
        if (!filter_var(test_input($Email), FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format<br>";
            exit();
        }


        $regquery = "insert into studentdata(Name,RollNo,Email,Branch,Password) values (\"${Name}\",\"${RollNo}\",\"${Email}\",\"${Branch}\",\"${Password}\") ";

        if ($conn->query($regquery) === TRUE) {
            echo "Registration Successful!!";
            $conn->close();
            header("Location: "."http://localhost/HostelManagementSystem/index.php");
            die();
        }
        else {
            echo "Error" . $conn->error;
        }
    }
    else{
        echo 'Page Not Found';
        $conn->close();
    }
    
?>