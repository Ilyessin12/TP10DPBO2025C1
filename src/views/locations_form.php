<?php require_once __DIR__ . '/template/header.php'; ?>

<?php
$is_edit = isset($location);
$form_action = $is_edit ? BASE_URL . 'index.php?entity=locations&action=update' : BASE_URL . 'index.php?entity=locations&action=save';
$page_title = $is_edit ? 'Edit Location: ' . htmlspecialchars($location['name']) : 'Add New Location';
?>

<div class="content-box">
    <h2><?php echo $page_title; ?></h2>

    <form action="<?php echo $form_action; ?>" method="POST">
        <?php if($is_edit): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($location['id']); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $is_edit ? htmlspecialchars($location['name']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="district">District:</label>
            <input type="text" id="district" name="district" value="<?php echo $is_edit ? htmlspecialchars($location['district']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $is_edit ? htmlspecialchars($location['description']) : ''; ?></textarea>
        </div>

        <button type="submit" class="button-primary"><?php echo $is_edit ? 'Update Location' : 'Save Location'; ?></button>
        <a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=list" class="button-secondary">Cancel</a>
    </form>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
