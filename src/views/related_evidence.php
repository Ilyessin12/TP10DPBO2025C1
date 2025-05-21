<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <h2>Related Evidence</h2>
    <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=add" class="button button-primary">Add New Evidence</a>

    <?php if(!empty($relatedEvidences)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Report Title</th>
                <th>Evidence Type</th>
                <th>Description</th>
                <th>Collected Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($relatedEvidences as $evidence): ?>
            <tr>
                <td><?php echo htmlspecialchars($evidence['id']); ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=detail&id=<?php echo $evidence['report_id']; ?>">
                        <?php echo htmlspecialchars($evidence['report_title']); ?> (ID: <?php echo htmlspecialchars($evidence['report_id']); ?>)
                    </a>
                </td>
                <td><?php echo htmlspecialchars($evidence['evidence_type']); ?></td>
                <td><?php echo nl2br(htmlspecialchars(substr($evidence['description'], 0, 100) . (strlen($evidence['description']) > 100 ? '...' : ''))); ?></td>
                <td><?php echo htmlspecialchars($evidence['collected_date']); ?></td>
                <td class="actions">
                    <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=detail&id=<?php echo $evidence['id']; ?>" class="button-secondary">Details</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=edit&id=<?php echo $evidence['id']; ?>" class="button-edit">Edit</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=delete&id=<?php echo $evidence['id']; ?>" class="button-danger" onclick="return confirm('Are you sure you want to delete this piece of evidence?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No related evidence found.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
