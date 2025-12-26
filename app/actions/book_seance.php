<?php
session_start();
require_once "../config/database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit;
}

$seanceId = (int)$_POST['seance_id'];
$sportifId = (int)$_SESSION['user_id'];

$pdo = Database::connect();

// insert reservation
$sql = "INSERT INTO reservations (seance_id, sportif_id, reserved_at)
        VALUES (?, ?, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([$seanceId, $sportifId]);

// update seance status
$sql = "UPDATE seances SET statut = 'reservee' WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$seanceId]);

header("Location: ../view/dashboard.sportif.php");
exit;
