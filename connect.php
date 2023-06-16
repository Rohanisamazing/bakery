<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$address = $_POST['address'];
$item = $_POST['item'];
$quantity = $_POST['quantity'];

//Database Connection
$conn = new mysqli('localhost','root','','database');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(firstname, lastname, email, address, item, quantity)
    values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi",$firstname, $lastname, $email, $address, $item, $quantity);
    $stmt->execute();
    echo "Order Sucessful...";
    $stmt->close();
    $conn->close();
}
?>