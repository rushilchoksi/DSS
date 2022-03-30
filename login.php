<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
require('dbConfig.php');
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Hugo 0.88.1">
		<title>Login · <?php echo $PROJECT_NAME; ?></title>
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
					<h2><?php echo $PROJECT_NAME; ?> login panel</h2>
					<p class="lead">Please enter the credentials required below to get started using the <?php echo $PROJECT_NAME; ?> and collaborate with your team by sharing content securely across the internet.</p>
				</div>
				<div class="row g-5" style="padding: 0px 30px;">
					<div class="col-md-12 col-lg-12">
						<h4 class="mb-3">Account credentials</h4>
						<form id="login" class="needs-validation" method="post" novalidate>
							<div class="row g-3">
								<div class="col-12">
									<label for="email" class="form-label">Email</label>
									<input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
								</div>
								<div class="col-12">
									<label for="password" class="form-label">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="· · · · · · · ·" required>
								</div>
							</div>
							<hr class="my-4">
							<button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Login</button>
						</form>
					</div>
				</div>
			</main>
			<?php showFooter(); ?>
		</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script src="https://getbootstrap.com/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script>
			$(document).on('submit', function(event){
				var clientEmail = $('input[name=email]').val();
				var clientPassword = $('input[name=password]').val();

				if ((clientEmail == "") || (clientPassword == ""))
				{
					alert('Please fill out all the required fields.');
					return false;
				}
				else
				{
					event.preventDefault();
					$('#staticBackdrop').modal('show');
					$.ajax({
                        type: 'POST',
                        url: "validateUser.php",
                        data: {
                            form: $("#login").serialize()
                        },
                        success: function(resultData) {
                            $('#staticBackdrop').modal('hide');
							if (resultData == "1")
							{
								window.location.href = 'index';
							}
							else
							{
								alert(resultData);
								window.location.href = 'login';
							}
                        },
						error: function (xhr, ajaxOptions, thrownError) {
							alert("Something went wrong, please try again!");
       					},
						complete: function() {
							$('#staticBackdrop').modal('hide');
						}
                    });
				}
			});
		</script>
	</body>
</html>
