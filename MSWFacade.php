<?php

class MSWFacade {

	private function getMSWReportLocation($spotId){

		$name = 'Magicseaweed';

		require_once('BaseDAO.php');

		require('APIDAO.php');

		$APIDAO = new APIDAO();		

		$key = $APIDAO->getAPIKey($name);	

		return 'http://magicseaweed.com/api/'.$key.'/forecast/?spot_id='.$spotId;		

		}

	

	public function getMSWReportAsAssocArray($spotId){

		$url = $this->getMSWReportLocation($spotId);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$x = curl_exec($ch);

		$response = json_decode($x, true);

		curl_close($ch);  

		return $response; 

		}
	

}





?>
