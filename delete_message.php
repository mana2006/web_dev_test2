<?php
include ('connect_database.php');

$post_id = $_POST['post_id'];

$sql = "DELETE FROM post WHERE id=".$post_id;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Record deleted fails";
}
