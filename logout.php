<?php
include "config/app.php";

session_start();
session_destroy();
header('location:login.php');

?>