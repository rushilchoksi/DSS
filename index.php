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
if ($_SESSION["USER_DIRECTORY"] == "*")
{
    $filesList = recursiveScan($SECURE_FILES_DIRECTORY);
    $directoryName = "/";
}
else if ($_SESSION["USER_DIRECTORY"] == ".")
{
    $filesList = array();
    $directoryName = "None";
}
else
{
    $filesList = recursiveScan($SECURE_FILES_DIRECTORY . "/" . $_SESSION["USER_DIRECTORY"]);
    $directoryName = $_SESSION["USER_DIRECTORY"];
}
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
            .actionBtn {
                width: 160px;
            }
            .downloadBtn, .downloadBtn:hover {
                text-decoration: none;
                color: white;
            }
		</style>
		<link href="https://getbootstrap.com/docs/5.1/examples/checkout/form-validation.css" rel="stylesheet">
	</head>
	<body class="bg-light">
        <div class="modal fade" id="awaitingModal" tabindex="-1" role="dialog" aria-labelledby="awaitingModalTitle" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title cb-employment-head" id="awaitingModalTitle" style="margin: auto;">Awaiting server response ...</h5>
					</div>
					<div class="modal-body" style="margin: auto;">
						<div class="spinner-border text-dark" role="status"> </div>
					</div>
					<div class="modal-header">
						<center class="text-area">
							<p class="text-area" style="font-size: 16px;">Please wait while we acknowledge your request, do not refresh or reload this page.</p>
						</center>
					</div>
				</div>
			</div>
		</div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload file</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="uploadForm" method="post" action="uploadFile.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Please select the file which you wish to upload</label>
                                <input class="form-control" type="file" name="fileData" id="formFile" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Choose directory</label>
                                <select class="form-select" name="targetDir" id="inputGroupSelect01">
                                    <?php
                                        $dirPath = opendir($SECURE_FILES_DIRECTORY);
                                        while ($dirName = readdir($dirPath))
                                        {
                                            if ((is_dir($dirName)) and ($dirName != '..'))
                                            {
                                                $dirNames = explode(' ', $dirName);
                                                foreach ($dirNames as $indexValue => $mappingValue)
                                                    echo "\n\t\t\t\t\t\t\t\t\t<option value=\"$mappingValue\">$mappingValue</option>";
                                            }
                                        }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		<div class="container">
			<main>
				<div class="py-5 text-center">
					<img class="d-block mx-auto mb-4" src="<?php echo $PROJECT_LOGO; ?>" alt="" width="64">
					<h2><?php echo $greetingMsg; ?></h2>
					<p class="lead">Browse from over <?php if (count($filesList) > 1) echo count($filesList) - 1 . "+"; else echo 0 ?> files securely hosted on <?php echo $PROJECT_NAME; ?> and collaborate with your team by sharing content securely across the internet.</p>
                    <span type="button" class="btn btn-primary">Directory assigned: <code style="color: white;"><?php echo $directoryName; ?></code></span><br><br>
                    <?php
                    if ($privilegeLevel == "ADMIN")
                    {
                    ?>
                    <button type="button" class="btn btn-secondary actionBtn" onclick="window.open('approveRequests', '_blank');">Approve requests</button>
                    <button type="button" class="btn btn-secondary actionBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload files</button>
                    <button type="button" class="btn btn-secondary actionBtn" onclick="window.open('accessLogs', '_blank');">View access logs</button>
                    <button type="button" class="btn btn-secondary actionBtn" onclick="window.open('modifyAccess', '_blank');">Modify privileges</button>
                    <?php
                    }
                    ?>
				</div>
			</main>
		</div>
        <div class="table-responsive" style="width: 90%; margin-right: auto; margin-left: auto;">
            <?php
            if (count($filesList) == 0)
                echo "<p class='lead' style='text-align: center;'>You have not been assigned access to any files yet, if you think there's an issue, please contact the administrator.</p>";
            else
            {
            ?>
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
                        if (is_dir($fileName) == false)
                        {
                    ?><tr>
                        <td><?php if (strlen($fileName) > 20) echo substr($fileName, 0, 20) . " ..."; else echo $fileName ?></td>
                        <td><?php echo formatSizeUnits(stat($fileName)['size']); ?></td>
                        <td><?php echo date('d.m.y h:i:s A', stat($fileName)['atime']); ?></td>
                        <td><?php echo date('d.m.y h:i:s A',stat($fileName)['mtime']); ?></td>
                        <td><?php echo hash('sha256', $fileName);?></td>
                        <?php
                        if ($privilegeLevel == "ADMIN")
                        {
                        ?>
                        <th><button type="button" class="btn btn-secondary px-4 gap-3"><a class="downloadBtn" href="<?php echo $fileName; ?>" download="<?php echo $fileName; ?>">Download</a></button></th>
                        <?php
                        }
                        else
                        {
                        ?><th>
                            <form action="requestFile.php" method="post">
                                <input type="hidden" name="fileName" value="<?php echo $fileName; ?>">
                                <button type="submit" class="btn btn-secondary px-4 gap-3">Request download</button>
                            </form>
                        </th>
                        <?php
                        }
                        ?></tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        <?php showFooter(); ?>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>
