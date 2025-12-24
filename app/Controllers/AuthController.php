<?php
require_once __DIR__ . "/../Repositories/UserRepository.php";
require_once __DIR__ . "/../Models/Coach.php";
require_once __DIR__ . "/../Models/Sportif.php";

class AuthController {

    public function register(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            $role = $_POST["role"];

            $repo = new UserRepository();

            if($role === "coach"){
                $coach = new Coach(
                    $_POST["nom"],
                    $_POST["prenom"],
                    $_POST["email"],
                    $_POST["password"],
                    $_POST["discipline"],
                    (int)$_POST["experience"],
                    $_POST["description"]
                );

                $repo->createCoach($coach);
                header("Location: ../views/login.php");
                exit;
            }

            if($role === "sportif"){
                $sportif = new Sportif(
                    $_POST["nom"],
                    $_POST["prenom"],
                    $_POST["email"],
                    $_POST["password"]
                );
                $repo->createSportif($sportif);
                header("Location: ../views/login.php");
                exit;
            }


        }
    }

}
