<?php
session_start();
$hostname = "http://localhost/news/admin";
$conn = mysqli_connect("localhost", "root", "", "news");
$limit = 4;
?>