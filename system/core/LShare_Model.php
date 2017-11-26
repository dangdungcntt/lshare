<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class LShare_Model
	{
		private $host;
		private $username;
		private $password;
		private $database;
    private $conn;
    
		function __construct()
		{
				$this->host = DB_HOST;
				$this->username = DB_USER;
				$this->password = DB_PASS;
				$this->database = DB_NAME;
        $this->conn = new MySQLi(
          $this->host,
          $this->username,
          $this->password,
          $this->database
        );
        if ($this->conn->connect_errno) {
          die("ERROR : -> ".$this->conn->connect_error);
        }
        mysqli_set_charset($this->conn,"utf8");
        // MYSQL_DEBUG ? mysqli_report(MYSQLI_REPORT_ALL) : '';
    }
    
		public function query($sql) {
      $result = $this->conn->query($sql);
      $arr = [];
      while (($row = $result->fetch_assoc()) != null) {
        array_push($arr, $row);
      }
			return $arr;
    }

    public function prepareQuery($sql, $pattern, $params) {
      // debug($this->conn->prepare($sql));
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param($pattern, ...$params);
      $result = $stmt->execute();
      $result = $stmt->get_result();
      $arr = [];
      while (($row = $result->fetch_assoc()) != null) {
        array_push($arr, $row);
      }
			return $arr;
    }

		public function run($sql)
		{
			return $this->conn->query($sql);
    }
    
		function __destruct(){
			if($this->conn)
				$this->conn->close();
		}
	}
