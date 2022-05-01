<?php


include_once('Model/Usuario.php');
include_once('DAO/UsuarioDAO.php');
include_once('DAO/DaoFactory.php');
include_once('DAO/PostgresDaoFactory.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$factory = new PostgresDaofactory();

?>