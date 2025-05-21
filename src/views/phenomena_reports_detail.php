<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <?php if(isset($report) && $report): ?>
        <h2>Report Details: <?php echo htmlspecialchars($report['report_title']); ?></h2>
        
        <div class="detail-item">
            <strong>ID:</strong> <?php echo htmlspecialchars($report['id']); ?>
        </div>
        <div class="detail-item">
            <strong>Title:</strong> <?php echo htmlspecialchars($report['report_title']); ?>
        </div>
        <div class="detail-item">
            <strong>Reported Date:</strong> <?php echo htmlspecialchars($report['reported_date']); ?>
        </div>
        <div class="detail-item">
            <strong>Location:</strong> <?php echo htmlspecialchars($report['location_name'] ?? 'N/A'); ?>
            <?php if($report['location_id']): ?>
                (<a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=detail&id=<?php echo $report['location_id']; ?>">View Location Details</a>)
            <?php endif; ?>
        </div>
        <div class="detail-item">
            <strong>Severity Level:</strong> <?php echo htmlspecialchars($report['severity_level']); ?>
        </div>
        <div class="detail-item">
            <strong>Reporter Alias:</strong> <?php echo htmlspecialchars($report['reporter_alias']); ?>
        </div>
        <div class="detail-item">
            <strong>Description:</strong>
            <p><?php echo nl2br(htmlspecialchars($report['description'])); ?></p>
        </div>

        <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=edit&id=<?php echo $report['id']; ?>" class="button-edit">Edit Report</a>
        <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=list" class="button-secondary">Back to Reports List</a>
        
        <h3>Related Evidence</h3>
        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=add&report_id=<?php echo $report['id']; ?>" class="button button-primary">Add Evidence to this Report</a>
        <?php if(!empty($evidences)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Collected Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($evidences as $evidence): ?>
                <tr>
                    <td><?php echo htmlspecialchars($evidence['id']); ?></td>
                    <td><?php echo htmlspecialchars($evidence['evidence_type']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars(substr($evidence['description'], 0, 70) . (strlen($evidence['description']) > 70 ? '...' : ''))); ?></td>
                    <td><?php echo htmlspecialchars($evidence['collected_date']); ?></td>
                    <td class="actions">
                        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=detail&id=<?php echo $evidence['id']; ?>" class="button-secondary">Details</a>
                        <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=edit&id=<?php echo $evidence['id']; ?>" class="button-edit">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No related evidence found for this report.</p>
        <?php endif; ?>

    <?php else: ?>
        <h2>Report Not Found</h2>
        <p>The requested phenomena report could not be found.</p>
        <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=list" class="button-secondary">Back to Reports List</a>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
