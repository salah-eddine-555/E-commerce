<?php include __DIR__ . '/../nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            height: 100vh;
            
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px;
            margin-top: 10%;
            justify-self: center;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #0056b3;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .footer-text a {
            color: #007bff;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Connexion</h2>
        
        <?php if(!empty($erreur)): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= htmlspecialchars($erreur) ?>
            </div>
        <?php endif; ?>

        <form action="/index.php/auth/login"  method="POST">

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="exemple@email.com"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                Se connecter
            </button>

        </form>

        <div class="footer-text">
            Vous n’avez pas de compte ?
            <a href="index.php?action=register">Créer un compte</a>
        </div>
    </div>

</body>
</html>
