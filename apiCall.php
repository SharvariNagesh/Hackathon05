<?php
$response = file_get_contents('http://api.smmry.com/SM_API_KEY=F0381A7FDA&SM_URL=http://www.news.com.au/finance/work/leaders/hillary-clinton-vs-donald-trump-presidential-debates-crucial-for-clinton-to-retain-poll-lead/news-story/74e81dbba949c593788ebeb2f54b7f40/');
$response = json_decode($response, true);
print $response['sm_api_content'];
//var_dump($response);

?>
