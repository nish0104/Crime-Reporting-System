<?php 

class StationsValidator
{
     public $name;
     public $address;

	function __construct($name,$address) {
		$this->name = $name;
		$this->address = $address;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->name) || empty($this->address))
    	{
    		echo '<script>alert("Either name or address is empty")</script>';
            return false;
    	}
    	else
    	{
    		return true;
    	}
    }
	public function invalidname()
	{
		
		if (!preg_match("/^[a-zA-Z ]*$/", $this->name)) 
	    {
	    	echo '<script>alert("Name is not alphanumeric")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
}


?>