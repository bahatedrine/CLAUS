<?php
$newConnection = mysqli_connect('localhost','root', '', 'cluas');
if($newConnection){
    $mydata = [];
    $myfigures = [];
    $sql2 = "select distinct purpose, count(*) as 'frequency' from uselog group by purpose";
    $query_result = mysqli_query($newConnection, $sql2);
    while($row = mysqli_fetch_assoc($query_result)){
        array_push($mydata, $row['purpose']);
        array_push($myfigures, $row['frequency']);
    }
   
}
$joint = [
    'text' => $mydata,
    'figures' => $myfigures,
];
echo json_encode($joint);
?>