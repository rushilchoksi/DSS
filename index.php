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

if (date("H") < "12")
    $greetingMsg = "Good morning, " . $_SESSION['USER_NAME'];
else if (date("H") >= "12" && (date("H") < "17"))
    $greetingMsg = "Good afternoon, " . $_SESSION['USER_NAME'];
else
    $greetingMsg = "Good evening, " . $_SESSION['USER_NAME'];

$privilegeLevel = $_SESSION["USER_ROLE"];
$filesList = scandir($SECURE_FILES_DIRECTORY);
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.88.1">
		<title>Home · <?php echo $PROJECT_NAME; ?></title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
		<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="icon" href="<?php echo $PROJECT_LOGO; ?>">
		<meta name="theme-color" content="<?php echo $PROJECT_THEME_COLOR; ?>">
		<style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}
			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}
            th {
                text-align: center;
            }
            .downloadBtn, .downloadBtn:hover {
                text-decoration: none;
                color: white;
            }
		</style>
		<link href="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.css" rel="stylesheet">
	</head>
	<body class="bg-light">
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 style="margin: auto;" class="modal-title" id="staticBackdropLabel">Awaiting server response ...</h5>
					</div>
					<div class="modal-body">
						<center>Please wait while we validate your account.</center>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<main>
				<div class="py-5 text-center">
					<img class="d-block mx-auto mb-4" src="<?php echo $PROJECT_LOGO; ?>" alt="" width="64">
					<h2><?php echo $greetingMsg; ?></h2>
					<p class="lead">Browse from over <?php echo count($filesList) - 1; ?>+ files securely hosted on <?php echo $PROJECT_NAME; ?> and collaborate with your team by sharing content securely across the internet.</p>
                    <?php
                    if ($privilegeLevel == "ADMIN")
                    {
                    ?>
                    <button type="button" class="btn btn-secondary">Upload files</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href = 'accessLogs'">View access logs</button>
                    <?php
                    }
                    ?>
				</div>
			</main>
		</div>
        <div class="table-responsive" style="width: 90%; margin-right: auto; margin-left: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>File</th>
                        <th>Size</th>
                        <th>Last Accessed</th>
                        <th>Last Modified</th>
                        <th>Checksum (SHA256)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($filesList as $fileName)
                    {
                        if (is_dir($SECURE_FILES_DIRECTORY . $fileName) == false)
                        {
                    ?><tr>
                        <td><?php echo $fileName; ?></td>
                        <td><?php echo formatSizeUnits(stat($SECURE_FILES_DIRECTORY . $fileName)['size']); ?></td>
                        <td><?php echo date('d.m.y h:i:s A', stat($SECURE_FILES_DIRECTORY . $fileName)['atime']); ?></td>
                        <td><?php echo date('d.m.y h:i:s A',stat($SECURE_FILES_DIRECTORY . $fileName)['mtime']); ?></td>
                        <td><?php echo hash('sha256', $fileName);?></td>
                        <?php
                        
                        if ($privilegeLevel == "ADMIN")
                        {
                            
                        ?>
                        <th><button type="button" class="btn btn-secondary px-4 gap-3"><a class="downloadBtn" href="<?php echo $RELATIVE_PATH . $fileName; ?>" download="<?php echo $fileName; ?>">Download</a></button></th>
                        <?php
                        }
                        else
                        {
                        ?>
                        <th><button type="button" class="btn btn-secondary px-4 gap-3"><a class="downloadBtn" href="<?php echo $RELATIVE_PATH . $fileName; ?>" download="<?php echo $fileName; ?>">Request download</a></button></th>
                        <?php
                        }
                        ?>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php showFooter(); ?>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>
