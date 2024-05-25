<?php
require_once 'Database.php';

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();

    $cin = $_POST['cin'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];

    $query = "INSERT INTO ENTRAINEUR (CIN_ETR, PRENOMETR, NOMETR, ADRESSEETR) VALUES (:cin, :prenom, :nom, :adresse)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(':cin', $cin);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':adresse', $adresse);

    if ($stmt->execute()) {
        echo "Entraîneur ajouté avec succès.";
    } else {
        echo "Échec de l'ajout de l'entraîneur.";
    }
} else {
    echo "Aucune donnée postée.";
}
?>
