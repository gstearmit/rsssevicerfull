<?php
$feed = new DOMDocument();
$feed->load('http://www.wattpad.com/rss?mode=2&language=19');
$json = array();
$json['title'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
$json['description'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('description')->item(0)->firstChild->nodeValue;
$json['link'] = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('link')->item(0)->firstChild->nodeValue;

$namecatalogue = '';


$items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

$json['item'] = array();
$i = 0;

foreach($items as $key => $item) {
	$title =       $item->getElementsByTagName('title')->item(0)->firstChild->nodeValue;
	$description = trim($item->getElementsByTagName('description')->item(0)->firstChild->nodeValue);
	$link =        $item->getElementsByTagName('link')->item(0)->firstChild->nodeValue;


	$json['item'][$key]['title'] = $title;
	$json['item'][$key]['description'] = $description;
	$json['item'][$key]['link'] = $link;

}

echo json_encode($json);

