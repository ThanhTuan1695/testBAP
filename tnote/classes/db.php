<?php 
class DB{
/**
 * [connect database]
 * @var localhost , username,password
 */
public $host = 'localhost';
public $username = 'root';
public $password = 'root';
public $conn = NULL;

 public function connect()
    {
        try {

		    $this->conn = new PDO("mysql:host=$this->host;dbname=note", $this->username, $this->password);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		    }
		catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }

    }
/**
 * [function close connection database]
 * @return 
 */
 public function closeDB()
{
	$this->conn = null;
}

/**
 * [take is query to execute]
 * @param  [String] $sql [about select and update data]
 * @return [array] depend on you choose type return
 */
public function queryupdate($sql = null)
{
	//var_dump("error");

	if ($this->conn) {
		$sql= $this->conn->prepare($sql);
		 return $sql;
	}
	return false;
}

/**
 * [num_rows count number data return]
 * @param  [String] $sql [some sql to count data]
 * @return [int]      [ a mount rows of data]
 */
public function num_rows($sql = null)
{
	if ($this->conn) {
		return $this->conn->query($sql)->fetchColumn();
	}
	return null;
}

/**
 * [fetch_data fetch data depend on user]
 * @param  [String] $sql  [statement of database]
 * @param  [String] $type [type of data after execute]
 * @return [array,object,int...]       [depend is type ]
 */
public function fetch_data($sql = null , $type)
{
	if ($this->conn) {
		if ($type == 0 ) {
			return $this->conn->query($sql)->fetchAll();
		}else{
			return $this->conn->query($sql)->fetchAll($type);
		}
	}
	return null;
}

/**
 * [last_insert find id last insert to database]
 * @return [int]
 */
public function last_insert()
{
	if ($this->conn) {
		return $this->conn->lastInsertId();
	}
	return null;
}

public function takeId($user)
{
	 	$sql = "SELECT id_user FROM note.users WHERE username = '$user'";
	 	
        $e = $this->conn->prepare($sql);
        $e->execute();
        $row = $e->fetch(PDO::FETCH_ASSOC);
        $id = $row['id_user'];
        return $id;
}
public function fetch_data_row($sql=null,$type)
{
	if ($this->conn) {
		if ($type == 0 ) {
			return $this->conn->query($sql)->fetch();
		}else{
			return $this->conn->query($sql)->fetch($type);
		}
	}
	return null;
}
}

