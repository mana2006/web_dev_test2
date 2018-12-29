<?php
include ('connect_database.php');

$content = $_POST['content'];
$user_name = $_POST['user_name'];
date_default_timezone_set("Asia/Bangkok");
$created_at = date('Y-m-d h:m:i');


$sql = 'INSERT INTO post (user_name, content, created_at)
VALUES ("'.$user_name.'", "'.$content.'", "'.$created_at.'")';

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "New record created false";
}

$conn->close();