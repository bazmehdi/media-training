<?php
$jsonFile = 'data.json';
$submissions = [];

// Read and decode the JSON file if it exists
if (file_exists($jsonFile)) {
    $fileContents = file_get_contents($jsonFile);
    $decodedData = json_decode($fileContents, true);
    
    if (is_array($decodedData)) {
        $submissions = $decodedData;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <link rel="stylesheet" href="baz_styles.css">
</head>
<body>

    <h2>Accumulated Submissions</h2>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($submissions)): ?>
                <?php foreach ($submissions as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['firstName'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['surname'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['email'] ?? '') ?></td>
                        <td><?= nl2br(htmlspecialchars($row['comments'] ?? '')) ?></td>
                        <td><?= htmlspecialchars($row['timestamp'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="empty-state">No data has been submitted yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="baz_index.html" class="back-link">&larr; Back to Form</a>

</body>
</html>