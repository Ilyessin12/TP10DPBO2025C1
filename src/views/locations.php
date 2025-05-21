<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-danger fw-bold"><i class="fas fa-map-marker-alt me-2"></i> Investigation Locations</h2>
    <a href="index.php?entity=location&action=add" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Location
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>District</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?php echo htmlspecialchars($location['name']); ?></td>
                <td><?php echo htmlspecialchars($location['district']); ?></td>
                <td>
                    <?php 
                    if (strlen($location['description']) > 100) {
                        echo htmlspecialchars(substr($location['description'], 0, 100)) . '...';
                    } else {
                        echo htmlspecialchars($location['description']);
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?entity=location&action=edit&id=<?php echo $location['id']; ?>" class="btn btn-sm btn-outline-light me-1">Edit</a>
                    <a href="index.php?entity=location&action=delete&id=<?php echo $location['id']; ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (empty($locations)): ?>
<div class="alert alert-dark text-center">
    No locations found. Add a new location to begin tracking anomalies.
</div>
<?php endif; ?>

<?php
require_once __DIR__ . '/template/footer.php';
?>
