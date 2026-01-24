<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color: #94a3b8;
        }
         /* --- SIDEBAR --- */
        .sidebar { width: var(--sidebar-width); background: var(--sidebar-bg); color: white; padding: 20px 0; flex-shrink: 0; }
        .sidebar-menu { list-style: none; padding: 0; margin: 0; position: sticky; top: 20px; }
        .sidebar-menu li { padding: 15px 25px; cursor: pointer; transition: 0.3s; color: #94a3b8; border-left: 4px solid transparent; }
        .sidebar-menu li:hover, .sidebar-menu li.active { background: #334155; color: white; border-left: 4px solid var(--accent); }
        .sidebar-menu i { margin-right: 10px; width: 20px; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <ul class="sidebar-menu">
            <li class="active"><i class="fa-solid fa-chart-line"></i> Dashboard</li>
            <li onclick="openModal('modalProduit')">
                <a href="/index.php/admin/produit">
                    <i class="fa-solid fa-plus-circle"></i> Ajouter Produit
                </a>
                
            </li>
            <li>
                 <a href="/index.php/admin/categorie">
                    <i class="fa-solid fa-tags"></i> Gestion Catégories
                </a>
            </li>
            <li><i class="fa-solid fa-cart-shopping"></i> Commandes</li>
            <li><i class="fa-solid fa-users"></i> Utilisateurs</li>
        </ul>
    </aside>
</body>
</html>
