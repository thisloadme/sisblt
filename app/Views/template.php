<?php 
	if($header != ''){
		echo view($header);
	}
	if($konten != ''){
		echo view($konten);
	}
	if($footer != ''){
		echo view($footer);
	}
?>