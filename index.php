<?php 
$conn = mysqli_connect("localhost","root","","php-api");
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$box = [];
		while ($data = mysqli_fetch_assoc($result)) {
			$box[] = $data;
		}
		return $box;
	}
$students = query("SELECT * FROM users");	
?>


<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1><a href="create.php">Tambah Data</a></h1>
		<table border="1px" cellpadding="10" cellspacing="0">
	 		<tr>
	 			<td bgcolor="#D6D8DC" align="center">Id</td>
	 			<td bgcolor="#D6D8DC" align="center">Username</td>
	 			<td bgcolor="#D6D8DC" align="center">Level</td>
	 			<td bgcolor="#D6D8DC" align="center">Fullname</td>
	 			<td bgcolor="#D6D8DC" align="center">Action</td>
	 		</tr>
	 		<?php foreach($students as $student) : ?>
				 <tr>
				 	<td><?= $student["id"] ?></td>
				 	<td><?= $student["username"] ?></td>
				 	<td><?= $student["level"] ?></td>
				 	<td><?= $student["fullname"] ?></td>
				 	<td><a href="update.php">Ubah</a> | <a href="delete.php">Hapus</a></td>
				 </tr>
				<?php endforeach; ?>
	 	</table>
 	</body>
</html>