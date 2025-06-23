<?php
require_once '../config/conexao.php';
require_once '../model/Cliente.php';
require_once '../dao/ClienteDAO.php';
require_once '../controller/ClienteController.php';

$controller = new ClienteController();
$controller->login();
