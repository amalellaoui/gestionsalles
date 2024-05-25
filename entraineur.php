<?php
require_once 'dbconnect.php';

$sql = 'SELECT * FROM ENTRAINEUR';
$statement = $conn->query($sql);
$entraineurs = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Entraîneurs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #004bb5;
        }
        .add-new {
            text-align: center;
            margin-bottom: 20px;
        }
        .add-new a {
            background-color: #004bb5;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .add-new a:hover {
            background-color: #003a8c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #004bb5;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #004bb5;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }
        .btn:hover {
            background-color: #003a8c;
        }
        .btn-danger {
            background-color: #d9534f;
        }
        .btn-danger:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Liste des Entraîneurs</h2>
        <div class="add-new">
            <a href="add_entraineur.php">Ajouter Nouveau Entraîneur</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CIN</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($entraineurs)) : ?>
                    <tr>
                        <td colspan="7">Aucun entraîneur trouvé</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($entraineurs as $entraineur) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($entraineur['ID_ETR']); ?></td>
                            <td><?php echo htmlspecialchars($entraineur['CIN_ETR']); ?></td>
                            <td><?php echo htmlspecialchars($entraineur['PRENOMETR']); ?></td>
                            <td><?php echo htmlspecialchars($entraineur['NOMETR']); ?></td>
                            <td><?php echo htmlspecialchars($entraineur['ADRESSEETR']); ?></td>
                            <td><a href="update_entraineur.php?id=<?php echo $entraineur['ID_ETR']; ?>" class="btn">Modifier</a></td>
                            <td>
                                <form action="delete_entraineur.php" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer cet entraîneur ?');">
                                    <input type="hidden" name="id" value="<?php echo $entraineur['ID_ETR']; ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
