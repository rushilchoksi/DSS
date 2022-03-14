<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require('dbConfig.php');
if (isset($_SESSION["AUTH"]))
{
    if ($_SESSION["AUTH"] != true)
        header('Location: login');
}
else
    header('Location: login');
echo "Welcome " . $_SESSION['USER_NAME'] . "<br><br>";
$files = scandir('/Applications/XAMPP/xamppfiles/htdocs/dss');
?>
<head>
    <style>
        th, td{
            padding: 0px 20px;
        }
    </style>
</head>
<table>
    <tr>
        <th>File</th>
        <th>Size</th>
        <th>Last Accessed</th>
        <th>Last Modified</th>
        <th>Checksum (SHA256)</th>
    </tr>
<?php
foreach ($files as $fileName) {
    ?>
    <tr>
      <td><?php echo $fileName; ?></td>
      <td><?php echo stat($fileName)['size']; ?> bytes</td>
      <td><?php echo date('D d.m.Y h:i:s A', stat($fileName)['atime']); ?></td>
      <td><?php echo date('D d.m.Y h:i:s A',stat($fileName)['mtime']); ?></td>
      <td><?php echo hash_file('sha256', $fileName);?></td>
    </tr>
  <?php
}
?>
</table>
