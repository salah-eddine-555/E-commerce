<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - MvcProjet</title>
    <style>
        /* Reset minimal */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
        }

      

        /* Hero Section */
        .hero {
            text-align: center;
            margin-top: 5rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1e40af;
        }

        .hero p {
            font-size: 1.2rem;
            color: #555;
        }

        /* Footer */
        footer {
            margin-top: 5rem;
            text-align: center;
            padding: 1rem;
            background-color: #1d4ed8;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
   <?php include 'src/views/nav.php'; ?>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Bienvenue sur MvcProjet</h1>
        <p>Connectez-vous ou inscrivez-vous pour accéder à votre tableau de bord.</p>
    </div>



</body>
</html>
