<?php
require_once 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = 'DELETE FROM ENTRAINEUR WHERE ID_ETR = :id';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':id' => $id])) {
        header("Location: entraineur.php");
        exit();
    }
}
?>

