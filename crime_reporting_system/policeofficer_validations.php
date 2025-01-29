<?php 

class PoliceofficerValidator
{
	 public $station_id;
     public $name;
     public $designation;
     public $contactno;

	function __construct($station_id,$name, $designation, $contactno) {
		$this->station_id = $station_id;
		$this->name = $name;
		$this->designation = $designation;
		$this->contactno = $contactno;
	}

    public function emptyinput()
    {
    	
    	if(empty($this->station_id) || empty($this->name) || empty($this->designation) || empty($this->contactno))
    	{
    		echo '<script>alert("Either station id or name or designation or contact number is empty")</script>';
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
	public function invaliddesignation()
	{
		
		if (!preg_match("/^[a-zA-Z ]*$/", $this->designation)) 
	    {
	    	echo '<script>alert("Designation is not alphanumeric")</script>';
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
}


?>