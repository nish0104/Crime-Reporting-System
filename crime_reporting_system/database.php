<?php

class Database
{
    private $connection;

	function __construct() {
		$this->connect_db();
	}

	public function connect_db() {
		$this->connection = mysqli_connect('localhost', 'root', '', 'crime_reporting_system');
		if (mysqli_connect_error()) {
			die("Database Connection Failed".mysqli_connect_error().mysqli_connect_errno());
		}
	}

	public function sanitize($var) {
		$returns = mysqli_real_escape_string($this->connection, $var);
		return $returns;
	}

    public function registration($name,$user_name,$email_id,$contact_no,$create_password,$confirm_password) {

		$sqlr = "INSERT INTO registration (name,username,emailid,contactno,createpassword,confirmpassword) VALUES ('$name', '$user_name', '$email_id', '$contact_no' , '$create_password' , '$confirm_password')";
		$resr = mysqli_query($this->connection, $sqlr);
		if ($resr) {
			return true;
		} else {
			return false;
		}

	}

	public function email($email_id) {
		$sqle = "SELECT *  FROM registration WHERE emailid='$email_id'";
		$rese = mysqli_query($this->connection, $sqle);
		if($rese)
		{
			$emailcount = mysqli_num_rows($rese);
			return $emailcount;
		}
		else
		{
			return false;
		}
	}

	public function login($user_name,$password) {
		$sqll = "SELECT username,confirmpassword  FROM registration WHERE username='$user_name' and confirmpassword='$password'";
		$resl = mysqli_query($this->connection, $sqll);
		if($resl)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

    public function reportcrime($user,$date, $type_of_crime, $incident,$criminaldetail,$image) {

		$sqlrc = "INSERT INTO report_crime (username,todaydate,type_of_crime,incident,criminaldetail,img) VALUES ('$user','$date', '$type_of_crime', '$incident', '$criminaldetail','$image')";
		$resrc = mysqli_query($this->connection, $sqlrc);
		if ($resrc) {
			return true;
		} else {
			return false;
		}

	}

    public function viewcomplaints() {
		$sqlvc = "SELECT * FROM report_crime";
		$resvc = mysqli_query($this->connection, $sqlvc);
		if($resvc)
		{
			$rr = array();
			while($rrow = mysqli_fetch_array($resvc))
			{
				$rr[] = $rrow;
			}
			return $rr;
			
		}
	}

    public function totalcomplaints() {
		$sql = "SELECT * FROM report_crime";
		$res = mysqli_query($this->connection, $sql);
		if($res)
		{
			$rowcount = mysqli_num_rows($res);
			return $rowcount;
			
		}
	}
 
    public function viewcomplaintsdata($id){
    	$sql = "SELECT * FROM report_crime WHERE id=$id";
    	$result = mysqli_query($this->connection,$sql);
    	return $result;
    		
    }

    public function viewcrime($type_of_crime){
    	$sqlvcr = "SELECT * FROM report_crime WHERE type_of_crime='$type_of_crime' group by type_of_crime";
    	$resultvcr = mysqli_query($this->connection,$sqlvcr);
    	if($resultvcr)
		{
			$vcr = array();
			while($vcrow = mysqli_fetch_array($resultvcr))
			{
				$vcr[] = $vcrow;
			}
			return $vcr;
			
		}
    		
    }

    public function updatecomplaints($date,$type_of_crime,$incident,$criminaldetail,$update_filename,$id) {

		$sql = "UPDATE report_crime SET todaydate='$date',type_of_crime='$type_of_crime',incident='$incident',criminaldetail='$criminaldetail',img='$update_filename' WHERE id='$id'";
		$ress = mysqli_query($this->connection, $sql);
		if($ress)
		{
			return true;
		}
		else
		{
			die(mysqli_error($this->connection));
		}
	}


    public function complainants($name, $address, $contactno, $emailid, $password) {

		$sql = "INSERT INTO complainants (name,address,contact,emailid,password) VALUES ('$name', '$address', '$contactno', '$emailid', '$password')";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}

	}

    public function viewcomplainants() {
		$sql = "SELECT * FROM complainants";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$r = array();
			while($row = mysqli_fetch_array($ress))
			{
					$r[] = $row;
			}
			return $r;

		}

	}

    public function totalcomplainants() {
		$sql = "SELECT * FROM complainants";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$rowcount = mysqli_num_rows($ress);
			return $rowcount;

		}

	}

    public function viewcomplainantsdata($id){
    	$sql = "SELECT * FROM complainants WHERE id=$id";
    	$result = mysqli_query($this->connection,$sql);
    	return $result;
    		
    }




    public function updatecomplainants($name,$address,$contactno,$emailid,$password,$id) {

		$sql = "UPDATE complainants SET name='$name',address='$address',contact='$contactno',emailid='$emailid',password='$password' WHERE id='$id'";
		$ress = mysqli_query($this->connection, $sql);
		if($ress)
		{
			return true;
		}
		else
		{
			die(mysqli_error($this->connection));
		}
		
	}

	 public function stations($name, $address) {

		$sql = "INSERT INTO stations (name,address) VALUES ('$name', '$address')";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}

	}

	  public function viewstations() {
		$sql = "SELECT * FROM stations";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$r = array();
			while($row = mysqli_fetch_array($ress))
			{
					$r[] = $row;
			}
			return $r;

		}

	}

	public function totalstations() {
		$sql = "SELECT * FROM stations";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$r = mysqli_num_rows($ress);
	
			return $r;

		}

	}

	public function viewstationdata($id){
    	$sql = "SELECT * FROM stations WHERE id=$id";
    	$result = mysqli_query($this->connection,$sql);
    	return $result;
    		
    }

    public function stationname(){
    	$sql = "SELECT * FROM stations order by name asc";
    	$result = mysqli_query($this->connection,$sql);
    	return $result;
    		
    }

    public function updatestation($name,$address,$id) {

		$sql = "UPDATE stations SET name='$name',address='$address' WHERE id='$id'";
		$ress = mysqli_query($this->connection, $sql);
		if($ress)
		{
			return true;
		}
        else
        {
        	die(mysqli_error($this->connection));
        }
	}

	public function policeofficerdetail($station_id,$name, $designation, $contactno) {

		$sql = "INSERT INTO police_officer (station_id,name,designation,contactno) VALUES ('$station_id','$name', '$designation', '$contactno')";
		$res = mysqli_query($this->connection, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}

	}
	public function viewpoliceofficer() {
		$sql = "SELECT * FROM police_officer";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$r = array();
			while($row = mysqli_fetch_array($ress))
			{
					$r[] = $row;
			}
			return $r;

		}

	}
	public function totalpoliceofficer() {
		$sql = "SELECT * FROM police_officer";
		$ress = mysqli_query($this->connection, $sql);	
		
		if($ress)
		{
			$r = mysqli_num_rows($ress);
	
			return $r;

		}

	}
	public function viewpoliceofficerdata($id){
    	$sql = "SELECT * FROM police_officer WHERE id=$id";
    	$result = mysqli_query($this->connection,$sql);
    	return $result;
    		
    }
    public function updatepoliceofficer($station_id,$name, $designation, $contactno,$id) {

		$sql = "UPDATE police_officer SET station_id='$station_id', name='$name',designation='$designation' WHERE id='$id'";
		$ress = mysqli_query($this->connection, $sql);
		if($ress)
		{			
			return true;
		}
        else
        {
        	die(mysqli_error($this->connection));
        }
	}

}
$database = new Database();
	
?>