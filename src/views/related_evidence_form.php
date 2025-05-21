<?php require_once __DIR__ . '/template/header.php'; ?>

<?php
$is_edit = isset($evidence);
$form_action = $is_edit ? BASE_URL . 'index.php?entity=related_evidence&action=update' : BASE_URL . 'index.php?entity=related_evidence&action=save';
$page_title = $is_edit ? 'Edit Evidence' : 'Add New Evidence';
?>

<div class="content-box">
    <h2><?php echo $page_title; ?></h2>

    <form action="<?php echo $form_action; ?>" method="POST">
        <?php if($is_edit): ?>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($evidence['id']); ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="report_id">Associated Report:</label>
            <select id="report_id" name="report_id" required>
                <option value="">Select Report</option>
                <?php foreach($reports as $rep): ?>
                    <option value="<?php echo htmlspecialchars($rep['id']); ?>" 
                        <?php 
                        if($is_edit && $evidence['report_id'] == $rep['id']){
                            echo 'selected';
                        } elseif(!$is_edit && isset($report_id_prefill) && $report_id_prefill == $rep['id']){
                            echo 'selected';
                        }
                        ?>>
                        <?php echo htmlspecialchars($rep['report_title']); ?> (ID: <?php echo htmlspecialchars($rep['id']); ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="evidence_type">Evidence Type:</label>
            <input type="text" id="evidence_type" name="evidence_type" value="<?php echo $is_edit ? htmlspecialchars($evidence['evidence_type']) : ''; ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $is_edit ? htmlspecialchars($evidence['description']) : ''; ?></textarea>
        </div>

        <div class="form-group">
            <label for="collected_date">Collected Date (Optional):</label>
            <input type="datetime-local" id="collected_date" name="collected_date" value="<?php echo $is_edit && $evidence['collected_date'] ? date('Y-m-d\TH:i', strtotime($evidence['collected_date'])) : ''; ?>">
            <small>If left blank, current timestamp will be used upon creation.</small>
        </div>


        <button type="submit" class="button-primary"><?php echo $is_edit ? 'Update Evidence' : 'Save Evidence'; ?></button>
        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=list" class="button-secondary">Cancel</a>
    </form>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
