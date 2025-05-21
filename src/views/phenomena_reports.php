<?php require_once __DIR__ . '/template/header.php'; ?>

<div class="content-box">
    <h2>Phenomena Reports</h2>
    <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=add" class="button button-primary">Add New Report</a>

    <?php if(!empty($phenomenaReports)): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Reported Date</th>
                <th>Location</th>
                <th>Severity</th>
                <th>Reporter Alias</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($phenomenaReports as $report): ?>
            <tr>
                <td><?php echo htmlspecialchars($report['id']); ?></td>
                <td><?php echo htmlspecialchars($report['report_title']); ?></td>
                <td><?php echo htmlspecialchars($report['reported_date']); ?></td>
                <td><?php echo htmlspecialchars($report['location_name'] ?? 'N/A'); ?></td>
                <td><?php echo htmlspecialchars($report['severity_level']); ?></td>
                <td><?php echo htmlspecialchars($report['reporter_alias']); ?></td>
                <td class="actions">
                    <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=detail&id=<?php echo $report['id']; ?>" class="button-secondary">Details</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=edit&id=<?php echo $report['id']; ?>" class="button-edit">Edit</a>
                    <a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=delete&id=<?php echo $report['id']; ?>" class="button-danger" onclick="return confirm('Are you sure you want to delete this report? This may also delete related evidence.');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No phenomena reports found.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/template/footer.php'; ?>
