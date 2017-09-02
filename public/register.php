<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<script src="js/register.js"></script>
    <div class="container">

      <header>
            <h1 class="text-center">Rejestracja</h1>
			<h4 class="text-center bg-warning" ><?php display_message(); ?></h4>
        <div class="row">
    <div class="col-md-6 col-sm-12 col-lg-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">Wprowadź swoje dane tutaj:
			</div>
			<div class="panel-body">
				<form name="myform">
					<div class="form-group">
						<label for="myName">E-mail</label>
						<input id="myName" name="myName" class="form-control" type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="myName">Hasło</label>
						<input id="myName" name="myName" class="form-control" type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
						<h6>Hasło musi się składać przynajmniej z 8 znaków oraz zawierać małe i duże litery, cyfry i znaki specjalne</h6>
					</div>
					<div class="form-group">
						<label for="myName">Powtórz hasło</label>
						<input id="myName" name="myName" class="form-control" type="text" data-validation="required">
						<span id="error_name" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="dob">Data urodzin</label>
						<input type="date" name="dob" id="dob" class="form-control">
						<span id="error_dob" class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="gender">Płeć</label>
						<select name="gender" id="gender" class="form-control">
							<option selected>Male</option>
							<option>Female</option>
							<option>Other</option>
							<option>Asexual</option>
							<option>F2M</option>
							<option>Gender neutral</option>
							<option>Hermaphrodite</option>
							<option>Intersex man</option>
							<option>Intersex person</option>
							<option>Intersex woman</option>
							<option>Polygender</option>
							<option>M2F</option>
							<option>Two-spirit person</option>
							<option>Two* person</option>
							<option>Attack Helicopter</option>
							<option>Agender</option>
							<option>Androgyne</option>
							<option>Androgynes</option>
							<option>Androgynous</option>
							<option>Bigender</option>
							<option>Cis Female</option>
							<option>Cis Male</option>
							<option>Cis Woman</option>
							<option>Cis Man</option>
							<option>Pangender</option>	
						</select>
						<span id="error_gender" class="text-danger"></span>
					</div>
					<button id="submit" type="submit" value="submit" class="btn btn-primary center">Wyślij</button>
				</form>

			</div>
		</div>
	</div>
</div>


    </header>


        </div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
