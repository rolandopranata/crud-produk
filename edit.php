<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$product_id = $_POST['product_id'];
	
	$nama_produk=$_POST['nama_produk'];
	$keterangan=$_POST['keterangan'];
	$harga=$_POST['harga'];
    $jumlah=$_POST['jumlah'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE produk SET nama_produk='$nama_produk',keterangan='$keterangan',harga='$harga',jumlah='$jumlah' WHERE product_id=$product_id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$product_id = $_GET['product_id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE product_id=$product_id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama_produk = $user_data['nama_produk'];
	$keterangan = $user_data['keterangan'];
	$harga = $user_data['harga'];
    $jumlah = $user_data['jumlah'];
}
?>
<html>
<head>	
	<title>Edit Produk</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama Produk</td>
				<td><input type="text" name="nama_produk" value=<?php echo $nama_produk;?>></td>
			</tr>
			<tr> 
				<td>Keterangan</td>
				<td><input type="text" name="keterangan" value=<?php echo $keterangan;?>></td>
			</tr>
			<tr> 
				<td>Harga</td>
				<td><input type="text" name="harga" value=<?php echo $harga;?>></td>
			</tr>
            <tr> 
				<td>Jumlah</td>
				<td><input type="text" name="jumlah" value=<?php echo $jumlah;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="product_id" value=<?php echo $_GET['product_id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>