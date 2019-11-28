<?php
//memasukkan file config.php
include('config.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Edit Identifier</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="assets/img/sidebar-4.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper collapse navbar-collapse">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Novel Web Scrapper
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="identifier.php">
                        <i class="pe-7s-user"></i>
                        <p>Identifier</p>
                    </a>
                </li>
                <li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Dashboard</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Identifier</h4>
                            </div>
                            <div class="content">
							<?php
									//jika sudah mendapatkan parameter GET id dari URL
									if(isset($_GET['id'])){
										//membuat variabel $id untuk menyimpan id dari GET id di URL
										$id = $_GET['id'];
										
										//query ke database SELECT tabel mahasiswa berdasarkan id = $id
										$select = mysqli_query($koneksi, "SELECT * FROM identifier WHERE idnID='$id'") or die(mysqli_error($koneksi));
										
										//jika hasil query = 0 maka muncul pesan error
										if(mysqli_num_rows($select) == 0){
											echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
											exit();
										//jika hasil query > 0
										}else{
											//membuat variabel $data dan menyimpan data row dari query
											$data = mysqli_fetch_assoc($select);
											$dataid = $data['webID'];
										}
									}
							?>
									
									<?php
									//jika tombol simpan di tekan/klik
									if(isset($_POST['submit'])){
										$judul	= $_POST['title'];
										$content	= $_POST['content'];
										$next	= $_POST['next'];
										$idn = $_POST['idn'];
										$sql = mysqli_query($koneksi, "UPDATE identifier SET judul='$judul', content='$content', nextPage='$next' WHERE idnID='$idn'") or die(mysqli_error($koneksi));
										
										if($sql){
											echo '<script>alert("Berhasil menyimpan data.");document.location="identifier.php"; </script>';
											print_r($sql);
										}else{
											echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
										}
									}
									?>
                                <form action="edit-idn.php" method="post">
								<div class="form-group row">
										<div class="col-md-12">
											<input type="hidden" name="idn" class="form-control" placeholder="webnovel" value="<?php echo $id; ?>" required>
										</div>
								</div>
								<div class="form-group row">
										<div class="col-md-12">
											<label>Website</label>
												<?php 
													$cek1 = mysqli_query($koneksi, "SELECT * FROM website where webID = '$dataid'") or die(mysqli_error($koneksi));
													$dat1 = mysqli_fetch_assoc($cek1);
													echo '<select name="web" class="form-control" readonly><option value="'.$dat1["webID"].'">'.$dat1['Nama'].'</option></select>';
												?>
										</div>
									</div>
                                    <div class="form-group row">
										<div class="col-md-12">
											<label>Title</label>
											<input type="text" name="title" class="form-control" value="<?php echo $data['judul']; ?>" placeholder="h1.title" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-12">
											<label>Content</label>
											<input type="text" name="content" class="form-control" value="<?php echo $data['content']; ?>" placeholder="div.entry-content p" required>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-12">
											<label>Link Next</label>
											<input type="text" name="next" class="form-control" value="<?php echo $data['nextPage']; ?>" placeholder="li.next-page a">
										</div>
									</div>
                                     <div class="form-group row">
										<div class="col-md-12">
											<label>&nbsp;</label>
											<input type="submit" name="submit" class="btn btn-info btn-fill pull-right" value="SIMPAN">
										</div>
									</div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2019 <a href="http://www.creative-tim.com">Novel Web Scrapper</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>