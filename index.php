<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk ORDER BY product_id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Tambahkan Produk</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Nama Produk</th> <th>Keterangan</th> <th>Harga</th> <th>Jumlah</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nama_produk']."</td>";
        echo "<td>".$user_data['keterangan']."</td>";
        echo "<td>".$user_data['harga']."</td>"; 
        echo "<td>".$user_data['jumlah']."</td>";    
        echo "<td><a href='edit.php?product_id=$user_data[product_id]'>Edit</a> | <a href='delete.php?product_id=$user_data[product_id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>