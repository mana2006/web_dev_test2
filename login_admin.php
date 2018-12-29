<?php
include ('connect_database.php');

$user_name = $_POST['user_name'];
$password = $_POST['password'];

$sql = "select * from users where name = '".$user_name."' AND password = '".$password."'";
$res_data = mysqli_query($conn,$sql);

if ($res_data->num_rows > 0) {
    $_SESSION['admin'] = true;
    echo 'Login Sucess !';
} else {
    echo "Login false";
}