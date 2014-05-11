<?php
foreach ($data as $temp_item) {
	# code...
	$this->Html->charset();
	echo "Title: ".$temp_item['title']."<br/>";
	echo "Link: ".$temp_item['link']."<br/>";
}

?>