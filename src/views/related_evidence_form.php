<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="text-danger m-0"><?php echo isset($evidence) ? 'Edit Evidence Record' : 'Add New Evidence Record'; ?></h2>
    </div>
    <div class="card-body">
        <form action="index.php?entity=evidence&action=<?php echo isset($evidence) ? 'update&id=' . $evidence['id'] : 'save'; ?>" method="POST">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="report_id" class="form-label">Related Report:</label>
                    <select id="report_id" name="report_id" class="form-select" required>
                        <option value="">-- Select Report --</option>
                        <?php foreach ($reports as $report): ?>
                        <option value="<?php echo $report['id']; ?>" <?php echo (isset($evidence) && $evidence['report_id'] == $report['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($report['report_title']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="evidence_type" class="form-label">Evidence Type:</label>
                    <input type="text" id="evidence_type" name="evidence_type" class="form-control" value="<?php echo isset($evidence) ? htmlspecialchars($evidence['evidence_type']) : ''; ?>" required>
                    <div class="form-text text-light">E.g., Photograph, Audio Recording, Physical Sample, Witness Testimony</div>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="collected_date" class="form-label">Collection Date:</label>
                <input type="datetime-local" id="collected_date" name="collected_date" class="form-control" value="<?php echo isset($evidence) ? date('Y-m-d\TH:i', strtotime($evidence['collected_date'])) : date('Y-m-d\TH:i'); ?>">
                <div class="form-text text-light">Leave blank to use current time</div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="5"><?php echo isset($evidence) ? htmlspecialchars($evidence['description']) : ''; ?></textarea>
                <div class="form-text text-light">Provide details about the evidence, how it was collected, and its relevance to the case.</div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?entity=evidence" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Evidence</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/template/footer.php';
?>
