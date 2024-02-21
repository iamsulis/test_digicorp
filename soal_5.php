<?php 
	
	function cari_banyak_huruf($kata){
		$array_kata = str_split($kata);
		$jumlah_kata = [];
		$total_huruf_sebelumnya = 0;

		foreach ($array_kata as $key => $value) {
			if(!isset($jumlah_kata[$value])){
				$jumlah_kata[$value] = 1;
			} else {
				$jumlah_kata[$value] = $jumlah_kata[$value] + 1;
			}

			if($jumlah_kata[$value] > $total_huruf_sebelumnya){
				$huruf_terbanyak = array(
					'huruf' => $value,
					'jumlah' => $jumlah_kata[$value]
				); 
			}

			$total_huruf_sebelumnya = (@$jumlah_kata[$value]+0);
		}

		$data = array(
			'huruf_terbanyak' => $huruf_terbanyak,
			'jumlah_kata' => $jumlah_kata,
		);

		return $data;
	}

	if(isset($_POST['submit'])){
		$kata = $_POST['kata'];

		$jumlah_kata = cari_banyak_huruf($kata);

		$huruf_terbanyak = $jumlah_kata['huruf_terbanyak'];
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

		<title>Soal No. 5</title>
	</head>
	<body>
		<div class="p-5">
			<form method="POST">
				<div class="form-group">
					<label>Masukkan Kata</label>
					<input type="text" class="form-control" name="kata" placeholder="Masukkan Kata" required>
				</div>

				<div>
					<button type="submit" name="submit" class="btn btn-success">Submit</button>
				</div>
			</form>

			<?php if(isset($_POST['submit'])){ ?>
				<div class="">
					<label>Kata yang dimasukkan adalah : <?= @$kata ?></label>
					<br>
					<label>Huruf Terbanyak adalah : <?= @$huruf_terbanyak['huruf'] ?> dengan total <?= $huruf_terbanyak['jumlah'] ?></label>
				</div>
			<?php } ?>
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
