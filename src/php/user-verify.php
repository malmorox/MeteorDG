<?php
//Archivo PHP para comprobar si el usuario tiene la cookie para poder ver lasa páginas privadas (Facturas)
session_start();

if(!isset($_SESSION['isUser']) && $$_SESSION['isUser'] != 1){
    header('Location: index.html');
    die();
}
?>