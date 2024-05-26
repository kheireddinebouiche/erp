<?php

require 'layouts/config.php';


$id = $_GET['id'];

$req = mysqli_query($link, "DELETE FROM students WHERE id='$id' ");

$response = array();
