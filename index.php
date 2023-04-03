<?php
require_once __DIR__.'/boot.php';

checkIfNotAuth();

$data['users'] = [];
$stmt = pdo()->prepare("SELECT users.*, tarification.description as tarification FROM users LEFT JOIN tarification ON users.tarification_id = tarification.id ORDER BY users.id ASC");
$stmt->execute();
if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data['users'][] = $row;
    }
}

generatePage('dashboard', $data);
