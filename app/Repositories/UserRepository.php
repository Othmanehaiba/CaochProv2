<?php
require_once __DIR__ . "/../../config/database.php";

class UserRepository {
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Database::connect();
    }

    public function createCoach($coach): bool {
        $sql = "INSERT INTO users (nom, prenom, email, pass, role, discipline, experience, bio)
                VALUES (?, ?, ?, ?, 'coach', ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        $hash = password_hash($coach->password, PASSWORD_DEFAULT);

        return $stmt->execute([
            $coach->nom,
            $coach->prenom,
            $coach->email,
            $hash,
            $coach->discipline,
            $coach->experience,
            $coach->description
        ]);
    }

    public function createSportif($sportif): bool {
        $sql = "INSERT INTO users (nom, prenom, email, pass, role)
                VALUES (?, ?, ?, ?, 'sportif')";

        $stmt = $this->pdo->prepare($sql);

        $hash = password_hash($sportif->password, PASSWORD_DEFAULT);

        return $stmt->execute([
            $sportif->nom,
            $sportif->prenom,
            $sportif->email,
            $hash,
        ]);
    }

    public function checkLogin(string $email, string $password, string $role): void {
        $sql = "SELECT * FROM users WHERE email = ? AND role = ? AND pass = ? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $role, $password]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            die("User not found");
        }

        session_start();
        $_SESSION["id_user"] = $user["id_user"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["nom"] = $user["nom"];
        $_SESSION["prenom"] = $user["prenom"];

        if ($role === "coach") {
            header("Location: ../../views/dashboard.coach.php");
            exit;
        } elseif ($role === "sportif") {
            header("Location: ../views/dashboard.sportif.php");
            exit;
        } else { 
            header("Location: ../views/dashboard.admin.php");
            exit;
        }
    }
}
