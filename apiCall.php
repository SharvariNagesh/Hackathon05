<?php

$title = $_GET["title"];
$url = $_GET["url"];
$type = $_GET["type"];

// $title = "Tips On How When And Where To Propose In: Spring";
// $url = "http://www.gq.com.au/lifestyle/the+gq+engagement+guide/tips+on+how+when+and+where+to+propose+in+spring,45233#/%5EeyJocmVmIjoiaHR0cDovL3d3dy5uZXdzLmNvbS5hdS8iLCJhZFVuaXQiOnsic2VydmVyIjoiZGZwLWdwdCIsImVsZW1lbnRJRCI6ImFkLWJsb2NrLTgwNjkwMTgyNzUtMiJ9LCJwcm9wZXJ0eUlkIjoiTkEtTkNBLTExMjM3MzU0IiwibGFiZWwiOiJOQ0EgRGVza3RvcCAtIEhvbWUiLCJzZWxlY3RvciI6Ii50b3Atc3RvcnktZmVlZCAuc3RvcnktYmxvY2s6ZXEoMikiLCJjcmVhdGl2ZSI6ImJjNWY0MDYxMzBlZDQ1OGVhYzQ2ODEwYzJkZjIyYzc5IiwiZXhwZXJpZW5jZVR5cGUiOiJpbmJvdW5kIiwiZXhwZXJpbWVudCI6eyJjcmVhdGl2ZSI6eyJleHBlcmltZW50SWQiOiJkODIzMmVlYjIyMjg0YjAxOTBjMmIyMDJhY2ViOTQ0OSIsIm1vZGVsSWQiOiJjNzI5YzRmYmY5OTY0ZWI5OWYwNjdmYzYxNDQxMjQ2YyJ9fX0=";
// $type = "other";

function getResponseForQuestion() {

}

function getResponseForDefault($response) {
	$sentences = explode ('.', $response);
	if (count($sentences) >= 2) {
		return $sentences[0] . '.' . $sentences[1] . '.';
	} elseif (count($sentences) >= 1) {
		return $sentences[0] . '.';
	}

	return $response;
}

$response = file_get_contents('http://api.smmry.com/SM_API_KEY=F0381A7FDA&&SM_URL=' . $url);
$summaryResponse = json_decode($response, true);

$result = '';
// create result base on type of the request
if ($type == 'questions') {

}
elseif ($type == 'listicles') {

}
elseif ($type == 'misleading') {

}
else { // default
	echo getResponseForDefault($summaryResponse["sm_api_content"]);
}

?>
