<?php
define('DB_HOST', 'localhost');
define('DB_BASE_NAME', 'bookingapp');
define('DB_USER', 'booking_api');
define('DB_PASSWORD', 'GVgoAole=y%!');

class DB {
	protected $host   = DB_HOST;
	protected $dbname = DB_BASE_NAME; 
	protected $dbuser = DB_USER;
	protected $dbpass = DB_PASSWORD;

	private $db;
    private $error;
	public	$stmt;

	public function __construct() {
		$conStr = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
		);
		try {
			$this->db = new PDO($conStr, $this->dbuser, $this->dbpass, $options);
		}
		catch(PDOException $e) {
			$this->error = $e->getMessage();
		}
	}

	public function prepare($query) {
		$this->stmt = $this->db->prepare($query);
	}

	public function bind($param,$value,$type = null) {
		if (is_null($type)) {
		    switch (true) {
		        case is_int($value):
		            $type = PDO::PARAM_INT;
		            break;
		        case is_bool($value):
		            $type = PDO::PARAM_BOOL;
		            break;
		        case is_null($value):
		            $type = PDO::PARAM_NULL;
		            break;
		        default:
		            $type = PDO::PARAM_STR;
		    }
		}
		$this->stmt->bindValue($param,$value,$type);
	}

	public function execute($params=null) {
	    if (is_null($params)) {
	       return $this->stmt->execute();
	    }
        else {
            return $this->stmt->execute($params);
        }
	}

	public function countRow() {
		return $this->stmt->rowCount();
	}
    
    public function fetch($param=null) {
        if ($param === null) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);    
        }else {
            return $this->stmt->fetchAll($param);        
        }
        
    }
}
?>