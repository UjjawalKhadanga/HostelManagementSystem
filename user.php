<!-- Starting a session -->
<?php
    session_start();
?>

<!-- Connecting database -->
<?php include('./dbconnection.php') ?>


<?php
    // Query for fetching all distinct hostels that are available
    $hostel_list = $conn->query("select distinct Hostel from hostel where Availability=True");
    $hostels_array = []; // hostels_array is an array that stores distinct hostels and their available rooms
    while($row=$hostel_list->fetch_array()){
        $hostels_array[$row["Hostel"]]=array();
    }

    // Query for getting hotel and rooms for available rooms 
    $hostel_query = $conn->query("select Hostel,Room from hostel where Availability=True");

    // updating available rooms in the hostel array
    while($row=$hostel_query->fetch_array()){
        $hos=$row["Hostel"];
        $room=$row["Room"];
        array_push($hostels_array[$hos], $room);
    }

    // Storing the available hostels data (json encoded sting) as session vaiable for use in select input options
    $_SESSION['hostel_array']=json_encode($hostels_array);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/user.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Welcome to IIT MANDI Hostel Management System!!</title>
</head>

<body>
    <div class="admin">
        <div class="header">
            <img src="./images/logo.jpg" alt="IITMANDILOGO" id="logo">
            
            <h1>IIT MANDI HOSTEL MANAGEMENT SYSTEM</h1>
            
            <div class="logout">
                    <a href="logout.php">Log Out</a>
            </div>
        </div>

        <div class="container">
            <div class="navbar">
                <ul class="menu">
                    <li class="menu__item">
                        <div class="menu__link" id="book_link">BOOK</div>
                    </li>
                    <li class="menu__item">
                        <div class="menu__link" id="swap_link">SWAP</div>
                    </li>
                    <li class="menu__item">
                        <div class="menu__link" id="vacate_link">VACATE</div>
                    </li>
                    <li class="menu__item">
                        <div class="menu__link" id="hosav_link"> CHECK AVAILABLE ROOMS</div>
                    </li>

                </ul>
            </div>
            <div class="user-info">
                <ul>
                    <!--using session variables to display user details -->
                    <li>Name: <?php echo $_SESSION['user_Name'];?></li>
                    <li>RollNo: <?php echo $_SESSION['user_RollNo'];?></li>
                    <li>Hostel: <?php echo $_SESSION['user_Hostel'];?></li>
                    <li>Room: <?php echo $_SESSION['user_Room'];?></li>
                </ul>
  
                
            </div>
            <div class="main">
                <div class="book active">
                    <form action="book.php" method="post">
                        <label>Hostel </label> 
                        <select id="Hostel" name="Hostel">
                            <option value="none" disabled selected>Select a Hostel</option>
                            <!-- displaying the available hostels in the select inputs -->
                            <?php
                                foreach(array_keys($hostels_array) as $x){
                                    echo "<option value='${x}'>${x}</option>";
                                }  
                            ?>
                        </select><br>
                        <label>Room </label>
                        <select type="text" id="Room" name="Room">
                            <!-- these options are dynamically updated using javascript -->
                            <option value='none' selected disabled>Select Room No</option>    
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                            <option value='8'>8</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                        </select><br>
                        <label>Password </label><input type="password" id="Password" name="Password"><br>
                        <button type="submit">BOOK</button>
                    </form>
                </div>
                <div class="swap">
                    <form action="swap.php" method="post">
                        <label>Current Hostel </label><input type="text" id="curent-hostel" name="curent-hostel" value="<?php echo $_SESSION['user_Hostel']?>" disabled><br>
                        <label>Current Room</label><input type="text" id="curent-room" name="curent-room" value="<?php echo $_SESSION['user_Room']?>" disabled><br>
                        <label>Preffered Hostel</label><select <?php if(!$_SESSION['user_Hostel']){echo 'disabled';}?> type="text" id="preffered-hostel" name="preffered-hostel" ><option value='100' disabled selected>Select a Hostel</option><?php foreach(array_keys($hostels_array) as $x){echo "<option value='${x}'>${x}</option>";} ?></select><br>
                        <label>Preffered Room</label><select <?php if(!$_SESSION['user_Room']){echo 'disabled';}?> type="text" id="preffered-room" name="preffered-room" ><option value='100' selected disabled>Select Room No</option></select><br>
                        <label>Password</label><input type="password" id="Password" name="Password"><br>
                        <button type="submit">SWAP</button>
                    </form>
                </div>
                <div class="vacate">
                    <form action="vacate.php" method="post">
                        <label>Password</label><input type="password" id="Password" name="Password"><br>
                        <button type="submit">VACATE</button>
                    </form>
                </div>
                <div class="HosAv">
                    

                    <form id='table-form'>
                        <label for="txt">Select Hostel</label>
                        <select type="text" id="txt" name="txt">
                            <option value=''>Show All</option>
                            <!-- displaying the available hostels in the select inputs -->
                            <?php
                                foreach(array_keys($hostels_array) as $x){
                                    echo "<option value='${x}'>${x}</option>";
                                }  
                            ?>
                        </select>
                        <button type="submit">SEARCH</button><br>
                    </form>
                    <div id="table-section">
                            <table id="table">
                                <thead>
                                    <tr>
                                        <th>Hostel</th>
                                        <th>Room No</th>
                                        <th>Availability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><th>_</th><th>_</th><th>_</th></tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>


</body>

<!-- linking user.js -->
<script src="./user.js"></script>

<!-- script for updating available rooms in the dom -->
<script >
    var hostel_array = JSON.parse('<?php echo $_SESSION['hostel_array']; ?>');
    
    document.getElementById("Hostel").addEventListener("input", function(evt){
        var datalist = document.getElementById("Room");
        var hos = this.value;
        var arr = hostel_array[`${hos}`];
        var str = `<option value="none" diasbled selected>Select Room No</option>`;
        for(let i=0;i < arr.length;i++ ){
            str=str.concat(`<option value="${arr[i]}">${arr[i]}</option>`);
        };
        datalist.innerHTML=str;    
    })
    document.getElementById("preffered-hostel").addEventListener("input", function(evt){
        var datalist = document.getElementById("preffered-room");
        var hos = this.value;
        var arr = hostel_array[`${hos}`];
        var str = `<option value="none" diasbled selected>Select Room No</option>`;
        for(let i=0;i < arr.length;i++ ){
            str=str.concat(`<option value="${arr[i]}">${arr[i]}</option>`);
        };
        datalist.innerHTML=str;   
    })
    
</script>

</html>

