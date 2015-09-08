<?php 
session_start();
include 'class/common.php';
$obj    = new common();
$res    = $obj->getMyDevices($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
	width: 50%;
}

table,th,td {
	border: 1px solid black;
	border-collapse: collapse;
}

th,td {
	padding: 5px;
	text-align: left;
}

table#t01 tr:nth-child(even) {
	background-color: #eee;
}

table#t01 tr:nth-child(odd) {
	background-color: #fff;
}

table#t01 th {
	background-color: black;
	color: white;
}
</style>
</head>
<body>
<center>
<?php //if(count($res)){ ?>
<table width="50%">
    <tr>
    <td><a href="add-device.php">Add Device</a></td>
    <td><a href="show-device.php">View Devices Location</a></td>
    </tr>
    <tr><td colspan="2"></td></tr>
</table>
<?php //}?>
<table id="t01">
	<tr>
		<th>S. No</th>
		<th>Device Name</th>
		<th>Imei No</th>
	</tr>
	<?php
	
	if(count($res)){
		$i=0;
		foreach($res as $device){
	       $i++;
	?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $device['device_name']?></td>
		<td><?php echo $device['device_id']?></td>
	</tr>
	<?php }}else{?>
	<tr>
		<td colspan="3">No device found</td>
	</tr>
	<?php }?>
</table>
</center>
</body>
</html>
