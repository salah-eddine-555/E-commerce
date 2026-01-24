<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Pro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0f172a; /* Bleu nuit pro */
            --accent-color: #2563eb;  /* Bleu vif pour actions */
            --text-light: #f8fafc;
            --transition: all 0.3s ease;
        }

        body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        nav {
            background-color: var(--primary-color);
            padding: 0.8rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            color: #fff;
            font-size: 1.6rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -1px;
        }

        .logo span { color: var(--accent-color); }

        /* Barre de recherche (Indispensable en E-commerce) */
        .search-bar {
            flex: 0 1 400px;
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 5px 15px;
            margin: 0 20px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: white;
            padding: 8px;
            width: 100%;
            outline: none;
        }

        .search-bar i { color: #94a3b8; padding-top: 10px; }

        /* Boutons de navigation */
        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-link {
            text-decoration: none;
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link:hover { color: #fff; }

        /* Bouton Inscription spécial */
        .btn-special {
            background-color: var(--accent-color);
            color: white !important;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 600;
        }

        .btn-special:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }

        .cart-icon {
            position: relative;
            font-size: 1.2rem;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -10px;
            background: #ef4444;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="logo">Mvc<span>Shop</span></a>

    <div class="search-bar">
        <input type="text" placeholder="Rechercher un produit...">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <div class="nav-buttons">
        <a href="#" class="nav-link"><i class="fa-solid fa-cart-shopping cart-icon"><span class="cart-badge">0</span></i> Panier</a>
        
        <?php if(isset($_SESSION['id'])): ?>
            <a href="/index.php/auth/logout" class="nav-link"><i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a>
        <?php else: ?>
            <a href="/src/Views/auth/connexion.php" class="nav-link">Connexion</a>
            <a href="/src/Views/auth/inscription.php" class="nav-link btn-special">S'inscrire</a>
        <?php endif; ?>
    </div>
</nav>

</body>
</html>