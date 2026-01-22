

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
       <style>
   /* Navbar */
        nav {
            background-color: #1d4ed8; /* bleu */
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav .logo {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        nav .nav-buttons a {
            text-decoration: none;
            color: #fff;
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav .nav-buttons a.connexion {
            background-color: #2563eb;
        }

        nav .nav-buttons a.inscription {
            background-color: #fbbf24; /* jaune */
            color: #000;
        }

        nav .nav-buttons a:hover {
            opacity: 0.8;
        }
</style>
<body>
  <nav>
        <a href="#" class="logo">MvcProjet</a>
        <div class="nav-buttons">
            <?php if(isset($_SESSION['id'])): ?>
                <a href="/index.php/auth/logout" class="connexion">Deconexion</a>
            <?php else: ?>
            <a href="/src/Views/auth/connexion.php" class="connexion">Connexion</a>
            <a href="/src/Views/auth/inscription.php" class="inscription">Inscription</a>
            <?php endif; ?>
        </div>  
    </nav>
</body>
</html>