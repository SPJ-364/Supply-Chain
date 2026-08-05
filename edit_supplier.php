<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: supplier.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("UPDATE suppliers SET name = ?, contact_person = ?, email = ?, phone = ?, address = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $contact_person, $email, $phone, $address, $id);
    $stmt->execute();

    header("Location: supplier.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM suppliers WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$supplier = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Edit Supplier</h2>
    <form method="POST" class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Supplier Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($supplier['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact Person</label>
            <input type="text" name="contact_person" class="form-control" value="<?= htmlspecialchars($supplier['contact_person']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($supplier['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($supplier['phone']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required><?= htmlspecialchars($supplier['address']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Supplier</button>
        <a href="supplier.php" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>