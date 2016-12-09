<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/m_nationality.php');

$id = $_GET['a'];

if(!is_numeric($id)){
	exit('Access Forbiden');
}
$siswa = new Siswa();
$data = $siswa->readSiswa($id);

$nation = new nationality();
$data_nation = $nation->readallnationality();

if(empty($data)){
	echo "Data Not Found";
}

$dt = $data[0];
?> 
<h1> Edit Data Siswa </h1>
<form action="editsiswa.php" method="POST">
	NIK:<br>
	<input type="text" value="<?php echo $dt ['id_siswa']?>" name="in_nis" readonly="true"><br>
	Full Name:<br>
	<input type="text" value="<?php echo $dt ['full_name']?>" name="in_name"><br>
	Email:<br>
	<input type="text" value="<?php echo $dt ['email']?>" name="in_email"><br>
	Nationality:<br>
	<select name="in_nation">
		<option value=""> --Choose Nationality-- </option>
		<?php foreach ($data_nation as $n): ?>
		<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":""?>
		<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach ?>
	</select><br><br>
	<input type="submit" name="kirim" value="Save">
</form>

