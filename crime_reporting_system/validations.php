<?php 

class UserValidator
{
     public $user_name;
     public $password;

	function __construct($user_name,$password) {
		$this->user_name = $user_name;
		$this->password = $password;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->user_name) || empty($this->password))
    	{
    		echo '<script>alert("Either username or password is empty")</script>';
            return false;
    	}
    	else
    	{
    		return true;
    	}
    }
	public function invalidusername()
	{
		
		if (!preg_match("/^[a-zA-Z0-9 ]*$/", $this->user_name)) 
	    {
	    	echo '<script>alert("Username is not alphanumeric")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
}


?>