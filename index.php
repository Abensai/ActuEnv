<!DOCTYPE html>
<html lang="en">
<head>
    <title>Annuaire - Liste des fiches</title>
</head>
<body>
    <h1>Liste des fiches</h1>

    <?php
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'yearbook');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Récupérer les fiches depuis la base de données
    $sql = "SELECT * FROM fiches";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les fiches dans un tableau
        echo "<table>
            <tr>
                <th>ID</th>
                <th>Civilité</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Date de Naissance</th>
                <th>Téléphone</th>
                <th>Fax</th>
                <th>Email</th>
                <th>URL</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['civility']}</td>
                <td>{$row['name']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['address']}</td>
                <td>{$row['postal_code']}</td>
                <td>{$row['city']}</td>
                <td>{$row['country']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['fax']}</td>
                <td>{$row['email']}</td>
                <td>{$row['url']}</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "Aucune fiche trouvée.";
    }

    // Fermer la connexion
    $conn->close();
    ?>

</body>
</html>
