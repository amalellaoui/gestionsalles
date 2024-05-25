<?php
require_once 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $cin = $_POST['cin'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];

    $sql = 'INSERT INTO ENTRAINEUR (CIN_ETR, PRENOMETR, NOMETR, ADRESSEETR) VALUES (:cin, :prenom, :nom, :adresse)';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':cin' => $cin, ':prenom' => $prenom, ':nom' => $nom, ':adresse' => $adresse])) {
        header("Location: entraineur.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Entraîneur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #004bb5;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003a8c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter Entraîneur</h2>
        <form method="post">
            <label for="cin">CIN:</label>
            <input type="text" id="cin" name="cin" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>
            <input type="submit" name="create" value="Ajouter">
        </form>
    </div>
</body>
</html>
