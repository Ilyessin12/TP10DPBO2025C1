<?php require_once __DIR__ . '/template/header.php'; ?>

<?php
$is_edit = isset($report);
$form_action = $is_edit ? BASE_URL . 'index.php?entity=phenomena_reports&action=update' : BASE_URL . 'index.php?entity=phenomena_reports&action=save';
$page_title = $is_edit ? 'Edit Report: ' . htmlspecialchars($report['report_title']) : 'Add New Phenomena Report';

$severity_levels = ['Low', 'Medium', 'High', 'Critical'];
?>

<div class="content-box">
    <h2><?php echo $page_title; ?></h2>

    <form action="<?php echo $form_action; ?>" method="POST">
        <?php if($is_edit): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($report['id']); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="report_title">Report Title:</label>
            <input type="text" id="report_title" name="report_title" value="<?php echo $is_edit ? htmlspecialchars($report['report_title']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="reported_date">Reported Date:</label>
            <input type="date" id="reported_date" name="reported_date" value="<?php echo $is_edit ? htmlspecialchars($report['reported_date']) : ''; ?>" required>
        </div>

        <div class="form-group">
            <label for="location_id">Location:</label>
            <select id="location_id" name="location_id">
                <option value="">Select Location (Optional)</option>
                <?php foreach($locations as $loc): ?>
                    <option value="<?php echo htmlspecialchars($loc['id']); ?>" <?php echo ($is_edit && $report['location_id'] == $loc['id']) || (!$is_edit && isset($_GET['location_id']) && $_GET['location_id'] == $loc['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($loc['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $is_edit ? htmlspecialchars($report['description']) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="reporter_alias">Reporter Alias:</label>
            <input type="text" id="reporter_alias" name="reporter_alias" value="<?php echo $is_edit ? htmlspecialchars($report['reporter_alias']) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="severity_level">Severity Level:</label>
            <select id="severity_level" name="severity_level" required>
                <?php foreach($severity_levels as $level): ?>
                    <option value="<?php echo $level; ?>" <?php echo ($is_edit && $report['severity_level'] == $level) ? 'selected' : (!$is_edit && $level == 'Medium' ? 'selected' : ''); ?>>
                        <?php echo $level; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="button-primary"><?php echo $is_edit ? 'Update Report' : 'Save Report'; ?></button>
        <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=list" class="button-secondary">Cancel</a>
    </form>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
