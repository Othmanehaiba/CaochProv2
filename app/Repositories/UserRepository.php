<?php
require_once __DIR__ . "/../../config/Database.php";

class UserRepository {
    private PDO $pdo;

    public function __construct(){
        $this->pdo = Database::connect();
    }

    public function createCoach($coach): bool {
       $sqlUser = "INSERT INTO users (nom, prenom, email, pass, role)
                    VALUES (?, ?, ?, ?, 'coach')";
        $stmtUser = $this->pdo->prepare($sqlUser);

        $okUser = $stmtUser->execute([
            $coach->getNom(),
            $coach->getPrenom(),
            $coach->getEmail(),
            $coach->getPassword()   
        ]);

        if (!$okUser) {
            return false;
        }

        $userId = $this->pdo->lastInsertId();

        $sqlCoach = "INSERT INTO coachs (user_id, discipline, experience, description)
                     VALUES (?, ?, ?, ?)";
        $stmtCoach = $this->pdo->prepare($sqlCoach);

        return $stmtCoach->execute([
            $userId,
            $coach->getDiscipline(),
            $coach->getExperience(),
            $coach->getDescription()
        ]);
    }

    public function createSportif($sportif): bool {
        $sql = "INSERT INTO users (nom, prenom, email, pass, role)
                VALUES (?, ?, ?, ?, 'sportif')";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $sportif->getNom(),
            $sportif->getPrenom(),
            $sportif->getEmail(),
            $sportif->getPassword()
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
            header("Location: /views/dashboard.coach.php");
            exit;
        } elseif ($role === "sportif") {
            header("Location: /views/dashboard.sportif.php");
            exit;
        } else { 
            header("Location: /views/dashboard.admin.php");
            exit;
        }
    }

    public function getAllProfiles(): array {

            $sql = "SELECT 
                      u.id, u.nom, u.prenom, u.email, u.role,
                      c.discipline, c.experience
                    FROM users u
                    LEFT JOIN coachs c ON c.user_id = u.id
                    ORDER BY u.id DESC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
