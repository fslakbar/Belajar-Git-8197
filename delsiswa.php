<?php

//https://github.com/fslakbar/final-project-pwl2016/invitations

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');

$id = $_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbiden');
}
$siswa = new Siswa();
$data = $siswa->deleteSiswa($id);

if(empty($data)){
	echo "Deleted";
}

?>
<br />
<a href="siswa.php">Back</a>
