<?php
require_once '../dao/DroneDAO.php';
require_once '../config/conexao.php';

class DroneController {
    private DroneDAO $droneDAO;

    public function __construct() {
        global $pdo;
        $this->droneDAO = new DroneDAO($pdo);
    }

    public function mostrarDrones(): void {
        $drones = $this->droneDAO->listarTodos();
        require_once '../view/sessao-produtos.php';
    }
}
