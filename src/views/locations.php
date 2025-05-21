<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <h2>Locations</h2>
    <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=add" class="button button-primary">Add New Location</a>

    <?php if(!empty($locations)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>District</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($locations as $location): ?>
            <tr>
                <td><?php echo htmlspecialchars($location['id']); ?></td>
                <td><?php echo htmlspecialchars($location['name']); ?></td>
                <td><?php echo htmlspecialchars($location['district']); ?></td>
                <td><?php echo nl2br(htmlspecialchars(substr($location['description'], 0, 100) . (strlen($location['description']) > 100 ? '...' : ''))); ?></td>
                <td class="actions">
                    <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=detail&id=<?php echo $location['id']; ?>" class="button-secondary">Details</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=edit&id=<?php echo $location['id']; ?>" class="button-edit">Edit</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=delete&id=<?php echo $location['id']; ?>" class="button-danger" onclick="return confirm('Are you sure you want to delete this location?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No locations found.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
