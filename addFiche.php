<!DOCTYPE html>
<html lang="en">
<head>
    <title>Annuaire - Ajouter une fiche</title>
</head>
<body>
<h1>Ajouter une fiche</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
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

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'yearbook');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    // Insérer la nouvelle fiche dans la base de données
    $sql = "INSERT INTO fiches (civility, name, firstname, address, postal_code, city, country, date_of_birth, phone, fax, email, url) VALUES ('$civility', '$name', '$firstname', '$address', '$postal_code', '$city', '$country', '$date_of_birth', '$phone', '$fax', '$email', '$url')";

    if ($conn->query($sql) === TRUE) {
        echo "Fiche ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la fiche : " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Civilité: <label>
        <select name="civility">
            <option value="M">M</option>
            <option value="Mme">Mme</option>
            <option value="Mlle">Mlle</option>
        </select>
    </label><br>
    Nom: <label>
        <input type="text" name="name" required>
    </label><br>
    Prénom: <label>
        <input type="text" name="firstname" required>
    </label><br>
    Adresse: <label>
        <input type="text" name="address">
    </label><br>
    Code Postal: <label>
        <input type="text" name="postal_code">
    </label><br>
    Ville: <label>
        <input type="text" name="city">
    </label><br>
    Pays: <label>
        <input type="text" name="country">
    </label><br>
    Date de Naissance: <label>
        <input type="date" name="date_of_birth">
    </label><br>
    Téléphone: <label>
        <input type="text" name="phone">
    </label><br>
    Fax: <label>
        <input type="text" name="fax">
    </label><br>
    Email: <label>
        <input type="email" name="email">
    </label><br>
    URL: <label>
        <input type="url" name="url">
    </label><br>
    <input type="submit" value="Ajouter">
</form>

</body>
</html>

