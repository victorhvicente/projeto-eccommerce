<?php
require_once '../config/conexao.php';
require_once '../model/Drone.php';
require_once '../dao/DroneDAO.php';
require_once '../controller/DroneController.php';

$controller = new DroneController();
$controller->mostrarDrones();
