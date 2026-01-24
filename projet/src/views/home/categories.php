<?php include __DIR__ . '/../nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Catégories - Admin</title>
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

        /* --- CONTENT --- */
        .main-content { flex-grow: 1; padding: 30px; }
        .table-container { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }

        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th { text-align: left; padding: 15px; background: #f8fafc; color: #64748b; font-weight: 600; border-bottom: 2px solid #edf2f7; }
        table td { padding: 15px; border-bottom: 1px solid #edf2f7; color: #334155; }

        /* Style pour le badge de nombre */
        .badge-count {
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        /* --- BUTTONS --- */
        .btn { padding: 10px 18px; border-radius: 8px; border: none; cursor: pointer; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; }
        .btn-add { background: var(--accent); color: white; margin-bottom: 10px; }
        .btn-edit { background: #ecfdf5; color: #059669; }
        .btn-delete { background: #fef2f2; color: #dc2626; margin-left: 5px; }
        
        /* --- MODAL --- */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 2000; }
        .modal-content { background: white; width: 400px; margin: 10% auto; padding: 30px; border-radius: 12px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="admin-wrapper">
   <?php include __DIR__ . '/../sidebar.php'; ?>

    <main class="main-content">
        <div class="table-container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 style="margin:0;">Liste des Catégories</h2>
                    <p style="color: #64748b; font-size: 0.9rem; margin-top: 5px;">Total des catégories gérées dans la boutique</p>
                </div>
                <button class="btn btn-add" onclick="openModal('modalAddCat')">
                    <i class="fa-solid fa-plus"></i> Ajouter une catégorie
                </button>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Nom de la Catégorie</th>
                        <th>Nombre de Produits</th> <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $categorie): ?>
                            <tr>
                                <td>
                                    <strong><?= htmlspecialchars($categorie->getName()); ?></strong>
                                </td>
                        
                                <td>
                                    <span class="badge-count">
                                        <?= $categorie->getTotalProduits() ?? 0; ?> produits
                                    </span>
                                </td>
                        
                                <td style="text-align: right;">
                                    <button class="btn btn-edit"
                                            onclick="openEditModal(
                                                <?= $categorie->getId(); ?>,
                                                '<?= $categorie->getName(); ?>'
                                            )">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                        
                                    <form action="/index.php/Categorie/delete" method="POST" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $categorie->getId(); ?>">
                                        <button type="submit" class="btn btn-delete"
                                            onclick="return confirm('Attention : supprimer cette catégorie ?');">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" style="text-align:center; color:#64748b;">
                                    Aucune catégorie trouvée
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
            </table>
        </div>
    </main>
</div>

<div id="modalAddCat" class="modal">
    <div class="modal-content">
        <h3>Nouvelle Catégorie</h3>
        <?php if(!empty($erreur)): ?>
            <div class="alert-error alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="text-color danger"><?= htmlspecialchars($erreur) ?></span>
            </div>
        <?php endif; ?>
        <br>
        <form action="/index.php/Categorie/create" method="POST">
            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" name="name" placeholder="Ex: Informatique">
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn" style="background:#eee;" onclick="closeModal('modalAddCat')">Annuler</button>
                <button type="submit" class="btn btn-add">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<div id="modalEditCat" class="modal">
    <div class="modal-content">
        <h3>Modifier la catégorie</h3>
       
        <form action="/index.php/categorie/update" method="POST">
            <input type="hidden" name="id" id="edit_cat_id">
            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" name="name" id="edit_cat_name" required>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" class="btn" style="background:#eee;" onclick="closeModal('modalEditCat')">Annuler</button>
                <button type="submit" class="btn btn-add">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(id) { document.getElementById(id).style.display = 'block'; }
    function closeModal(id) { document.getElementById(id).style.display = 'none'; }

    function openEditModal(id, name) {
        document.getElementById('edit_cat_id').value = id;
        document.getElementById('edit_cat_name').value = name;
        openModal('modalEditCat');
    }

    function confirmDelete(id) {
        if(confirm("Attention : Supprimer cette catégorie pourrait affecter les produits liés. Continuer ?")) {
            window.location.href = "/admin/category/delete?id=" + id;
        }
    }

    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = "none";
        }
    }
</script>

</body>
</html>