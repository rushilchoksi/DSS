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
if ($privilegeLevel != "ADMIN")
{
    echo "<script>alert('You are not authorized to access this page, if you think there is an issue, please contact the administrator.'); window.location.href='index';</script>";
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
		<title>Approve Requests · <?php echo $PROJECT_NAME; ?></title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
		<link href="assets/bootstrap.min.css" rel="stylesheet">
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
            .actionBtn {
                width: 120px;
            }
            th, td {
                text-align: center;
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
					<p class="lead"><?php echo $PROJECT_NAME; ?>  logs data for each separate request and can also be exported to standardized file sharing formats from within the interface.</p>
				</div>
			</main>
		</div>
        <div class="table-responsive" style="width: 90%; margin-right: auto; margin-left: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Privilege</th>
                        <th>Accessed</th>
                        <th>Verified</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlFetchAccessLogsQuery = "SELECT * FROM `users`";
                    if ($sqlFetchResult = mysqli_query($dbConnection, $sqlFetchAccessLogsQuery))
                    {
                        while ($accessLogData = mysqli_fetch_array($sqlFetchResult))
                        {
                            ?>
                            <tr>
                                <td><?php echo $accessLogData["ID"]; ?></td>
                                <td><?php echo $accessLogData["Name"]; ?></td>
                                <td><?php echo $accessLogData["Email"]; ?></td>
                                <td><?php echo $accessLogData["Privileges"]; ?></td>
                                <td><?php echo $accessLogData["accessCount"]; ?></td>
                                <td><?php echo (boolval($accessLogData["Verified"]) ? 'True' : 'False'); ?></td>
                                <?php
                                if ($accessLogData["lastLogin"] != "") {
                                ?>
                                <td><?php echo $accessLogData["lastLogin"]; ?></td>
                                <?php
                                }
                                else {
                                ?>
                                <td>NA</td>
                                <?php
                                }
                                ?>
                                <td>
                                    <form action="updateAcctStatus.php" method="post">
                                        <input type="hidden" name="userID" value="<?php echo $accessLogData["ID"]; ?>">
                                    <?php
                                    if ($accessLogData["Verified"] == 1 && $accessLogData["Privileges"] == "CLIENT") {
                                    ?>
                                    <button type="submit" class="btn btn-danger btn-sm actionBtn">Deactivate</button>
                                    <?php
                                    }
                                    else if ($accessLogData["Verified"] == 1 && $accessLogData["Privileges"] == "ADMIN") {
                                    ?>
                                    <button type="submit" class="btn btn-danger btn-sm actionBtn" disabled>Deactivate</button>
                                    <?php
                                    }
                                    else {
                                    ?>
                                    <button type="submit" class="btn btn-warning btn-sm actionBtn">Activate</button>
                                    <?php
                                    }
                                    ?>
                                    </form>
                                </td>
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
