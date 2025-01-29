<?php 

class ComplainantsValidator
{
     public $name;
     public $address;
     public $contactno;
     public $emailid;
     public $password;

	function __construct($name,$address,$contactno,$emailid,$password) {
		$this->name = $name;
		$this->address = $address;
		$this->contactno = $contactno;
		$this->emailid = $emailid;
		$this->password = $password;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->name) || empty($this->address) || empty($this->contactno) || empty($this->emailid) || empty($this->password))
    	{
    		echo '<script>alert("Either name or address or contact number or email id or password is empty")</script>';
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
	public function invalidcontactno()
	{
		
		if (!preg_match("/^[0-9]{10}$/", $this->contactno)) 
	    {
	    	echo '<script>alert("Contact number is not numeric or it is more than 10 digits")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function invalidemailid()
	{
		
		if (!filter_var($this->emailid, FILTER_VALIDATE_EMAIL)) 
	    {
	    	echo '<script>alert("Email id is not valid")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
}


?>