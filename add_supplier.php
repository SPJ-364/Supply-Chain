<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact_person = $_POST['contact_person'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO suppliers (name, contact_person, email, phone, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $contact_person, $email, $phone, $address);
    $stmt->execute();

    header("Location: supplier.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2>Add Supplier</h2>
    <form method="POST" class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Supplier Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact Person</label>
            <input type="text" name="contact_person" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Supplier</button>
        <a href="supplier.php" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>