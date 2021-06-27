<!-- // this class is used to estabilish connection with MYSQL
//@author Saravanan  
concept solution
-->

<?php
class DBConnection{
	
    public static $servername = "localhost";
	public static $username = "root";
	public static $password = "root";
	public static $dbase = "KeltronDB";

	static function  getConnect(){
		$connection = new mysqli(self::$servername, self::$username, self::$password,self::$dbase );
		return $connection;
	}

	static function execNonQery($sql){
		try{
			$result = -1;
			$conn = self::getConnect();
			if ($conn->connect_error) {
	  				$result =  -2;
				}
			else{

					if($conn->query($sql) === TRUE ){
						$result = $conn->affected_rows ;
						$conn->close();
					}

				}	
		}
		catch(Exception $e) {
			// implement the exception log details
  			$result = -3;
		}
	
		return $result;
	}

	static function execQery($sql){
		try{
			$result = null;
			$conn = self::getConnect();
			if ($conn->connect_error) {
	  				$result = null;
				}
			else{
					$result = $conn->query($sql);
					$conn->close();
				}	
		}
		catch(Exception $e) {
  			$result = null;
		}
	
		return $result;
	}
	
}

?>