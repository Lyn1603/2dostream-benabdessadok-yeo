<?php
require_once './class/connect.php';
require_once './class/user.php';
session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
header('location:./inscription.php');
