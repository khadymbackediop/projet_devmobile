<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #f7ddbb; /* Jaune moutarde */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #6a3b9a; /* Mauve clair */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #6a3b9a; /* Mauve clair */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #d4af37; /* Or */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #b8860b; /* Or foncé */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle :</label>
                <select id="role" name="role" required>
                    <option value="participant">Participant</option>
                    <option value="organisateur">Organisateur</option>
                </select>
            </div>

            <input type="submit" value="S'inscrire">
        </form>

        <?php
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Connexion à la base de données
            $host = 'localhost'; // Adresse du serveur MySQL
            $dbname = 'xew_xew'; // Nom de votre base de données
            $user = 'root'; // Nom d'utilisateur MySQL
            $pass = ''; // Mot de passe MySQL (laissez vide si aucun)

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }

            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $role = $_POST['role'];

            // Préparer et exécuter la requête d'insertion en fonction du rôle
            if ($role == 'participant') {
                $sql = "INSERT INTO Participant (Nom, Prenom, Email, Mot_De_Passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";
            } elseif ($role == 'organisateur') {
                $sql = "INSERT INTO Organisateur (Nom, Prenom, Email, Mot_De_Passe) VALUES (:nom, :prenom, :email, :mot_de_passe)";
            }

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe);

            // Exécuter la requête
            try {
                $stmt->execute();
                echo "Inscription réussie !";
            } catch (PDOException $e) {
                echo "Erreur lors de l'inscription : " . $e->getMessage();
            }
        }
        ?>
    </div>
</body>
</html>
