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

	<title>Daftar Identifier</title>

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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Identifier</a>
                </div>
				<a class="navbar-brand" href="tambah-idn.php"><i class="pe-7s-plus"></i></a>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Daftar Identifier</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>No</th>
                                    	<th>Nama</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php
										
										$sql = mysqli_query($koneksi, "SELECT idnID,webID FROM identifier ORDER BY idnID ASC") or die(mysqli_error($koneksi));
										//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
										if(mysqli_num_rows($sql) > 0){
											//membuat variabel $no untuk menyimpan nomor urut
											$no = 1;
											//melakukan perulangan while dengan dari dari query $sql
											
											while($data = mysqli_fetch_assoc($sql)){
												$wid = $data['webID'];
												$nama = mysqli_query($koneksi, "SELECT Nama FROM website where webID = $wid") or die(mysqli_error($koneksi));
												$name = mysqli_fetch_assoc($nama);
												echo '
													<tr>
														<td>'.$no.'</td>
														<td>'.$name['Nama'].'</td>
														<td>
															<a href="edit-idn.php?id='.$data['idnID'].'" class="badge">Edit</a>
															<a href="hapus.php?idx='.$data['idnID'].'" class="badge">Delete</a>
														</td>
													</tr>
												';
												$no++;
											}
										}else{
											echo '
											<tr>
												<td colspan="6">Tidak ada data.</td>
											</tr>
											';
										}
									?>
                                    </tbody>
                                </table>
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