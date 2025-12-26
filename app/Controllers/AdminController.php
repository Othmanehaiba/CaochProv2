<?php
require_once __DIR__ . "/../../config/Database.php";

class AdminController {
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Database::connect();
    }

    public function afficherProfiles(){
        $sql = "SELECT *
                FROM users ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $user;        
    }
}
