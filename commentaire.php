<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commentaires</title>
</head>
<body>

    <a href="accueil.html">Retour à l'accueil</a>
    <hr>

    <?php
    // 1. Connexion à la base de données (à adapter avec le nom de votre base)
    $host = 'localhost';
    $dbname = 'nom_de_ta_base'; // Remplacez par le nom exact de votre BDD
    $user = 'root';              // Par défaut 'root' sur WAMP/XAMPP
    $pass = '';                  // Vide par défaut sur WAMP/XAMPP (ou 'root' sur MAMP)

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 2. Vos données à insérer
        $nom = 'Dupont';
        $prenom = 'Jean';
        $email = 'jean.dupont@exemple.com';

        // 3. Requête d'insertion
        $sql = "INSERT INTO utilisateurs (nom, prenom, email) VALUES (:nom, :prenom, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            echo '<p style="color:green;">Insertion réussie !</p>';
        } else {
            echo '<p style="color:red;">Échec de l\'insertion.</p>';
        }

    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
    ?>

</body>
</html>
