<?php 

	session_start();

	if(!isset($_SESSION['array_user'])){
		$_SESSION['array_user'] = [];
	}

	function generate_token($nama_user){
		$token = bin2hex(random_bytes(16));

		if(isset($_SESSION['array_user'][$nama_user])){
			if(sizeof($_SESSION['array_user'][$nama_user]) >= 10){
				array_shift($_SESSION['array_user'][$nama_user]);
			}
		}

		$_SESSION['array_user'][$nama_user][] = $token;

		return $_SESSION['array_user'][$nama_user];
	}

	function verifikasi_token($nama_user, $token){

		$token_found = False;

		if(in_array($token, $_SESSION['array_user'][$nama_user])){
			$token_found = True;

			foreach ($_SESSION['array_user'][$nama_user] as $key => $value) {
				if($token == $value){
					unset($_SESSION['array_user'][$nama_user][$key]);
					break;
				}
			}
		}

		return $token_found;
	}

	if(isset($_POST['generate'])){
		$aksi = 0;

		$name_generate = $_POST['name_generate'];

		$token_list = generate_token($name_generate);
	}

	if(isset($_POST['validate'])){
		$aksi = 1;

		$name_validate = $_POST['name_validate'];
		$token_validate = $_POST['token_validate'];

		$token_found = verifikasi_token($name_validate, $token_validate);
	}

?>

<!DOCTYPE html>
<html lang="en">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

		<title>Soal No. 1</title>
	</head>
	<body>
		<div class="p-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link <?= @$aksi == 0 ? 'active' : '' ?>" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Generate Token</button>
				</li>
				
				<li class="nav-item" role="presentation">
					<button class="nav-link <?= @$aksi == 1 ? 'active' : '' ?>" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Verify Token</button>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade <?= @$aksi == 0 ? 'show active' : '' ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="p-4">
						<form method="POST">
							<div class="form-group">
								<label>Masukkan Nama User</label>
								<input type="text" class="form-control" name="name_generate" placeholder="Masukkan Nama User" value="<?= @$name_generate ?>" required>
							</div>

							<div>
								<button type="submit" name="generate" class="btn btn-primary">Generate</button>
							</div>
						</form>

						<?php if(@$aksi == 0){ ?>
							<div class="pt-4">
								<label>List Token User : <?= @$name_generate ?></label>

								<div class="">
									<?php if(isset($token_list)){ ?>
										<?php $no = 1; foreach ($token_list as $key => $value) { ?>
											<div>
												<label><?= $no++ ?>. <?= $value ?></label>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="tab-pane fade <?= @$aksi == 1 ? 'show active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="p-4">
						<form method="POST">
							<div class="form-group">
								<label>Masukkan Nama User</label>
								<input type="text" class="form-control" name="name_validate" placeholder="Masukkan Nama User" value="<?= @$name_validate ?>" required>
							</div>

							<div class="form-group">
								<label>Masukkan Token User</label>
								<input type="text" class="form-control" name="token_validate" placeholder="Masukkan Token User" value="<?= @$token_validate ?>" required>
							</div>

							<div>
								<button type="submit" name="validate" class="btn btn-primary">Validate</button>
							</div>
						</form>

						<?php if(@$aksi == 1){ ?>
							<div class="pt-4">
								<?php if(@$token_found == False){ ?>
									<div class="alert alert-danger" role="alert">
										Token Tidak Ditemukan!
									</div>
								<?php } else { ?>
									<div class="alert alert-success" role="alert">
										Token Ditemukan!
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
