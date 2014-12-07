<?php 

class APIDAO extends BaseDAO{


	public function getAPIKey($name){	

		$sql = "SELECT APIKey FROM API WHERE Name = '$name'";

		$result = parent::execute($sql);

		while($row = mysql_fetch_array($result)){

			$key = $row['APIKey'];

		  }

		return $key;	

	}


}

?>
