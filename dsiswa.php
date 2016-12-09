<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['a'];
if(!is_numeric($id)){
	exit('Access Denied!');
}

$siswa = new Siswa();
$data = $siswa->readSiswa($id);

if(empty($data)){
	exit('Not Found!');
}

$dt = $data[0];
/*
print '<pre>';
print_r($dt);
print '</pre>';
*/
?>

<table border="1">
	<tr>
		<td>ID Siswa</td>
		<td><?php echo $dt['id_siswa']?></td>
	</tr>
	<tr>
		<td>Full Name</td>
		<td><?php echo $dt['full_name']?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $dt['email']?></td>
	</tr>
	<tr>
		<td>Nationality</td>
		<td><?php echo $dt['nationality']?></td>
	</tr>
</table>
<br />
<a href="siswa.php">Back</a>
