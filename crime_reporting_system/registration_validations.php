<?php 

class UserValidator
{
	 public $name;
     public $user_name;
     public $email_id;
     public $contact_no;
     public $create_password;
     public $confirm_password;

	function __construct($name,$user_name,$email_id,$contact_no,$create_password,$confirm_password) {
		$this->name = $name;
		$this->user_name = $user_name;
		$this->email_id = $email_id;
		$this->contact_no = $contact_no;
		$this->create_password = $create_password;
		$this->confirm_password = $confirm_password;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->name) || empty($this->user_name) || empty($this->email_id) || empty($this->contact_no) || empty($this->create_password) || empty($this->confirm_password))
    	{
    		echo '<script>alert("Either name or username or email id or contact number or create password or confirm password is empty")</script>';
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
	public function invalidemailid()
	{
		
		if (!filter_var($this->email_id, FILTER_VALIDATE_EMAIL)) 
	    {
	    	echo '<script>alert("Email id is not valid")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function invalidcontactno()
	{
		
		if (!preg_match("/^[0-9]{10}$/", $this->contact_no)) 
	    {
	    	echo '<script>alert("Contact number is not numeric or it is more than 10 digits")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function passwordmatch()
	{
		
		if ($this->create_password !== $this->confirm_password) 
	    {
	    	echo '<script>alert("Create password and confirm password do not match with each other")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
}


?>