<?php
require_once __DIR__.'/boot.php';

checkIfNotAuth();

$data = [];
if (isset($_POST['submit'])) {
    $user_id = intval($_POST['user']);
    $tarification_id = intval($_POST['rate']);
    
    $stmt0 = pdo()->prepare("SELECT * FROM users WHERE id=?");
    $stmt0->execute([$user_id]);
    $stmt1 = pdo()->prepare("SELECT * FROM tarification WHERE id=?");
    $stmt1->execute([$tarification_id]);
    $users_count = $stmt0->rowCount();
    $tarifications_count = $stmt1->rowCount();
    if ($users_count == 1 && $tarifications_count == 1) {
        $data['user'] = $stmt0->fetch(PDO::FETCH_ASSOC); 
        $data['tarification'] = $stmt1->fetch(PDO::FETCH_ASSOC);           
        //Без тарифа
        if ($data['tarification']['status'] == 0) {
            $stmt4 = pdo()->prepare('UPDATE users SET tarification_id = ? WHERE id = ?');
            $stmt4->execute([$data['tarification']['id'], $data['user']['id']]);
            $data['status'] = 'Тариф пользователя обновлен';
        }
        //Тариф по количеству
        if ($data['tarification']['status'] == 1) {
            $stmt5 = pdo()->prepare('UPDATE users SET tarification_id = ?, crequests = crequests + ? WHERE id = ?');
            $stmt5->execute([$data['tarification']['id'], $data['tarification']['countrequest'], $data['user']['id']]);
            $data['status'] = 'Тариф пользователя обновлен';
        } 
        //Тариф по времени
        if ($data['tarification']['status'] == 2) {
            $time_sub = time() + $data['tarification']['countdays']*24*60*60;
            $stmt5 = pdo()->prepare('UPDATE users SET tarification_id = ?, time_sub = ? WHERE id = ?');
            $stmt5->execute([$data['tarification']['id'], $time_sub, $data['user']['id']]);
            $data['status'] = 'Тариф пользователя обновлен';
        }        
    } else {
        if ($users_count == 0) {
            $data['error'] = 'Пользователь не найден';  
        }
        if ($tarifications_count == 0) {
            $data['error'] = 'Тариф не найден';
        }
    }
}
if (isset($_GET['id']) && intval($_GET['id']) > 0) {    
    $id = intval(trim($_GET['id']));
    $stmt2 = pdo()->prepare("SELECT users.*, tarification.description AS tarification FROM users LEFT JOIN tarification ON users.tarification_id = tarification.id WHERE users.id=?");
    $stmt2->execute([$id]);
    if ($stmt2->rowCount() == 1) { 
        $data['user'] = $stmt2->fetch(PDO::FETCH_ASSOC);
        $stmt3 = pdo()->prepare("SELECT * FROM tarification ORDER BY id ASC");
        $stmt3->execute();
        $data['rates'] = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        generatePage('change_user_rate', $data);
    } else {
        header('Location: index.php');
        die(-1);
    }    
} else {
    header('Location: index.php');
    die(-1);
}
