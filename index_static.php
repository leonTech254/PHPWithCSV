<?php
// Define data for the CSV
$data = [
    ['John Doe', 'john@example.com', '1234567890'],
    ['Jane Smith', 'jane@example.com', '0987654321'],
    ['Bob Johnson', 'bob@example.com', '5555555555']
];

$filename = 'data.csv';
$file = fopen($filename, 'w');
foreach ($data as $row) {
    fputcsv($file, $row);
}
fclose($file);

// Call the download function
download($filename);

function download($filename)
{
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
}
?>
