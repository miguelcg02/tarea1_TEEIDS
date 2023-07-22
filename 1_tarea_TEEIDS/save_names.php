<?php

$server="localhost:33065";
$user="root";
$password="";
$dbname="1_names";

try{
    $conn=new PDO("mysql:host=$server;dbname=$dbname",$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connection established";

    if(isset($_POST['txtName']) && !empty($_POST['txtName'])){
        $name=$_POST['txtName'];
        $sql="INSERT INTO `names` (`name`) VALUES ('$name');";
        $conn->exec($sql);
        header('Location: index.html');
        exit();
    }else{
        header('Location: index.html');
        exit();
    }

}catch(PDOException $e){
    echo "connection not established, ERROR: ".$e->getMessage();
}

?>