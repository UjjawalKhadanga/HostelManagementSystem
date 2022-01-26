<?php

$RollNo = array("a");
for($i = 10; $i <= 20; $i++) {
    for($j = 100; $j <= 200; $j++){
        array_push($RollNo,"B".strval($i).strval($j));
    }
}

foreach($RollNo as $x){
    if(!preg_match("/[ABTD]([0][8-9]|[1-2][0-9])[0-9][0-9][0-9]/",test_input($x))){
        echo "Roll No. invalid<br>";
    }
    else{
        echo $x;
        echo "<br>";
    }
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>