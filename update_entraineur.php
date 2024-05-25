<?php
require_once 'dbconnect.php'; 

$id = $_GET['id'];
$sql = 'SELECT * FROM ENTRAINEUR WHERE ID_ETR = :id';
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id]);
$entraineur = $statement->fetch(PDO::FETCH_ASSOC);

if (!$entraineur) {
    echo "Entraîneur non trouvé!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $cin = $_POST['cin'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];

    $sql = 'UPDATE ENTRAINEUR SET CIN_ETR = :cin, PRENOMETR = :prenom, NOMETR = :nom, ADRESSEETR = :adresse WHERE ID_ETR = :id';
    $statement = $conn->prepare($sql);
    if ($statement->execute([':cin' => $cin, ':prenom' => $prenom, ':nom' => $nom, ':adresse' => $adresse, ':id' => $id])) {
        header("Location: entraineur.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Entraîneur</title>
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
        <h2>Modifier Entraîneur</h2>
        <form method="post">
            <label for="cin">CIN:</label>
            <input type="text" id="cin" name="cin" value="<?php echo $entraineur['CIN_ETR']; ?>" required>
            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $entraineur['PRENOMETR']; ?>" required>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $entraineur['NOMETR']; ?>" required>
            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $entraineur['ADRESSEETR']; ?>" required>
            <input type="submit" name="update" value="Mettre à jour">
        </form>
    </div>
</body>
</html>
