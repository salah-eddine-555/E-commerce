<?
require_once __DIR__ . '/../vendor/autoload.php'; // ou ton autoload selon projet
use App\Models\User;

// Créer l'utilisateur admin
$user = new User();
$user->setFirstName('Mohamed');
$user->setLastName('Admin');
$user->setPhone('+212600000000');
$user->setEmail('admin@example.com');
$user->setPassword('admin123');  // mot de passe en clair
$user->setRole('admin');
$user->save();  // le mot de passe sera hashé automatiquement

echo "Admin créé avec succès !";