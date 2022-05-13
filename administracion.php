<?php
session_start();

if(!isset($_SESSION['Rol'])){
    header ('location: index.php');
}else{
    if($_SESSION['Rol'] != 3){
        header('location: index.php');
    }
}
?>