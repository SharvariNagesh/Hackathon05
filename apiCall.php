<?php

$title = $_GET["title"];
$url = $_GET["url"];
$type = $_GET["type"];
$response = file_get_contents('http://api.smmry.com/SM_API_KEY=F0381A7FDA&&SM_URL=' . $url);
$summaryResponse = json_decode($response, true);

$result = '';
// create result base on type of the request
if ($type == 'questions') {
  getAnswer();
}
elseif ($type == 'listicles') {

}
elseif ($type == 'misleading') {

}
else { // default
  $keywords = $summaryResponse['sm_api_keyword_array'];
  echo getResponseForDefault($summaryResponse["sm_api_content"], $summaryResponse['sm_api_keyword_array']);

}


// $title = "Tips On How When And Where To Propose In: Spring";
// $url = "http://www.gq.com.au/lifestyle/the+gq+engagement+guide/tips+on+how+when+and+where+to+propose+in+spring,45233#/%5EeyJocmVmIjoiaHR0cDovL3d3dy5uZXdzLmNvbS5hdS8iLCJhZFVuaXQiOnsic2VydmVyIjoiZGZwLWdwdCIsImVsZW1lbnRJRCI6ImFkLWJsb2NrLTgwNjkwMTgyNzUtMiJ9LCJwcm9wZXJ0eUlkIjoiTkEtTkNBLTExMjM3MzU0IiwibGFiZWwiOiJOQ0EgRGVza3RvcCAtIEhvbWUiLCJzZWxlY3RvciI6Ii50b3Atc3RvcnktZmVlZCAuc3RvcnktYmxvY2s6ZXEoMikiLCJjcmVhdGl2ZSI6ImJjNWY0MDYxMzBlZDQ1OGVhYzQ2ODEwYzJkZjIyYzc5IiwiZXhwZXJpZW5jZVR5cGUiOiJpbmJvdW5kIiwiZXhwZXJpbWVudCI6eyJjcmVhdGl2ZSI6eyJleHBlcmltZW50SWQiOiJkODIzMmVlYjIyMjg0YjAxOTBjMmIyMDJhY2ViOTQ0OSIsIm1vZGVsSWQiOiJjNzI5YzRmYmY5OTY0ZWI5OWYwNjdmYzYxNDQxMjQ2YyJ9fX0=";
// $type = "other";


function getResponseForDefault($response,$keyword ) {
	$sentences = explode ('.', $response);
  $sent_dictionary = get_sentences_ranks($sentences, $keyword);
	if (count($sentences) >= 2) {
		return $sentences[0] . '.' . $sentences[1] . '.';
	} elseif (count($sentences) >= 1) {
		return $sentences[0] . '.';
	}

	return $response;
}

function get_sentences_ranks($sentences, $keywords) {
    // $sentences = $this->split_content_to_sentences($content);
    $n = count( $sentences );
    $values = array();
    $sentences_dic = array();
    for($i = 0;$i < $n;$i++){
      $s1 = $sentences[$i];
      $sentences_dic[ ( $sentences ) ] = $this->sentences_intersection($s1, $keywords);
    }
    // $this->sentences_dic = $sentences_dic;
    return $sentences_dic;
  }

  function sentences_intersection($sent1, $sent2) {
    $s1  = explode(" ",$sent1);
    $s2  = explode(" ",$sent2);
    $cs1 = count($s1);
    $cs2 = count($s2);
    if (($cs1 + $cs2) == 0) {
      return 0;
    }
    $i   = count(array_intersect($s1,$s2));
    $avg = $i / (($cs1+$cs2) / 2);
    return $avg;
  }


?>
