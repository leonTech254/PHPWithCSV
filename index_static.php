<?php
// Define data for the CSV
$data = [
    ['Martin L', 'leonL@leonteqsecurity.com', '1234567890'],
    ['Leon 191', 'leon191@leonteqsecurity.com', '0987654321'],
    ['Leon Martin', 'leonmartin@leonteqsecurity.com', '5555555555']
];

$filename = 'data.csv';
$file = fopen($filename, 'w');
foreach ($data as $row) {
    fputcsv($file, $row);
}
fclose($file);

download($filename);

function download($filename)
{
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
}
?>
