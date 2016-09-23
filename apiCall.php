<?php
$response = file_get_contents('http://api.smmry.com/SM_API_KEY=06FB4C7AA8&SM_URL=http://www.summarizetool.com/');
$response = json_decode($response, true);
print $response['sm_api_content'];
//var_dump($response);
return;

$long_article = file_get_contents('http://www.summarizetool.com/');
//echo $long_article;
$ch = curl_init("http://api.smmry.com/&SM_API_KEY=06FB4C7AA8&SM_LENGTH=14&SM_WITH_BREAK");
// IMPORTANT!
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
// IMPORTANT! Without ^this^ any article over 1000 characters will make SMMRY throw a 417 http error
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, "sm_api_input=".$long_article);// Your variable is sent as POST
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$return = json_decode(curl_exec($ch), true);//You're summary is now stored in $return['sm_api_content'].
curl_close($ch);

echo $return['sm_api_content'];
?>
