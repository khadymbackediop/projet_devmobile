<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Organisateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        header {
            background-color: #b19cd9;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 50px auto;
            padding: 20px;
        }

        input[type="text"],
        input[type="password"],
        button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #b19cd9;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #cca300;
        }
    </style>
</head>
<body>
    <header>
        <h1>Connexion - Espace Organisateur</h1>
    </header>
    <form action="traitement_connexion_organisateur.php" method="post">
        <input type="text" name="email" placeholder="Adresse email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
