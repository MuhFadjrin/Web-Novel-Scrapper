<?php 
include_once 'library/HtmlWeb.php';
require_once 'library/linklist.php';
use simplehtmldom\HtmlWeb;
include 'config.php';
$doc = new HtmlWeb();

if(isset($_POST['submit'])){
	$id = $_POST['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM identifier WHERE webID='$id'") or die(mysqli_error($koneksi));
	$data = mysqli_fetch_assoc($sql);
	echo '<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script><script src="assets/js/jspdf.min.js"></script>
		<script>
		function HTML() {
		var doc = new jsPDF();
		var specialElementHandlers = {
			"#editor": function (element, renderer) {
				return true;
			}
		};
		doc.fromHTML($("#content").html(), 15, 15, {
				"width": 170,
					"elementHandlers": specialElementHandlers
		});
			doc.save("sample-file.pdf");
	};

		</script>';
	if(isset($_POST['url'])){
		$url = $_POST['url'];
		$banyak = $_POST['banyak'];
		echo '<div id="content">';
		for($i=0;$i<$banyak;$i++){
			$html = $doc->load($url);
			$title = $html->find($data['judul'],0)->plaintext;
			echo '<h1>' . $title . '</h1><br>';
			foreach($html->find($data['content']) as $text ){
				echo ' <p> '. $text->plaintext .' </p> ';
			}
			$url = $html->find($data['nextPage'],0)->href;
				
			$html->clear();
			unset($html);
		}
		echo '</div><div id="editor"></div>
<a href="javascript:HTML()" class="button">Download</a>';
		
	}else if(isset($_POST['url2'])){
		$list = $_POST['url2'];
		$array = explode(",",$list);
		$theList = new linklist();
		
		for($i = 0; $i<count($array);$i++){
			$theList->insertLast($array[$i]);
		}
		//$tlist = $theList->readList();
		//print_r($tlist);
		echo '<div id="content">';
		for($i=0;$i<count($array);$i++){
			$url = $theList->getHead();
			$html = $doc->load($url);
			$title = $html->find($data['judul'],0)->plaintext;
			echo '<h1>' . $title . '</h1><br>';
			foreach($html->find($data['content']) as $text ){
				echo ' <p> '. $text->plaintext .' </p> ';
			}
			$theList->deleteFirstNode();
			//$tlist = $theList->readList();
			//print_r($tlist);
			$html->clear();
			unset($html);
		}
		echo '</div><div id="editor"></div>
<a href="javascript:HTML()" class="button">Download</a>';
	}
}
?>