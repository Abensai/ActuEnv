<!DOCTYPE html>
<html lang="en">
<head>
    <title>Annuaire - Modifier une fiche</title>
</head>
<body>
<h1>Modifier une fiche</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $civility = $_POST['civility'];
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $fax = $_POST['fax'];
    $email = $_POST['email'];
    $url = $_POST['url'];

    // Vérifier et valider les données (vous pouvez ajouter des vérifications supplémentaires ici)

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'yearbook');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Mettre à jour la fiche dans la base de données
    $sql = "UPDATE fiches SET civility='$civility', name='$name', firstname='$firstname', address='$address', postal_code='$postal_code', city='$city', country='$country', date_of_birth='$date_of_birth', phone='$phone', fax='$fax', email='$email', url='$url' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Fiche modifiée avec succès.";
    } else {
        echo "Erreur lors de la modification de la fiche : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}

// Récupérer l'ID de la fiche à modifier depuis l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'yearbook');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Récupérer les informations de la fiche à partir de l'ID
    $sql = "SELECT * FROM fiches WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Afficher le formulaire pré-rempli avec les informations actuelles de la fiche
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            Civilité: <label>
                <select name="civility">
                    <option value="M" <?php if ($row['civility'] == 'M') echo 'selected'; ?>>M.</option>
                    <option value="Mme" <?php if ($row['civility'] == 'Mme') echo 'selected'; ?>>Mme</option>
                    <option value="Mlle" <?php if ($row['civility'] == 'Mlle') echo 'selected'; ?>>Mlle</option>
                </select>
            </label><br>
            Nom: <label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </label><br>
            Prénom: <label>
                <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" required>
            </label><br>
            Adresse: <label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>">
            </label><br>
            Code Postal: <label>
                <input type="text" name="postal_code" value="<?php echo $row['postal_code']; ?>">
            </label><br>
            Ville: <label>
                <input type="text" name="city" value="<?php echo $row['city']; ?>">
            </label><br>
            Pays: <label>
                <input type="text" name="country" value="<?php echo $row['country']; ?>">
            </label><br>
            Date de Naissance: <label>
                <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>">
            </label><br>
            Téléphone: <label>
                <input type="text" name="phone" value="<?php echo $row['phone']; ?>">
            </label><br>
            Fax: <label>
                <input type="text" name="fax" value="<?php echo $row['fax']; ?>">
            </label><br>
            Email: <label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>">
            </label><br>
            URL: <label>
                <input type="url" name="url" value="<?php echo $row['url']; ?>">
            </label><br>
            <input type="submit" value="Modifier">
        </form>
        <?php
    } else {
        echo "Aucune fiche trouvée avec cet ID.";
    }

    // Fermer la connexion
    $conn->close();
}
?>

</body>
</html>
