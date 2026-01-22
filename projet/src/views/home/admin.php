<?php include __DIR__ . '/../nav.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 15px;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 16px;
        }

        .info-item span {
            font-weight: bold;
            color: #555;
        }

        .role-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            color: #fff;
        }

        .role-admin {
            background-color: #007bff; /* bleu pour admin */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Dashboard Admin</h1>

    <div class="user-info">
        <div class="info-item">
           
            <span>Prénom :</span> <?= htmlspecialchars($user->getFirstname()) ?>
        </div>
        <div class="info-item">
            <span>Nom :</span> <?= htmlspecialchars($user->getLastname()) ?>
        </div>
        <div class="info-item">
            <span>Email :</span> <?= htmlspecialchars($user->getEmail()) ?>
        </div>
        <div class="info-item">
            <span>Téléphone :</span> <?= htmlspecialchars($user->getPhone()) ?>
        </div>
        <div class="info-item">
            <span>Rôle :</span> 
            <span class="role-badge role-admin"><?= htmlspecialchars($user->getRole()) ?></span>
        </div>
    </div>
</div>

</body>
</html>
