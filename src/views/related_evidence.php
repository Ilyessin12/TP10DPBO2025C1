<?php
require_once __DIR__ . '/template/header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-danger fw-bold"><i class="fas fa-microscope me-2"></i> Related Evidence</h2>
    <a href="index.php?entity=evidence&action=add" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add New Evidence
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Type</th>
                <th>Related Report</th>
                <th>Collected Date</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($evidences as $evidence): ?>
            <tr>
                <td><?php echo htmlspecialchars($evidence['evidence_type']); ?></td>
                <td>
                    <a href="index.php?entity=report&action=view&id=<?php echo $evidence['report_id']; ?>" class="text-info">
                        <?php echo htmlspecialchars($evidence['report_title']); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($evidence['collected_date']); ?></td>
                <td>
                    <?php 
                    if (strlen($evidence['description']) > 100) {
                        echo htmlspecialchars(substr($evidence['description'], 0, 100)) . '...';
                    } else {
                        echo htmlspecialchars($evidence['description']);
                    }
                    ?>
                </td>
                <td>
                    <a href="index.php?entity=evidence&action=edit&id=<?php echo $evidence['id']; ?>" class="btn btn-sm btn-outline-light me-1">Edit</a>
                    <a href="index.php?entity=evidence&action=delete&id=<?php echo $evidence['id']; ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php if (empty($evidences)): ?>
<div class="alert alert-dark text-center">
    No evidence records found. Add new evidence to document your findings.
</div>
<?php endif; ?>

<?php
require_once __DIR__ . '/template/footer.php';
?>
