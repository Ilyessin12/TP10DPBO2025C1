<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="card">
    <div class="card-header">
        <h2 class="text-danger m-0"><?php echo isset($report) ? 'Edit Phenomena Report' : 'Add New Phenomena Report'; ?></h2>
    </div>
    <div class="card-body">
        <form action="index.php?entity=report&action=<?php echo isset($report) ? 'update&id=' . $report['id'] : 'save'; ?>" method="POST">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="report_title" class="form-label">Report Title:</label>
                    <input type="text" id="report_title" name="report_title" class="form-control" value="<?php echo isset($report) ? htmlspecialchars($report['report_title']) : ''; ?>" required>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="reported_date" class="form-label">Reported Date:</label>
                    <input type="date" id="reported_date" name="reported_date" class="form-control" value="<?php echo isset($report) ? htmlspecialchars($report['reported_date']) : date('Y-m-d'); ?>" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="location_id" class="form-label">Location:</label>
                    <select id="location_id" name="location_id" class="form-select" required>
                        <option value="">-- Select Location --</option>
                        <?php foreach ($locations as $location): ?>
                        <option value="<?php echo $location['id']; ?>" <?php echo (isset($report) && $report['location_id'] == $location['id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($location['name']) . ' (' . htmlspecialchars($location['district']) . ')'; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="severity_level" class="form-label">Severity Level:</label>
                    <select id="severity_level" name="severity_level" class="form-select">
                        <option value="Low" <?php echo (isset($report) && $report['severity_level'] == 'Low') ? 'selected' : ''; ?>>Low</option>
                        <option value="Medium" <?php echo (isset($report) && $report['severity_level'] == 'Medium') ? 'selected' : ''; ?> <?php echo (!isset($report)) ? 'selected' : ''; ?>>Medium</option>
                        <option value="High" <?php echo (isset($report) && $report['severity_level'] == 'High') ? 'selected' : ''; ?>>High</option>
                        <option value="Critical" <?php echo (isset($report) && $report['severity_level'] == 'Critical') ? 'selected' : ''; ?>>Critical</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="reporter_alias" class="form-label">Reporter Alias:</label>
                <input type="text" id="reporter_alias" name="reporter_alias" class="form-control" value="<?php echo isset($report) ? htmlspecialchars($report['reporter_alias']) : ''; ?>">
                <div class="form-text text-light">For confidentiality, use an alias if needed.</div>
            </div>
            
            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea id="description" name="description" class="form-control" rows="6" required><?php echo isset($report) ? htmlspecialchars($report['description']) : ''; ?></textarea>
                <div class="form-text text-light">Provide detailed observations and information about the paranormal/anomalous phenomena.</div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="index.php?entity=report" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Save Report</button>
            </div>
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/template/footer.php';
?>
