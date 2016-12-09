<?php

require_once('lib/DBClass.php');
require_once('lib/m_siswa.php');
require_once('lib/Age.php');

$siswa = new Siswa();
$data = $siswa->readAllSiswa();
$tanggal='';
$hitungAge = new Age($tanggal);

/*
print '<pre>';
print_r ($data);
print '</pre>';
*/
?>

<table border="1">
	<tr>
		<th>NO</th>
		<th>NIK</th>
		<th>FULL NAME</th>
		<th>EMAIL</th>
		<th>DATE OF BIRTH</th>
		<th>AGE</th>
		<th>NATIONALITY</th>
		<th colspan="3">"--O--"</th>
	</tr>
	<?php
	$n = 1;
	foreach($data as $a):?>
	<tr>
		<td><?php echo $n ?></td>
		<td><?php echo $a['nis']?></td>
		<td><?php echo $a['full_name']?></td>
		<td><?php echo $a['email']?></td>
		<td><?php if(!empty($a['date_ob'])){
			echo $a['date_ob'];
			}else{echo '0000-00-00'; }?></td>
		<td><?php
				$tanggal = $a['date_ob'];
				if(!empty($tanggal)){
				$exec = $hitungAge->age($tanggal);
				echo $exec->y."tahun ".$exec->m." bulan ".$exec->d."hari";
				}else{echo '<p style="color:red">Data Lahir Tidak Valid</p>';}
			?>
		</td>
		<td><?php echo $a['nationality']?></td>
		<td><a href="dsiswa.php?a=<?php echo $a['id_siswa']?>">Detail</a></td>
		<td><a href="usiswa.php?a=<?php echo $a['id_siswa']?>">Edit</a></td>
		<td><a href="delsiswa.php?a=<?php echo $a['id_siswa']?>">Delete</a></td>
	</tr>
	<?php
	$n++;
	endforeach?>
	</table>