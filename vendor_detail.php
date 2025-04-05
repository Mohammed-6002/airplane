<?php
require 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$vendorId = $_GET['id'];

// Haal vendor details op
$stmt = $pdo->prepare("SELECT * FROM vendor WHERE id = ?");
$stmt->execute([$vendorId]);
$vendor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$vendor) {
    header("Location: index.php");
    exit;
}

// Haal vliegtuigen van deze vendor op
$stmt = $pdo->prepare("SELECT * FROM plane WHERE vendor_id = ?");
$stmt->execute([$vendorId]);
$planes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($vendor['name']) ?> Planes</title>
    <style>
        .plane-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .plane-card { border: 1px solid #ddd; padding: 15px; border-radius: 5px; }
        .plane-img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <header>
        <h1><?= htmlspecialchars($vendor['name']) ?></h1>
        <a href="index.php">Back to Vendors</a>
    </header>

    <h2>Planes</h2>
    <div class="plane-grid">
        <?php foreach ($planes as $plane): ?>
            <div class="plane-card">
                <img src="img/<?= htmlspecialchars($plane['img']) ?>" alt="<?= htmlspecialchars($plane['name']) ?>" class="plane-img">
                <h3><?= htmlspecialchars($plane['name']) ?></h3>
                <p>Year built: <?= htmlspecialchars($plane['year_of_build']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>