<?php
require 'config.php';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $year = trim($_POST['year'] ?? '');
    $logo = trim($_POST['logo'] ?? '');

    // Validatie
    if (empty($name)) $errors[] = "Name is required";
    if (empty($year) || !is_numeric($year)) $errors[] = "Valid year is required";
    if (empty($logo)) $errors[] = "Logo filename is required";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO vendor (name, year_of_establishment, logo) VALUES (?, ?, ?)");
            $stmt->execute([$name, $year, $logo]);
            
            $success = true;
            header("Location: index.php?success=1");
            exit;
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Vendor</title>
    <style>
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; }
        .error { color: red; }
    </style>
</head>
<body>
    <header>
        <h1>Add New Vendor</h1>
        <a href="index.php">Back to Vendors</a>
    </header>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label for="name">Vendor Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="year">Year Established:</label>
            <input type="text" id="year" name="year" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo Filename:</label>
            <input type="text" id="logo" name="logo" required>
            <small>e.g. company_logo.png</small>
        </div>

        <button type="submit">Add Vendor</button>
    </form>
</body>
</html>