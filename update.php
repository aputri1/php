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

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<label>username : </label>
	<input type="text" name="username" placeholder="<?= $students[0]['username'] ?>">
	<br>
	<br>
	<label>level : </label>
	<input type="text" name="level" placeholder="<?= $students[0]['level'] ?>">
	<br>
	<br>
	<label>fullname : </label>
	<input type="text" name="fullname" placeholder="<?= $students[0]['fullname'] ?>">
	<br>
	<br>
	<button name="submit">Submit</button>
</body>
</html>