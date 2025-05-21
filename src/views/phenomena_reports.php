<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-danger fw-bold"><i class="fas fa-file-alt me-2"></i> Phenomena Reports</h2>
    <a href="index.php?entity=report&action=add" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Report
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Location</th>
                <th>Reporter</th>
                <th>Severity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
            <tr class="severity-<?php echo htmlspecialchars($report['severity_level']); ?>">
                <td><?php echo htmlspecialchars($report['report_title']); ?></td>
                <td><?php echo htmlspecialchars($report['reported_date']); ?></td>
                <td><?php echo htmlspecialchars($report['location_name']); ?></td>
                <td><?php echo htmlspecialchars($report['reporter_alias']); ?></td>
                <td>
                    <span class="badge bg-<?php 
                        switch($report['severity_level']) {
                            case 'Critical': echo 'danger'; break;
                            case 'High': echo 'warning'; break;
                            case 'Medium': echo 'info'; break;
                            default: echo 'success'; break;
                        }
                    ?>">
                        <?php echo htmlspecialchars($report['severity_level']); ?>
                    </span>
                </td>
                <td>
                    <a href="index.php?entity=report&action=view&id=<?php echo $report['id']; ?>" class="btn btn-sm btn-outline-info me-1">View</a>
                    <a href="index.php?entity=report&action=edit&id=<?php echo $report['id']; ?>" class="btn btn-sm btn-outline-light me-1">Edit</a>
                    <a href="index.php?entity=report&action=delete&id=<?php echo $report['id']; ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (empty($reports)): ?>
<div class="alert alert-dark text-center">
    No phenomena reports found. Add a new report to begin documenting anomalies.
</div>
<?php endif; ?>

<?php
require_once __DIR__ . '/template/footer.php';
?>
