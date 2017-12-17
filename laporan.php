<?php 
	include("koneksi.php");
	// Bikin yang laporan dulu ya,, yang ditambahin Motion Detectedok
?>

<table border="1" style="text-align: center;">
	<tr>
		<td>No</td>
		<td>Waktu Kejadian</td>
		<td>Jarak Ke Benda</td>
		<td>Sensor Pir</td>
	</tr>
	<?php 
		$no =1;
		$sql = mysql_query("SELECT * FROM tb_alert");
		while($data = mysql_fetch_array($sql)){
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data[1]; ?></td>
		<td><?php echo $data[2]; ?></td>
		<td><?php echo $data[3]; ?></td>
<!-- udah bert -->
		
	</tr>
	<?php $no++; } ?>

</table>

<button type="button" id="body" class="btn btn-primary" style="">Show</button>


<script type="text/javascript">
$('body').popscroll({ 
 channel:'https://www.facebook.com/envato',
 msg:'Your custom text',
 position:'sr',
});
</script>