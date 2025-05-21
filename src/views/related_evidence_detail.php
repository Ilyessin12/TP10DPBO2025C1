<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <?php if(isset($evidence) && $evidence): ?>
        <h2>Evidence Details</h2>
        
        <div class="detail-item">
            <strong>ID:</strong> <?php echo htmlspecialchars($evidence['id']); ?>
        </div>
        <div class="detail-item">
            <strong>Associated Report:</strong> 
            <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=detail&id=<?php echo $evidence['report_id']; ?>">
                <?php echo htmlspecialchars($evidence['report_title']); ?> (ID: <?php echo htmlspecialchars($evidence['report_id']); ?>)
            </a>
        </div>
        <div class="detail-item">
            <strong>Evidence Type:</strong> <?php echo htmlspecialchars($evidence['evidence_type']); ?>
        </div>
        <div class="detail-item">
            <strong>Collected Date:</strong> <?php echo htmlspecialchars($evidence['collected_date']); ?>
        </div>
        <div class="detail-item">
            <strong>Description:</strong>
            <p><?php echo nl2br(htmlspecialchars($evidence['description'])); ?></p>
        </div>

        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=edit&id=<?php echo $evidence['id']; ?>" class="button-edit">Edit Evidence</a>
        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=list" class="button-secondary">Back to Evidence List</a>
         <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=detail&id=<?php echo $evidence['report_id']; ?>" class="button-secondary">View Associated Report</a>
    <?php else: ?>
        <h2>Evidence Not Found</h2>
        <p>The requested piece of evidence could not be found.</p>
        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=list" class="button-secondary">Back to Evidence List</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
