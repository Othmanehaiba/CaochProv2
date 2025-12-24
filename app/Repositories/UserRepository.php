<?php
require_once __DIR__ . "/../../config/database.php";

class UserRepository {
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Database::connect();
    }

    public function createCoach($coach): bool {
        $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe, role, discipline, experience, bio)
                VALUES (?, ?, ?, ?, 'coach', ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $coach->nom,  
            $coach->prenom,
            $coach->email,
            $coach->password,
            $coach->discipline,
            $coach->experience,
            $coach->description
        ]);
    }
    public function createSportif($sportif): bool {
        $sql = "INSERT INTO users (nom, prenom, email, mot_de_passe, role)
                VALUES (?, ?, ?, ?, 'sportif')";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $sportif->nom,  
            $sportif->prenom,
            $sportif->email,
            $sportif->password,
        ]);
    }

    public function checkCoach($email, $password){
        $sql = "SELECT * FROM coachs c JOIN users u WHERE u.id_user = c.id_user AND u.email = ? AND u.pass = ? ";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute($email, $password)){
            header("Location: ../views/dashboard.coach.php");
            exit;
        }
    }

    public function checkSportif($email, $password){
        $sql = "SELECT * FROM sportifs s JOIN users u WHERE s.id_user = c.id_user AND u.email = ? AND u.pass = ? ";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute($email, $password)){
            header("Location: ../views/dashboard.sportif.php");
            exit;
        }else{
            die();
        }
    }

    public function checkAdmin($email, $password){
        $sql = "SELECT * FROM admin WHERE id_admin = 1 AND email = ? AND pass = ? ";
        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute($email, $password)){
            header("Location: ../views/dashboard.sportif.php");
            exit;
        }else{
            die();
        }
    }
}
