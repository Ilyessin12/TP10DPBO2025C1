<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="text-danger m-0"><?php echo isset($location) ? 'Edit Location' : 'Add New Location'; ?></h2>
    </div>
    <div class="card-body">
        <form action="index.php?entity=location&action=<?php echo isset($location) ? 'update&id=' . $location['id'] : 'save'; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Location Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($location) ? htmlspecialchars($location['name']) : ''; ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="district" class="form-label">District/Area:</label>
                <input type="text" id="district" name="district" class="form-control" value="<?php echo isset($location) ? htmlspecialchars($location['district']) : ''; ?>">
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="4"><?php echo isset($location) ? htmlspecialchars($location['description']) : ''; ?></textarea>
                <div class="form-text text-light">Include notable features, history of paranormal activity, or other relevant details.</div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?entity=location" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Location</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/template/footer.php';
?>
