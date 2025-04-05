<?php
require 'config.php';

// Haal alle vendors op
$stmt = $pdo->query("SELECT * FROM vendor");
$vendors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airplane Vendors</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1200px; margin: 0 auto; padding: 20px; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .vendor-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .vendor-card { border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
        .vendor-logo { max-width: 100px; max-height: 100px; }
        .nav-link { margin-left: 15px; text-decoration: none; color: #333; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <header>
        <h1>Airplane Database</h1>
        <div>
            <a href="index.php" class="nav-link">Home</a>
            <a href="add_vendor.php" class="nav-link">Add Vendor</a>
        </div>
    </header>

    <?php if (isset($_GET['success'])): ?>
        <div class="success">Vendor successfully added!</div>
    <?php endif; ?>

    <h2>Vendors</h2>
    <div class="vendor-grid">
        <?php foreach ($vendors as $vendor): ?>
            <div class="vendor-card">
                <img src="img/<?= htmlspecialchars($vendor['logo']) ?>" alt="<?= htmlspecialchars($vendor['name']) ?>" class="vendor-logo">
                <h3><?= htmlspecialchars($vendor['name']) ?></h3>
                <p>Established: <?= htmlspecialchars($vendor['year_of_establishment']) ?></p>
                <a href="vendor_detail.php?id=<?= $vendor['id'] ?>">View Planes</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>