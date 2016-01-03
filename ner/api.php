<?php 
header('Access-Control-Allow-Origin: *');
header('content-type: application/json; charset=utf-8');

//require_once('nerprocess.php');
//$query = "The Inspector General of Kashmir said though the number of local recruitments was not alarming, it has seen a rise this year. Compared to last year where 64 local recruitments took place, this year it increased to 72. India accuses Pakistan of training and arming militants, and infiltrating them across the de facto border, called the Line of Control, dividing Kashmir. Pakistan denies those allegations.";

$query = $_GET["q"];

if($query)
{
  
	$shmid = shmop_open(1234567890,'c',0666,90000000);
	$size = shmop_size($shmid);
	$allChar = shmop_read($shmid,0,$size);

	$result = nerTagger($query);
	$entity = pregMatch($result);
    
    $key = array_keys($entity);
	$finalEntity = array();
	$add = "\n";
	for($i = 0; $i < count($key); $i++)
	{
		$nowKey = $key[$i];
		for($j = 0; $j < count($entity[$nowKey]); $j++)
		{	
			$nowchar = $entity[$nowKey][$j].$add;
			if(strpos($allChar,$nowchar) !== false)
			{		
				if(!array_key_exists($entity[$nowKey][$j], $finalEntity))
				{	
					$finalEntity[$entity[$nowKey][$j]] = $entity[$nowKey][$j];
				}
			} 
		}
	}
    
    echo $_GET['callback'] . "(" . json_encode($finalEntity) .  ")";
}
else
{
	echo "need param: q!";

}


function nerTagger($text)
{
	
	$text = urlencode($text);
	$data = array(
		"classifier=english.muc.7class.distsim.crf.ser.gz",
		"outputFormat=inlineXML",
		"preserveSpacing=yes",
		"input=$text",
	);
	
	$data = implode('&',$data);
	$url='http://nlp.stanford.edu:8080/ner/process';  
  
	$ch = curl_init();  
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_URL,$url);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
	ob_start();  
	curl_exec($ch);  
	$result = ob_get_contents() ;  
	ob_end_clean();  
	//echo $result;
	return $result;  
}

function pregMatch($result)
{
			
    preg_match_all("/\&lt;LOCATION\&gt;(.*?)\&lt;\/LOCATION/", $result, $location, PREG_PATTERN_ORDER);
    preg_match_all("/\&lt;ORGANIZATION\&gt;(.*?)\&lt;\/ORGANIZATION/", $result, $organization, PREG_PATTERN_ORDER);
    preg_match_all("/\&lt;PERSON\&gt;(.*?)\&lt;\/PERSON/", $result, $person, PREG_PATTERN_ORDER);
   
    if($location[1]) $entity["location"] = $location[1];
    if($organization[1]) $entity["organization"] = $organization[1];
    if($person[1]) $entity["person"] = $person[1];
        
	return $entity;
}

	
?> 
    
		
						
		
	


