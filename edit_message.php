<?php
include ('connect_database.php');

$post_id = $_POST['post_id'];

$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";