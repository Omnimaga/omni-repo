<?php
	echo file_get_contents('templates/header.template');
	$db = scandir('phar://'.getcwd().'/x86-64/omni.db');
	$dir1 = scandir(getcwd().'/i686');
	$dir2 = scandir(getcwd().'/x86-64');
	foreach($db as $file) {
		$desc = file_get_contents('phar://'.getcwd().'/x86-64/omni.db/'.$file.'/desc');
		$desc = substr($desc,strrpos($desc,'%DESC%')+7,strlen($desc)-strrpos($desc,'%DESC%')-(strlen($desc)-strpos($desc,'%CSIZE%'))-7);
		echo "<h2>$file</h2><p><h4>{$desc}</h4> :: Downloads<br/>";
		echo " => <a href='i686/$file-i686.pkg.tar.xz'>i686</a><br/>";
		echo " => <a href='x86-64/$file-x86-64.pkg.tar.xz'>x86-64</a><br/>";
		echo "</p>";
	}
	echo file_get_contents('templates/footer.template');
?>