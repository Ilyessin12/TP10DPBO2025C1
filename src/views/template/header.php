<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anomaly Reports System - C;C Edition</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo">ARS // C;C</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>index.php?entity=phenomena_reports&action=list">Phenomena Reports</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php?entity=locations&action=list">Locations</a></li>
                    <li><a href="<?php echo BASE_URL; ?>index.php?entity=related_evidence&action=list">Related Evidence</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container">
