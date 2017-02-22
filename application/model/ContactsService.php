<?php
require_once 'application/model/ContactsGateway.php';
require_once 'application/model/ValidationException.php';
class ContactsService {
    private $contactsGateway    = NULL;
    private function openDb() {
        if (!mysql_connect("localhost", "root", "mnr")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("rec27012015")) {
            throw new Exception("No recruitment database found on database server.");
        }
    }
    private function closeDb() {
        mysql_close();
    }
    public function __construct() {
        $this->contactsGateway = new ContactsGateway();
    }
    public function getMyActivities($loggedInUser) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllMyActivities($loggedInUser);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllContacts($order) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAll($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllEvents() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllEvents();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setEvent($id,$name,$location,$details,$cutoff,$passout,$idpref,$active,$email,$isRegComplete) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->setEvent($id,$name,$location,$details,$cutoff,$passout,$idpref,$active,$email,$isRegComplete);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setStatus($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setStatus($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setEmail($id,$name,$subject,$body){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setEmail($id,$name,$subject,$body);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setPerson($id,$name,$username,$role,$password){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setPerson($id,$name,$username,$role,$password);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setStatusDefinition($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->setStatusDefinition($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function setCandidateDetails($id,$fname,$lname,$email,$mobile,$dob,$gender,$college,$qualification,$stream,$ssc,$inter,$degree,$yearPassed,$currentCompany,$yearsOfExp,$source){
        try {
            $this->openDb();
            $res = $this->contactsGateway->setCandidateDetails($id,$fname,$lname,$email,$mobile,$dob,$gender,$college,$qualification,$stream,$ssc,$inter,$degree,$yearPassed,$currentCompany,$yearsOfExp,$source);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getSettingsFor($source,$val){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getSettingsFor($source,$val);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getStatusDefinitions(){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getStatusDefinitions();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getCurrentRounds(){
        try {
            $this->openDb();
            $res = $this->contactsGateway->getCurrentRounds();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }	
	public function deleteStatuses($val){
        try {
            $this->openDb();
            $res = $this->contactsGateway->deleteStatuses($val);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function insertStatuses($val){
        try {
            $this->openDb();
            $res = $this->contactsGateway->insertStatuses($val);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getAllAStatuses() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllAStatuses();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllStatusDefinitions() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllStatusDefinitions();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllCandidateDetails() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllCandidateDetails();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getAllStates() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllStates();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getRoles() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getRoles();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getEmailTemplates() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getEmailTemplates();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getStaffDetails() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getStaffDetails();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllActivities() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAllActivities();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getPanelDetails() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->showAllPanels();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getLineChartDetails() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->showAllLinePanels();
			//print_r($res);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllGenders() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAllGenders();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    public function getAllStreams() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAllStreams();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllQualifications() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectAllQualifications();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    public function getContact($id) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->selectById($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->contactsGateway->find($id);
    }
    public function getContacts($email,$mobile){
		$errors = array();
		try {
            $res = $this->contactsGateway->selectByEMD($email,$mobile);
    		if(count($res)!=0){
				$errors[]='The system cannot process your registration. Please contact HR immediately.';
			}
	    } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
		if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
	}
	public function validateCutOffs($ssc,$inter,$degree,$yearPassed,$dob){
		$errors=array();
		try {
            $result = $this->contactsGateway->getEventsCutOff();
			$res=$result[0];
			if($res->evtCutOff != null && ($ssc < $res->evtCutOff || $inter < $res->evtCutOff || $degree < $res->evtCutOff))
			{
				$errors[]='You cannot register for the drive with less than '.$res->evtCutOff.' % on an aggregate.';
			}    
			if($res->evtYearFrom != null && $yearPassed < $res->evtYearFrom)
			{
				$errors[]='You cannot register if you are a '.$yearPassed.' passed out.';
			}
			if($res->evtYearTo != null && $yearPassed > $res->evtYearTo)
			{
				$errors[]='You cannot register if you are a '.$yearPassed.' passed out.';
			}			
			$year=date("Y");
			$month=date("m");
			if($res->evtYearTo == null && ($yearPassed > $year || ($yearPassed == $year && $month < 5)))
			{
				$errors[]='You cannot register if you are a '.$yearPassed.' passed out.';
			}
			$eDt=$res->evtDate;		
			$eDt1=explode(" ",$eDt);
			$eDt2=explode("-",$eDt1[0]);
			$cutOffYear=intval($eDt2[0])-18;
			$cutOffYear2=intval($eDt2[0])-58;
			$eDt3=explode("/",$dob);
			$dobDate=new DateTime($eDt3[2].'-'.$eDt3[1].'-'.$eDt3[0]);
			//echo $eDt3[2].'-'.$eDt3[1].'-'.$eDt3[0]."!!";
			//echo $cutOffYear.'-'.$eDt2[1].'-'.$eDt2[2];
			if(((intVal($eDt3[2]) > $cutOffYear) || ((intVal($eDt3[2]) == $cutOffYear) &&  intVal($eDt3[1]) >  intVal($eDt2[1])) || ((intVal($eDt3[2]) == $cutOffYear) &&  (intVal($eDt3[1]) ==  intVal($eDt2[1])) && intVal($eDt3[0]) >  intVal($eDt2[2]))) || ((intVal($eDt3[2]) < $cutOffYear2) || ((intVal($eDt3[2]) == $cutOffYear2) &&  intVal($eDt3[1]) <  intVal($eDt2[1])) || ((intVal($eDt3[2]) == $cutOffYear2) &&  (intVal($eDt3[1]) ==  intVal($eDt2[1])) && intVal($eDt3[0]) <  intVal($eDt2[2]))) ){
				$errors[]='Applicants age should be between 18 and 58';
			}
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
		if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
	}
	public function getEventsCutOff() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getEventsCutOff();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getContactsByStatus($status,$status1,$type){
		$errors = array();
		try {
            $this->openDb();
            $res = $this->contactsGateway->selectByStatus($status,$status1,$type);			
    		if(count($res)!=0){
				$errors[]='Please contact our HR immediately to resolve the issue';
			}
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
		if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
	}
	public function getSearchContact($search,$remail){
		$errors = array();
		try {
            $this->openDb();
            $scontacts = $this->contactsGateway->selectBySearch($search,$remail);			
    		if(count($scontacts)==0){
				$errors[]='No Results Found';
			}
			$this->closeDb();
			return $scontacts;
	    } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	    throw new ValidationException($errors);
	}
	
	public function getSearchContactID($rid){
		$errors = array();
		try {
            $this->openDb();
            $scontacts = $this->contactsGateway->selectBySearchID($rid);			
    		if(count($scontacts)==0){
				$errors[]='No Results Found';
			}			
			$this->closeDb();
			return $scontacts;
	    } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	    throw new ValidationException($errors);
	}
    private function validateContactParams( $fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source ) {
        $errors = array();
        if(!empty($email) && !$this->checkEmail($email)){
			$errors[] = 'Please enter a valid email address';
		}
		/*if(!$this->checkDOB($dob) && !empty($dob)){
			$errors[] = 'dob';
		}*/
		/*$check=$this->validateContact($email,$mobile);
		//$errors[]= count($check);
		if(!empty($mobile) && !empty($email) && count($check)>0){
			$errors[]='Please contact our HR immediately to resolve the issue'.count($check); 
		}*/
		/*if($this->sanityCheck($mobile, 'numeric', 10) == FALSE && $this->checkNumber($mobile, 10) != TRUE){
			// or give the variable a blank value
            $errors[] = 'mobile';
        }*/
		// check the sanity of the number and that it is greater than zero and 5 digits long
        if($this->sanityCheck($ssc, 'numeric', 10) == FALSE && $this->checkNumber($ssc, 10) != TRUE){
			// or give the variable a blank value
            $errors[] = 'Please enter your 10th %';
        }
		if($this->sanityCheck($inter, 'numeric', 10) == FALSE && $this->checkNumber($inter, 10) != TRUE){
			// or give the variable a blank value
            $errors[] = 'Please enter your inter %';
        }
		if($this->sanityCheck($degree, 'numeric', 10) == FALSE && $this->checkNumber($degree, 10) != TRUE){
			// or give the variable a blank value
            $errors[] = 'Please enter your degree %';
        }
		if($this->sanityCheck($yearPassed, 'numeric', 10) == FALSE && $this->checkNumber($yearPassed, 10) != TRUE){
			// or give the variable a blank value
            $errors[] = 'Please enter valid year of passout';
        }
		if($this->sanityCheck($currentCompany, 'string', 100) == FALSE && $currentCompany!=''){
			// or give the variable a blank value
            $errors[] = 'Please enter valid company name';
        }
		if($this->sanityCheck($yearsOfExp, 'numeric', 10) == FALSE && $yearsOfExp!='' && $yearsOfExp!='0'){
			// or give the variable a blank value
            $errors[] = 'Please enter valid years of experience';
        }
		if($this->sanityCheck($source, 'string', 100) == FALSE || empty($source)){
			// or give the variable a blank value
            $errors[] = 'Please enter valid information';
        }
		if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    function checkEmail($email){
		/*return preg_match('/^([a-z0-9_-]+)(@[a-z0-9-]+)(\.[a-z]+|\.[a-z]+\.[a-z]+)?$/is', $email) ? TRUE : FALSE;*/
		return preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/is", $email) ? TRUE : FALSE;
	}
	function checkDOB($dob){
		return preg_match('/^((31(?!\ (Feb(ruary)?|Apr(il)?|June?|(Sep(?=\b|t)t?|Nov)(ember)?)))|((30|29)(?!\ Feb(ruary)?))|(29(?=\ Feb(ruary)?\ (((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)))))|(0?[1-9])|1\d|2[0-8])\ (Jan(uary)?|Feb(ruary)?|Ma(r(ch)?|y)|Apr(il)?|Ju((ly?)|(ne?))|Aug(ust)?|Oct(ober)?|(Sep(?=\b|t)t?|Nov|Dec)(ember)?)\ ((1[6-9]|[2-9]\d)\d{2})$/', $dob) ? TRUE : FALSE;
	}
	function sanityCheck($string, $type, $length){
		// assign the type
		$type = 'is_'.$type;
		if(!$type($string)){
			return FALSE;
		}
		// now we see if there is anything in the string
		elseif(empty($string)){
			return FALSE;
		}
		// then we check how long the string is
		elseif(strlen($string) > $length){
			return FALSE;
		}
		else{
		// if all is well, we return TRUE
			return TRUE;
		}
	}
	function checkNumber($num, $length){
		if($num > 0 && strlen($num) == $length){
			return TRUE;
		}
	}
    public function createNewContact( $fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source ) {
		try {
            $this->openDb();
			$this->getContacts( $email, $mobile);
            $this->validateContactParams($fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source);
			$this->validateCutOffs($ssc,$inter,$degree,$yearPassed,$dob);
			$result = $this->contactsGateway->getEventsCutOff();
			$event=$result[0]->id;
            $res = $this->contactsGateway->insert($fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source,$event);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
		    $this->closeDb();
            throw $e;
        }
    }
	public function updateContactRegID($res){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->updateContactReg($res);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
    public function checkCredentials($email,$password){
		try {
            $this->openDb();
		    $res = $this->contactsGateway->checkCredentials($email,$password);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
    public function deleteContact( $id ) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->delete($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getHomeDetails( $val ) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllHomeDetailsTable($val);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getHomeDetailsChart($val) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllHomeDetailsChart($val);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getHomeDetailsEventChart($val) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getHomeDetailsEventChart($val);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	
	public function getCount() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getCount();
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	/*edited for rounds*/
	public function getRounds() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getRounds();
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getHomeDetailsBySelection($source, $val ) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllHomeDetailsBySelection($source,$val);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function insertMsg($regId,$ptweet,$status,$pscore) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->insertMsg($regId,$ptweet,$status,$pscore);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
	public function getAllStatus($status) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllStatus($status);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllStatuses() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllStatuses();
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllColleges($college) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAllColleges($college);
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getAllSheets(){
		try {
            $this->openDb();
            $res = $this->contactsGateway->getAllSheets();			
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
	public function getCandidate($reg3){
		try {
            $this->openDb();
            $res = $this->contactsGateway->getCandidate($reg3);			
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
	public function updateBulkList($activities,$user,$bulkStatus,$bulkComment){	
		try {
            $this->openDb();
            $res = $this->contactsGateway->updateBulkList($activities,$user,$bulkStatus,$bulkComment);		
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
	public function getByStats(){	
		try {
            $this->openDb();
            $res = $this->contactsGateway->selectByStats();		
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}	
	public function getAllRegIds(){
		try {
            $this->openDb();
            $res = $this->contactsGateway->getAllRegIds();		
            $this->closeDb();
			return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
	}
}
?>