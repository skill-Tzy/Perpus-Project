<?php
 // memanggil file koneksi.php untuk membuat koneksi
 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/perpus/koneksi.php";
   include_once($path);
 // mengecek apakah di url ada nilai GET id
 if (isset($_GET['id'])) {
 // ambil nilai id dari url dan disimpan dalam variabel $id
 $id_buku = ($_GET["id"]);
 // menampilkan data dari database yang mempunyai id=$id
 $query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
 $result = mysqli_query($koneksi, $query);
 // jika data gagal diambil maka akan tampil error berikut
 if(!$result){
 die ("Query Error: ".mysqli_errno($koneksi).
 " - ".mysqli_error($koneksi));
 }
 // mengambil data dari database
 $data = mysqli_fetch_assoc($result);
 // apabila data tidak ada pada database maka akan dijalankan perintah ini
 if (!count($data)) {
 echo "<script>alert('Data tidak ditemukan pada database');
 window.location='buku.php';
 </script>";
}
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id buku.');
    window.location='buku.php';
    </script>";
    }
    ?>
   <!DOCTYPE html>
   <html>
    <head>
    <title>Perpustakaan</title>
    <style type="text/css">
    * {
    font-family: "Trebuchet MS";
    }
    h1 {
    text-transform: uppercase;
    color: salmon;
    }
    button {
    background-color: salmon;
    color: #fff;
    padding: 10px;
    text-decoration: none;
    font-size: 12px;
    border: 0px;
    margin-top: 20px;
    }
    label {
    margin-top: 10px;
    float: left;
    text-align: left;
    width: 100%;
    }
    input {
    padding: 6px;
    width: 100%;
    box-sizing: border-box;
    background: #f8f8f8;
    border: 2px solid #ccc;
    outline-color: salmon;
    }
    div {
    width: 100%;
    height: auto;
    }
    .base {
    width: 400px;
    height: auto;
    padding: 20px;
    margin-left: auto;
    margin-right: auto;
 background: #ededed;
 }
 </style>
 </head>
 <body>
 <center>
 <h1>Edit Buku <?php echo $data['judul']; ?></h1>
 <center>
 <form method="POST" action="proses_edit_buku.php" enctype="multipart/form-data"
>
 <section class="base">
 <!-- menampung nilai id produk yang akan di edit -->
 <input name="id" value="<?php echo $data['id_buku']; ?>" hidden />
 <div>
 <label>ISBN</label>
 <input type="text" name="isbn" value="<?php echo $data['isbn']; ?>"
autofocus="" required="" />
 </div>
 <div>
 <label>Judul</label>
 <input type="text" name="judul" value="<?php echo $data['judul']; ?>"
autofocus="" required="" />
 </div>
 <div>
 <label>ID Pengarang</label>
 <input type="text" name="id_pengarang" value="<?php echo
$data['id_pengarang']; ?>" />
 </div>
 <div>
 <label>ID Penerbit</label>
 <input type="text" name="id_penerbit" required=""value="<?php echo
$data['id_penerbit']; ?>" />
 </div>
 <div>
 <label>Stock</label>
 <input type="text" name="stock" required="" value="<?php echo $data['stock'];
?>"/>
 </div>

 <div>
 <button type="submit">Simpan Perubahan</button>
 </div>
 </section>
 </form>
 </body>
</html>