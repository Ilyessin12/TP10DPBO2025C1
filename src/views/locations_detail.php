<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <?php if(isset($location) && $location): ?>
        <h2>Location Details: <?php echo htmlspecialchars($location['name']); ?></h2>
        
        <div class="detail-item">
            <strong>ID:</strong> <?php echo htmlspecialchars($location['id']); ?>
        </div>
        <div class="detail-item">
            <strong>Name:</strong> <?php echo htmlspecialchars($location['name']); ?>
        </div>
        <div class="detail-item">
            <strong>District:</strong> <?php echo htmlspecialchars($location['district']); ?>
        </div>
        <div class="detail-item">
            <strong>Description:</strong>
            <p><?php echo nl2br(htmlspecialchars($location['description'])); ?></p>
        </div>

        <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=edit&id=<?php echo $location['id']; ?>" class="button-edit">Edit Location</a>
        <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=list" class="button-secondary">Back to List</a>
    <?php else: ?>
        <h2>Location Not Found</h2>
        <p>The requested location could not be found.</p>
        <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=list" class="button-secondary">Back to List</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
