<?php
class Database{
    private $host      = 'localhost:8889';
    private $user      = 'root';
    private $pass      = 'root';
    private $dbname    = 'simple_cms';
 
    private $dbHandler;
    private $error;
    private $statement;

	/**
	 * 
	 */  
    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    		PDO::ATTR_EMULATE_PREPARES   => false            
        );
        // Create a new PDO instanace
        try{
            $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

	/**
	 * 
	 */  
	public function bind($param, $value, $type = null)
	{
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
	    $this->statement->bindValue($param, $value, $type);
	}    

	/**
	 * 
	 */  
	public function query($query)
	{
	    $this->statement = $this->dbHandler->prepare($query);
	}

	/**
	 * 
	 */  
	public function execute()
	{
	    return $this->statement->execute();
	}	

	/**
	 * 
	 */  
	public function resultset()
	{
	    $this->execute();
	    return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}	

	/**
	 * 
	 */  
	public function single()
	{
	    $this->execute();
	    return $this->statement->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * 
	 */  
	public function rowCount()
	{
	    return $this->statement->rowCount();
	}		

}

?>