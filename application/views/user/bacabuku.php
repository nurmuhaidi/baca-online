<!DOCTYPE html>
<html>
<head>
	<title>Baca</title>
</head>
<body>
	<?php 
		foreach ($daftar_buku as $buku) {
			header("content-type: application/pdf");
			readfile(base_url('data/dokumen/').$buku->file);
		}
	?>
</body>
</html>