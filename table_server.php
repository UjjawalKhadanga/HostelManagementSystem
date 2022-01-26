
<?php

if(isset($_POST['txt'])){
    $val = $_POST['txt'];
    if($val == ""){$query = "select * from hostel";}
    else{$query = "select * from hostel where Hostel='${val}' ";}
    
    $search_result = filter($query);
}
else {
    $query = "SELECT * FROM hostel";
    $search_result = filter($query);
}

$emparray = array();
while($row = mysqli_fetch_assoc($search_result)){
        $emparray[] = $row;
    }
// $final_result is the json encoded array of all the hostels
$final_result = json_encode($emparray);

// echoing the result
echo $final_result;

// Function for filtering the query
function filter($query){
    include('./dbconnection.php');
    $result = $conn->query($query);
    $conn->close();
    return $result; 
}
?>