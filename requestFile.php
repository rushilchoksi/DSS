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
$_SESSION['FILE_NAME'] = $_POST["fileName"];
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
        <div class="modal fade" id="awaitingModal" tabindex="-1" role="dialog" aria-labelledby="awaitingModalTitle" aria-hidden="false">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title cb-employment-head" id="awaitingModalTitle" style="margin: auto;">Requesting resources ...</h5>
					</div>
					<div class="modal-body" style="margin: auto;">
						<div class="spinner-border text-dark" role="status"> </div>
					</div>
					<div class="modal-header">
						<center class="text-area">
							<p class="text-area" style="font-size: 16px;">Please wait while we acknowledge your request for access of <?php echo $_SESSION['FILE_NAME']; ?>, do not refresh or reload this page.</p>
						</center>
					</div>
				</div>
			</div>
		</div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Enter OTP sent to <?php echo maskEmail($_SESSION['USER_EMAIL']); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="window.location.href='index'" aria-label="Close"></button>
                    </div>
                    <form id="verifyOTPForm" method="post">
                        <div class="modal-body">
                            <p style="float: right;" id="finalMain"><span id="mainPlaceholder">OTP expires in </span><span id="otpTimer">01:00</span></p>
                                <div class="mb-3">
                                    <label for="otpInputField" class="form-label">OTP</label>
                                    <input type="text" name="userOTPValue" class="form-control" id="otpInputField">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='index'" data-bs-dismiss="modal">Close</button>
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
					<p class="lead">Please wait while we respond to your request for access to <?php echo $_SESSION['FILE_NAME']; ?> from <?php echo $PROJECT_NAME; ?>'s servers, thank you!</p>
                    <?php
                    if ($privilegeLevel == "ADMIN")
                    {
                    ?>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Upload files</button>
                    <button type="button" class="btn btn-secondary" onclick="window.open('accessLogs', '_blank');">View access logs</button>
                    <?php
                    }
                    ?>
				</div>
			</main>
		</div>
        <?php showFooter(); ?>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#awaitingModal').modal('show');
                $.ajax({
                    type: "POST",
                    url: 'sendMail.php',
                    success: function(resultData)
                    {
                        console.log(resultData);
                        $('#awaitingModal').modal('hide');
                        $('#staticBackdrop').modal('show');
                    }
                });
            });
            $('#verifyOTPForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'verifyOTP.php',
                    data: {
                        form: $("#verifyOTPForm").serialize(),
                    },
                    success: function(resultData)
                    {
                        if (resultData == "1")
                            window.location.href = 'grantFile';
                        else
                            alert(resultData);
                    },
                    error: function(resultData)
                    {
                        alert("Something went wrong, please try again!");
                    }
                });
            });

            var countdown = 59, timer = setInterval(function() {
                $("#otpTimer").html("00:" + String(countdown--).padStart(2, '0'));
                if(countdown == 0) {
                    $("#finalMain").html("<p style='float: right;margin:0' id='finalMain'><span id='mainPlaceholder' style='color: red;'>OTP has expired</span></p>");
                    clearInterval(timer)
                };
            }, 1000);

        </script>
	</body>
</html>
