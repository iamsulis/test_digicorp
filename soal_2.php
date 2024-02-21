<?php

class Nilai {
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai) {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

class Siswa {
    public $nrp;
    public $nama;
    public $daftarNilai = [];

    public function __construct($nrp, $nama) {
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    public function tambahNilai($mapel, $nilai) {
        $this->daftarNilai[] = new Nilai($mapel, $nilai);
    }
}

// Fungsi untuk generate nama acak
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Membuat siswa baru
$siswaBaru = new Siswa("NRP001", "Siswa Baru");
$siswaBaru->tambahNilai("Inggris", 100);

// Generate 10 siswa dengan nilai acak
$daftarSiswa = [];
for ($i = 0; $i < 10; $i++) {
    $namaSiswa = generateRandomString(10);
    $mapel = ["Inggris", "Indonesia", "Jepang"][rand(0, 2)];
    $nilai = rand(0, 100);

    $siswa = new Siswa("NRP" . str_pad($i + 2, 3, "0", STR_PAD_LEFT), $namaSiswa);
    $siswa->tambahNilai($mapel, $nilai);
    $daftarSiswa[] = $siswa;
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

		<title>Soal No. 2</title>
	</head>
	<body>
		<div class="p-5">
			<div>
				<label>Siswa Baru</label>
				<table class="table">
					<thead>
						<th>NRP</th>
						<th>Nama</th>
						<th>Daftar Nilai (Mapel)</th>
						<th>Daftar Nilai (Nilai)</th>
					</thead>
					<tbody>
						<td><?= $siswaBaru->nrp ?></td>
						<td><?= $siswaBaru->nama ?></td>
						<?php foreach ($siswaBaru->daftarNilai as $nilai) { ?>
							<td><?= $nilai->mapel ?></td>
							<td><?= $nilai->nilai ?></td>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div class="pt-5">
				<label>Daftar 10 Siswa</label>
				<table class="table">
					<thead>
						<th>NRP</th>
						<th>Nama</th>
						<th>Daftar Nilai (Mapel)</th>
						<th>Daftar Nilai (Nilai)</th>
					</thead>
					<tbody>
						<?php foreach ($daftarSiswa as $siswa) { ?>
						<tr>
							<td><?= $siswa->nrp ?></td>
							<td><?= $siswa->nama ?></td>
							<?php foreach ($siswa->daftarNilai as $nilai) { ?>
								<td><?= $nilai->mapel ?></td>
								<td><?= $nilai->nilai ?></td>
							<?php } ?>
						</tr>
						<?php } ?>
					</tbody>
				</table>
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
