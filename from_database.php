<?php
// Connect to the database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'leonteqsecurity191';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = 'SELECT username, email, fullname FROM leon_users';
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array($row['username'], $row['email'], $row['fullname']);
}
mysqli_close($conn);

$filename = 'from_database.csv';

$file = fopen($filename, 'w');

$headings = array('username', 'Email', 'Fullname');
fputcsv($file, $headings);



foreach ($data as $row) {
    fputcsv($file, $row);
}

fclose($file);

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);
?>
