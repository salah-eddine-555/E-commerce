<?php include __DIR__ . '/../nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - MvcProjet</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-bg: #f1f5f9;
            --sidebar-bg: #1e293b;
            --accent: #3b82f6;
            --nav-height: 70px;
        }

        body { margin: 0; font-family: 'Inter', sans-serif; background: var(--primary-bg); }
        .admin-wrapper { display: flex; min-height: calc(100vh - var(--nav-height)); }
        

        /* --- MAIN CONTENT --- */
        .main-content { flex-grow: 1; padding: 30px; }
        .table-container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .img-product { width: 45px; height: 45px; object-fit: cover; border-radius: 5px; }

       /* --- GRID & CARDS --- */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-top: 25px;
}

.product-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid #e2e8f0;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.card-image {
    position: relative;
    height: 180px;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card-image .badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: var(--accent);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
}

.card-body {
    padding: 20px;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
}

.product-id {
    font-size: 0.8rem;
    color: #94a3b8;
    font-weight: 600;
}

.product-title {
    margin: 0;
    font-size: 1.1rem;
    color: #1e293b;
    flex: 1;
    margin-left: 10px;
    text-align: right;
}

.product-desc {
    font-size: 0.9rem;
    color: #64748b;
    margin-bottom: 20px;
    line-height: 1.4;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #f1f5f9;
}

.product-price {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
}

.card-actions {
    display: flex;
    gap: 8px;
}

.btn-icon {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-icon.btn-edit { background: #eff6ff; color: #3b82f6; }
.btn-icon.btn-edit:hover { background: #3b82f6; color: white; }

.btn-icon.btn-delete { background: #fef2f2; color: #ef4444; }
.btn-icon.btn-delete:hover { background: #ef4444; color: white; }

        /* --- MODALS --- */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 2000; overflow-y: auto; }
        .modal-content { background: white; width: 500px; margin: 5% auto; padding: 30px; border-radius: 12px; position: relative; }
        .modal-header { border-bottom: 1px solid #eee; margin-bottom: 20px; padding-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: #334155; }
        .form-group input, .form-group textarea, .form-group select { 
            width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; 
        }
        
        .btn { padding: 10px 18px; border-radius: 6px; border: none; cursor: pointer; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; }
        .btn-add { background: var(--accent); color: white; }
        .btn-cancel { background: #e2e8f0; color: #475569; }
        .btn-edit { background: #ecfdf5; color: #059669; }
        .btn-delete { background: #fef2f2; color: #dc2626; }
    </style>
</head>
<body>

<div class="admin-wrapper">

    <?php include __DIR__ . '/../sidebar.php'; ?>

    <main class="main-content">
        <div class="table-container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Gestion des Produits</h2>
                <button class="btn btn-add" onclick="openModal('modalProduit')"><i class="fa-solid fa-plus"></i> Nouveau Produit</button>
            </div>
          <div class="products-grid">
    <?php foreach ($produits as $produit): ?>
        <div class="product-card">
            <div class="card-image">
             
                <img src="<?= htmlspecialchars($produit->getImage() ?? 'https://via.placeholder.com/300x200'); ?>" alt="<?= htmlspecialchars($produit->getName()); ?>">
                
                <?php if ($produit->getCategorie()): ?>
                    <span class="badge"><?= htmlspecialchars($produit->getCategorie()->getName()); ?></span>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="card-header">
                    <span class="product-id">#<?= $produit->getId(); ?></span>
                    <h3 class="product-title"><?= htmlspecialchars($produit->getName()); ?></h3>
                </div>
                <p class="product-desc"><?= htmlspecialchars($produit->getDescription()); ?></p>
                <div class="card-footer">
                    <span class="product-price"><?= htmlspecialchars($produit->getPrix()); ?>€</span>
                    <div class="card-actions">
                        <!-- Bouton Modifier, ouvre modal -->
                        <button class="btn-icon btn-edit" onclick="openModal('modalProduit', <?= $produit->getId(); ?>)" title="Modifier">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <!-- Bouton Supprimer -->
                        <button class="btn-icon btn-delete" onclick="deleteProduit(<?= $produit->getId(); ?>)" title="Supprimer">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div id="modalProduit" class="modal">
    <div class="modal-content" style="width: 600px;">
        <div class="modal-header">
            <h3>Nouveau Produit</h3>
            <i class="fa-solid fa-xmark" style="cursor:pointer" onclick="closeModal('modalProduit')"></i>
        </div>

        <form action="/index.php/produit/create" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nom du produit</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="3"></textarea>
            </div>
            <div style="display:flex; gap:15px">
                <div class="form-group" style="flex:1">
                    <label>Prix (€)</label>
                    <input type="number" name="prix" step="0.01" required>
                </div>
               <div class="form-group" style="flex:1">
                    <label>Catégorie</label>
                    <select name="categorie_id" required>
                        <?php foreach ($categories as $categorie): ?>
                            <option value="<?= $categorie->getId(); ?>">
                                <?= htmlspecialchars($categorie->getName()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn btn-cancel" onclick="closeModal('modalProduit')">Annuler</button>
                <button type="submit" class="btn btn-add">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = "none";
            document.body.style.overflow = 'auto';
        }
    }
</script>

</body>
</html>