<?php
session_start();

unset($_SESSION['idtransaksi']);
header('location: ../dbAdmin.php');

?>