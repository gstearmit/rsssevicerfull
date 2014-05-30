<?php


//var_dump($feed);
//die;
try {
	$feed = implode(file('http://www.wattpad.com/rss'));
} catch (Exception $e) 
{
	$e->getMessage();
	exit;
}
   print_r($feed);
   
	$xml = simplexml_load_string($feed);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);

