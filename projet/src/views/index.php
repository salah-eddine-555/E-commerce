<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        :root {
            --primary-dark: #1a2035;
            --accent-blue: #4880ed;
            --bg-light: #f4f7fe;
        }

        body { background-color: var(--bg-light); font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        /* Style de la carte produit */
        .product-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            background: #fff;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .product-image-wrapper {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-add-cart {
            background-color: var(--accent-blue);
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-add-cart:hover {
            background-color: var(--primary-dark);
            color: white;
        }

        .price-tag {
            font-size: 1.25rem;
            font-weight: bold;
            color: var(--primary-dark);
        }
    
    </style>
</head>
<body>

    <!-- Navbar -->
   <?php include 'src/views/nav.php'; ?>

    <div class="container py-5">
    <h2 class="mb-4 text-center fw-bold" style="color: var(--primary-dark);">Nos Produits</h2>
    <hr class="mb-5 mx-auto" style="width: 60px; height: 4px; background: var(--accent-blue); opacity: 1;">

    <div class="row g-4">

        <?php foreach ($produit as $p): ?>
            <div class="col-md-4 col-lg-3">
                <div class="card product-card h-100">

                    <div class="product-image-wrapper">
                        <img 
                            src="<?= htmlspecialchars($p->getImage() ?? 'https://via.placeholder.com/300x250') ?>" 
                            alt="<?= htmlspecialchars($p->getName()) ?>">
                    </div>

                    <div class="card-body d-flex flex-column">

                        <!-- Nom produit -->
                        <h5 class="card-title fw-bold">
                            <?= htmlspecialchars($p->getName()); ?>
                        </h5>

                        <!-- Catégorie -->
                        <span class="badge bg-primary mb-2">
                            <?= htmlspecialchars($p->getCategorie()->getName()); ?>
                        </span>

                        <!-- Description -->
                        <p class="card-text text-muted small">
                            <?= htmlspecialchars($p->getDescription()); ?>
                        </p>

                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="price-tag">
                                <?= htmlspecialchars($p->getPrix()); ?> €
                            </span>

                            <a href="#" class="btn btn-add-cart">
                                <i class="fas fa-shopping-cart me-2"></i>Ajouter
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
</div>


</body>
</html>
