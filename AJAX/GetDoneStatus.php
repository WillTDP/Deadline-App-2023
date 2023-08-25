<?php
include_once(__DIR__ . "/../classes/Db.php");

if (!empty($_GET)) {
    if (isset($_GET['task_id'])) {
        $conn = Db::connect();
        $stmt = $conn->prepare('SELECT done FROM todo WHERE id = :task_id');
        $stmt->bindValue(':task_id', $_GET['task_id'], PDO::PARAM_INT);
        $stmt->execute();
        $status = $stmt->fetch(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($status);
    }
}
?>
