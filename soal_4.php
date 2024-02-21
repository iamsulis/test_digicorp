<?php 
	
	$nilai_random = [];

	for ($i=0; $i < 5; $i++) { 
		$nilai_random[] = rand(1, 100);	
	}

	function nilai_terbesar_ke_2(){
		global $nilai_random;

		$nilai_order = $nilai_random;
		
		rsort($nilai_order);

		return $nilai_order;
	}

	if(isset($_POST['generate'])){

		$no_terbesar_ke_2 = nilai_terbesar_ke_2();

		$no_terbesar_ke_2 = $no_terbesar_ke_2[1];
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

		<title>Soal No. 4</title>
	</head>
	<body>
		<div class="p-5">
			<form method="POST">
				<button type="submit" name="generate" class="btn btn-success">Generate Nomor</button>
			</form>

			<div class="pt-4">
				<?php if(isset($_POST['generate'])){ ?>
					<?php $no=1; foreach ($nilai_random as $key => $value) { ?>
						<div>
							<label><?= $no++ ?>. <?= $value ?></label>
						</div>
					<?php } ?>

					<?php if(isset($no_terbesar_ke_2)){ ?>
						<div class="pt-4">
							No Terbesar Ke 2 adalah : <?= $no_terbesar_ke_2 ?>
						</div>
					<?php } ?>
				<?php } ?>
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
