<?php
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
		<title>Register · <?php echo $PROJECT_NAME; ?></title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
		<link href="https://getbootstrap.com/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
		<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
		<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
		<link rel="manifest" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/manifest.json">
		<link rel="mask-icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
		<link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">
		<meta name="theme-color" content="#7952b3">
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
						<center>Please wait while we process your request.</center>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<main>
				<div class="py-5 text-center">
					<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
					<h2><?php echo $PROJECT_NAME; ?> registration panel</h2>
					<p class="lead">Please enter the credentials required below to get started using the <?php echo $PROJECT_NAME; ?> and collaborate with your team by sharing content securely across the internet.</p>
				</div>
				<div class="row g-5">
					<div class="col-md-12 col-lg-12">
						<h4 class="mb-3">Personal information</h4>
						<form id="register" class="needs-validation" method="post" novalidate>
							<div class="row g-3">
								<div class="col-sm-6">
									<label for="firstName" class="form-label">First name</label>
									<input type="text" name="firstName" class="form-control" id="firstName" placeholder="" required>
								</div>
								<div class="col-sm-6">
									<label for="lastName" class="form-label">Last name</label>
									<input type="text" name="lastName" class="form-control" id="lastName" placeholder="" required>
								</div>
								<div class="col-12">
									<label for="email" class="form-label">Email</label>
									<input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
								</div>
								<div class="col-sm-6">
									<label for="address" class="form-label">Password</label>
									<input type="password" name="password" class="form-control" id="password" placeholder="· · · · · · · ·" required>
								</div>
								<div class="col-sm-6">
									<label for="address" class="form-label">Re enter Password</label>
									<input type="password" name="rePassword" class="form-control" id="rePassword" placeholder="· · · · · · · ·" required>
								</div>
							</div>
							<hr class="my-4">
							<button class="w-100 btn btn-primary btn-lg" type="submit">Proceed to registration</button>
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
				var passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;


				var firstName = $('input[name=firstName]').val();
				var lastName = $('input[name=lastName]').val();
				var clientEmail = $('input[name=email]').val();
				var clientPassword = $('input[name=password]').val();
				var clientRePassword = $('input[name=rePassword]').val();

				if ((firstName == "") || (lastName == "") || (clientEmail == "") || (clientPassword == "") || (clientRePassword == ""))
				{
					alert('Please fill out all the required fields.');
					return false;
				}
				else if(!passwordRegex.test(clientPassword)) {
        			alert("Password should contain atleast 8 characters with at least a symbol, upper and lower case letters and a number.");
        			return false;
    			}
				else if (clientPassword != clientRePassword)
				{
					alert('Password do not match, please try again.');
					return false;
				}
				else
				{
					event.preventDefault();
					$('#staticBackdrop').modal('show');
					$.ajax({
                        type: 'POST',
                        url: "registerUser.php",
                        data: {
                            form: $("#register").serialize()
                        },
                        success: function(resultData) {
                            $('#staticBackdrop').modal('hide');
							alert(resultData)
							window.location.href = 'login.php';
                        },
                        error: function(resultData) {
                            $('#staticBackdrop').modal('hide');
                            alert("Something went wrong, please try again!", resultData);
                        }
                    });
				}
			});
		</script>
	</body>
</html>
