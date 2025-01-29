<?php 

class ReportcrimeValidator
{
     public $user;
     public $date;
     public $type_of_crime;
     public $incident;
     public $criminaldetail;

	function __construct($user,$date, $type_of_crime, $incident,$criminaldetail) {
		$this->user = $user;
		$this->date = $date;
		$this->type_of_crime = $type_of_crime;
		$this->incident = $incident;
		$this->criminaldetail = $criminaldetail;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->user) || empty($this->date) || empty($this->type_of_crime) || empty($this->incident) || empty($this->criminaldetail))
    	{
    		echo '<script>alert("Either username or date or type of crime or incident detail or criminal detail is empty")</script>';
            return false;
    	}
    	else
    	{
    		return true;
    	}
    }
	public function invalidusername()
	{
		
		if (!preg_match("/^[a-zA-Z0-9 ]*$/", $this->user)) 
	    {
	    	echo '<script>alert("Username is not alphanumeric")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
	public function invaliddate()
	{
		
		if ($this->email_id > date("Y/m/d")) 
	    {
	    	echo '<script>alert("Date is not valid")</script>';
			return false;
		}
		else 
		{
			return true;
		}
	}
}


?>