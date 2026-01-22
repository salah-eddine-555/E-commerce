<?php include '../nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="/index.php/auth/register" method="POST" class="form-register">
            <h2>Inscription</h2>

            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Votre prénom">
            </div>

            <div class="form-group">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Votre nom">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" placeholder="Ex: 0612345678">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Ex: email@gmail.com">
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password"  placeholder="********">
            </div>

            
            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role">
                     <option value="client" selected>Client</option>
                     <option value="admin" selected>Admin</option>
                    
                </select>
            </div>

            <button type="submit" class="btn-submit">S'inscrire</button>

            <p class="login-link">Vous avez déjà un compte ? <a href="/login">Connectez-vous</a></p>
        </form>
    </div>
</body>
</html>

