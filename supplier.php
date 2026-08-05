<?php
require_once 'config.php';

$result = $conn->query("SELECT * FROM suppliers ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Supplier Management</h2>
        <div>
            <a href="index.php" class="btn btn-secondary me-2">&larr; Home</a>
            <a href="add_supplier.php" class="btn btn-primary">Add New Supplier</a>
        </div>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Supplier Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($supplier = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $supplier['id']; ?></td>
                        <td><?= htmlspecialchars($supplier['name']); ?></td>
                        <td><?= htmlspecialchars($supplier['contact_person']); ?></td>
                        <td><?= htmlspecialchars($supplier['email']); ?></td>
                        <td><?= htmlspecialchars($supplier['phone']); ?></td>
                        <td>
                            <a href="edit_supplier.php?id=<?= $supplier['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_supplier.php?id=<?= $supplier['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            
                            <!-- Main Link to Purchase Orders -->
                            <a href="purchase_orders.php?supplier_id=<?= $supplier['id']; ?>" class="btn btn-info btn-sm text-white">
                                Purchase Orders
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No suppliers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>