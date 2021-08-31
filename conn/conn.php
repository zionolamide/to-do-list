<?php 
session_start();
$conn = new mysqli ('localhost', 'root', '', 'todo')or die($conn->error());
?>