<?php
//$homepage = file_get_contents('http://www.wattpad.com/39075344-violence-and-vince');
//echo $homepage;



$dir = dirname(dirname(__FILE__));


require_once $dir."/democrawler/simple_html_dom.php";
$link = "http://www.wattpad.com/39075344-violence-and-vince";
$html = file_get_html($link);
// echo file_get_html('http://www.wattpad.com/39075344-violence-and-vince')->plaintext;
// die;
//var_dump($html);//die;

$item=array();



// Find all article blocks
foreach($html->find('.column_left') as $article) {
	$item['textbody']     = $article->find('div.textbody')->plaintext;
	//$articles[] = $item;
}

print_r($item);
?>
