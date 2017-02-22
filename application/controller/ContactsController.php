<?php
require_once 'application/model/ContactsService.php';

class ContactsController {
	private $contactsService = NULL;
	public function __construct() {
		$this->contactsService = new ContactsService();		
	}
	public function redirect($location) {
		header('Location: '.$location);
	}
	public function handleRequest() {
		$op = isset($_GET['op'])?$_GET['op']:NULL;
		try {
			if ( !$op || $op == 'default' ) {
				$this->basePage();
			}
			elseif ( $op == 'login' ) {
				$this->showLogin();
			}
			elseif ( $op == 'logout' ) {
				$this->doLogout();
			}
			elseif ( $op == 'profile' ) {
				$this->showProfile();
			}
			elseif ( $op == 'printSheets' ) {
				$this->getAllSheetsList();
			}
			elseif ( $op == 'print' ) {
				$this->getAllSheets();
			}
			elseif ( $op == 'list' ) {
				$this->listContacts();
			}
			elseif ( $op == 'new' ) {
				$this->saveContact();
			}
			elseif ( $op == 'delete' ) {
				$this->deleteContact();
			} 
			elseif ( $op == 'show' ) {
				$this->showContact();
			} 
			elseif ( $op == 'success' ) {			
				$this->showContactSuccess();
			}
			elseif ( $op == 'settings' ) {	
				$this->showSettings();
			}
			elseif ( $op == 'getCollege' ) {	
				$this->getColleges();
			}
			elseif ( $op == 'getSettings' ) {
				$val = isset($_GET['val'])?  $_GET['val'] :NULL;			
				$source = isset($_GET['source'])?  $_GET['source'] :NULL;
                $this->getSettings($source,$val);
			}
			elseif ( $op == 'getIncluded' ) {	
				$source = isset($_GET['source'])?  $_GET['source'] :NULL;
                $this->getIncluded($source);
			}
			elseif ( $op == 'home' ) {
                $this->showHome();
            }
			elseif ( $op == 'atHome' ) {
                $this->showNewHome();
            }
			elseif ( $op == 'guestHome' ) {
                $this->showGuestHome();
            }
			elseif ( $op == 'activities' ) {
                $this->showActivities();
            }
			else if($op == "panels"){
				$this->showPanels();
			}
			else if($op == "panelspie"){
				$this->showPanelsPie();
			}
			else if($op == "linechart"){
				$this->showLineChart();
			}
			else if($op == "search"){
				$this->showPanels();
			}
			else if($op == "updateHome"){
				$this->showHomeUpdate();
			}
			else if($op == "searchfor"){
				$reg3      = isset($_GET['reg2'])?  $_GET['reg2'] :NULL;					
				$this->showSearchFor($reg3);
			}
			else if($op == "profile2"){
				$this->showProfile2();
			}		
			else if($op =="homeDetails"){
				$val = isset($_GET['val'])?  $_GET['val'] :NULL;			
				$toggle = isset($_GET['toggle'])?  $_GET['toggle'] :NULL;			
				$this->homeDetails($val,$toggle);
			}
			else if($op =="homeDetailsEvent"){
				$val = isset($_GET['val'])?  $_GET['val'] :NULL;			
				$toggle = isset($_GET['toggle'])?  $_GET['toggle'] :NULL;			
				$this->homeDetailsEvent($val,$toggle);
			}
			else if($op =="homeDetailsBySelection"){
				$val = isset($_GET['val'])?  $_GET['val'] :NULL;			
				$source = isset($_GET['source'])?  $_GET['source'] :NULL;			
				$this->homeDetailsBySelection($source,$val);
			}
			else if($op =="loadSessionListDetails"){		
				$val = isset($_GET['source'])?  $_GET['source'] :NULL;			
				$this->loadSessionListDetails($val);
			}
			elseif ( $op == 'customSearch' ) {
				$search      = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;				
				//echo $search;   
				$this->showSearch($search);
            }
			elseif ( $op == 'showDetails' ) {
				$rid      = isset($_GET['id'])?   $_GET['id'] :NULL;
				//echo $rid;
				//$status2      = isset($_GET['status'])?   $_GET['status'] :NULL;
			    //$this->showDetails($rid,$status2);
				$this->showSearch($rid);
            }
			else if($op == "search2"){
				$this->showStatus();
			}
			else if($op == "bulkUpdate"){	
				$this->showBulkUpdate();
			}
			else if($op == "showStatus"){
				$this->showBulkUpdate();
			}
			else if($op == "updateList"){
				$activitiesTxt=$_GET['activityList'];
				$activities=json_decode($activitiesTxt,true);		
				$bulkStatus=$_GET['status'];
				$bulkComment=$_GET['comment'];
				$this->updateBulkList($activities,$bulkStatus,$bulkComment);
			}			
			elseif ( $op == 'showByStatus' ) {				
				$status      = isset($_GET['status1'])?   $_GET['status1'] :NULL;
				$status1      = isset($_GET['status2'])?   $_GET['status2'] :NULL;
				$type      = isset($_GET['type'])?   $_GET['type'] :NULL;
			    $this->showByStatus($status,$status1,$type);
            }
			elseif ( $op == 'stats' ) {		
			    $this->showByStats();
            }
			else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    public function basePage() {
		$evtDetails=$this->contactsService->getEventsCutOff();
        include 'application/view/default.php';
    }
	public function showSettings() {
		$errors = array();		
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if($_SESSION['user']->role!="1"){
			$this->redirect('index.php?op=logout');
		}
		$formval = isset($_POST['val_form'])?   $_POST['val_form'] :NULL;
		if($formval=="event"){			
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$location = isset($_POST['val_location'])?   $_POST['val_location'] :NULL;
			$details = isset($_POST['val_evtPriorAtnDays'])?   $_POST['val_evtPriorAtnDays'] :NULL;
			$cutoff = isset($_POST['val_cutoff'])?   $_POST['val_cutoff'] :NULL;
			$passout = isset($_POST['val_pass'])?   $_POST['val_pass'] :NULL;
			$idpref = isset($_POST['val_idpref'])?   $_POST['val_idpref'] :NULL;
			$active = isset($_POST['val_active'])?   $_POST['val_active'] :NULL;
			$email = isset($_POST['val_email'])?   $_POST['val_email'] :NULL;
			$isRegComplete = isset($_POST['val_isRegComplete'])?   $_POST['val_isRegComplete'] :NULL;
			$event = $this->contactsService->setEvent($id,$name,$location,$details,$cutoff,$passout,$idpref,$active,$email,$isRegComplete);
		}
		if($formval=="status"){		 
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$displayname = isset($_POST['val_displayname'])?   $_POST['val_displayname'] :NULL;
			$roundname = isset($_POST['val_roundname'])?   $_POST['val_roundname'] :NULL;
			$ordinal = isset($_POST['val_ordinal'])?   $_POST['val_ordinal'] :NULL;
			$state = isset($_POST['val_state'])?   $_POST['val_state'] :NULL;
			$emailTemp = isset($_POST['val_emailTemp'])?   $_POST['val_emailTemp'] :NULL;
			$emailLbl = isset($_POST['val_emaillabel'])?   $_POST['val_emaillabel'] :NULL;
			$chartLbl = isset($_POST['val_chartlabel'])?   $_POST['val_chartlabel'] :NULL;
			$legendLbl = isset($_POST['val_legendlabel'])?   $_POST['val_legendlabel'] :NULL;
			$colorVal = isset($_POST['val_colorvalue'])?   $_POST['val_colorvalue'] :NULL;
			$status = $this->contactsService->setStatus($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal);
		}
		if($formval=="email"){
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$subject = isset($_POST['val_subject'])?   $_POST['val_subject'] :NULL;
			$body = isset($_POST['val_body'])?   $_POST['val_body'] :NULL;			
			$emailTem = $this->contactsService->setEmail($id,$name,$subject,$body);
		}
		if($formval=="people"){
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$name = isset($_POST['val_name'])?   $_POST['val_name'] :NULL;
			$username = isset($_POST['val_username'])?   $_POST['val_username'] :NULL;
			$role = isset($_POST['val_role'])?   $_POST['val_role'] :NULL;		
			$password=isset($_POST['val_password'])?   $_POST['val_password'] :NULL;		
			$pers = $this->contactsService->setPerson($id,$name,$username,$role,$password);
		}
		if($formval=="statusDefinition"){		
			$sDefs=$_POST['val_statusIncluded'];		
			$sNewDefsList=array();
			foreach($sDefs as $sDef)
			{
				array_push($sNewDefsList,$sDef);
			}
			/*foreach($sNewDefsList as $newDef)
			{
				echo $newDef;
			}*/
			$curRounds=$this->contactsService->getCurrentRounds();
			$sOldDefsList=array();
			foreach($curRounds as $curRound)
			{
				array_push($sOldDefsList,$curRound->round);
			}
			// Deleting the statuses from old list
			foreach($sOldDefsList as $oDef)
			{
				if(!(in_array($oDef, $sNewDefsList)))
				{
					//echo "delete status".$oDef;
					$deleteStatusDef=$this->contactsService->deleteStatuses($oDef);
				}
			}
			// Inserting the statuses to new list
			foreach($sNewDefsList as $nDef)
			{
				if(!(in_array($nDef, $sOldDefsList)))
				{
					//echo "insert status".$nDef;
					$insertStatusDef=$this->contactsService->insertStatuses($nDef);
				}
			}
		}
		if($formval=="newstatusdef"){	
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$displayname = isset($_POST['val_displayname'])?   $_POST['val_displayname'] :NULL;
			$roundname = isset($_POST['val_roundname'])?   $_POST['val_roundname'] :NULL;
			$ordinal = isset($_POST['val_ordinal'])?   $_POST['val_ordinal'] :NULL;
			$state = isset($_POST['val_state'])?   $_POST['val_state'] :NULL;
			$emailTemp = isset($_POST['val_emailTemp'])?   $_POST['val_emailTemp'] :NULL;
			$emailLbl = isset($_POST['val_emaillabel'])?   $_POST['val_emaillabel'] :NULL;
			$chartLbl = isset($_POST['val_chartlabel'])?   $_POST['val_chartlabel'] :NULL;
			$legendLbl = isset($_POST['val_legendlabel'])?   $_POST['val_legendlabel'] :NULL;
			$colorVal = isset($_POST['val_colorvalue'])?   $_POST['val_colorvalue'] :NULL;
			$status = $this->contactsService->setStatusDefinition($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal);
		}
		if($formval=="candidateform"){	
			$id = isset($_POST['val_id'])?   $_POST['val_id'] :NULL;
			$fname = isset($_POST['val_fname'])?   $_POST['val_fname'] :NULL;
			$lname = isset($_POST['val_lname'])?   $_POST['val_lname'] :NULL;
			$email = isset($_POST['val_email'])?   $_POST['val_email'] :NULL;
			$mobile = isset($_POST['val_mobile'])?   $_POST['val_mobile'] :NULL;
			$dob = isset($_POST['val_dob'])?   $_POST['val_dob'] :NULL;
			$gender = isset($_POST['val_gender'])?   $_POST['val_gender'] :NULL;
			$college = isset($_POST['val_college'])?   $_POST['val_college'] :NULL;
			$qualification = isset($_POST['val_qualification'])?   $_POST['val_qualification'] :NULL;
			$stream = isset($_POST['val_stream'])?   $_POST['val_stream'] :NULL;
			$ssc = isset($_POST['val_ssc'])?   $_POST['val_ssc'] :NULL;
			$inter = isset($_POST['val_inter'])?   $_POST['val_inter'] :NULL;
			$degree = isset($_POST['val_degree'])?   $_POST['val_degree'] :NULL;
			$yearPassed = isset($_POST['val_yearPassed'])?   $_POST['val_yearPassed'] :NULL;
			$currentCompany = isset($_POST['val_currentCompany'])?   $_POST['val_currentCompany'] :NULL;
			$yearsOfExp = isset($_POST['val_yearsOfExp'])?   $_POST['val_yearsOfExp'] :NULL;
			$source = isset($_POST['val_source'])?   $_POST['val_source'] :NULL;
			$candid = $this->contactsService->setCandidateDetails($id,$fname,$lname,$email,$mobile,$dob,$gender,$college,$qualification,$stream,$ssc,$inter,$degree,$yearPassed,$currentCompany,$yearsOfExp,$source);
		}
		$events = $this->contactsService->getAllEvents();
		$allStatuses = $this->contactsService->getAllAStatuses();
		$allStatusDefinitions = $this->contactsService->getAllStatusDefinitions();
		$allCandidates=$this->contactsService->getAllCandidateDetails();
		
		$emailTemplates = $this->contactsService->getEmailTemplates();
		$staff=$this->contactsService->getStaffDetails();
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        include 'application/view/settings.php';
    }
	public function showSearchFor($reg3) {
		try{
			if($reg3 != null)
			{
				$cntact=$this->contactsService->getCandidate($reg3);	
				echo $cntact->id.",".$cntact->regId.",".$cntact->fullname.",".$cntact->email.",".$cntact->statusName;
			}					
		}
		catch (Exception $e) {
               return "Failed resource not found";
            }
    }
	 
	public function showProfile(){
		$errors = array();		
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}		 
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$email="Any";
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				//print_r($scontacts);
				$this->redirect('index.php?op=customSearch');
				return $scontacts;
				//include 'application/view/home.php';
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$myActivities = $this->contactsService->getMyActivities($_SESSION['user']->id);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/profile.php';		
	}
	public function getAllSheetsList(){
		$allSheets=$this->contactsService->getAllSheets();
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$email='Any';
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				$this->redirect('index.php?op=customSearch');
				return $scontacts;
			//include 'application/view/home.php';
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/printSheets.php';
	}
	public function getAllSheets(){				
	$xyz = $this->contactsService->getCount();
		include 'application/view/print.php';
	}
	public function showHomeUpdate() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
    }
	public function showHome() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$email='Any';
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				$this->redirect('index.php?op=list');
				return $scontacts;
				//include 'application/view/home.php';
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		include 'application/view/home.php';
    }
	public function showNewHome() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		//$scontacts = $this->contactsService->getSearchContact($search);
		$xyz = $this->contactsService->getCount();		
		$rounds=$this->contactsService->getRounds();		
		include 'application/view/newHome.php';
    }
	public function showBulkUpdate() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		$tempUsers = $_SESSION['tempList'];
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$email='Any';
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				$this->redirect('index.php?op=bulkUpdate');
				return $scontacts;
				//include 'application/view/home.php';
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$candidates=$this->contactsService->getAllRegIds();
		$statusesObj=$this->contactsService->getAllStatuses();
		/*foreach($statusesObj as $statusOb)
		{
			echo $statusOb->id ."".$statusOb->displayName;
		}*/
		$evtDetails=$this->contactsService->getEventsCutOff();
		$eve=$evtDetails[0];
		$xyz = $this->contactsService->getCount();		
		$rounds=$this->contactsService->getRounds();
		include 'application/view/bulkUpdate.php';
    }
	/*public function showGuestHome() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$scontacts = $this->contactsService->getSearchContact($search);
				$this->redirect('index.php?op=guestHome');
				return $scontacts;
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$candidates=$this->contactsService->getAllRegIds();
		$statusesObj=$this->contactsService->getAllStatuses();
		$evtDetails=$this->contactsService->getEventsCutOff();
		$eve=$evtDetails[0];
		$xyz = $this->contactsService->getCount();
		include 'application/view/guestHome.php';
    }*/
	public function showGuestHome() {
		$errors = array();		
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		$tempUsers = $_SESSION['tempList'];
		if ( isset($_POST['form-submitted']) ) {
			$search = isset($_POST['top-search'])?   $_POST['top-search'] :NULL;
			try {
				$email='Any';
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				$this->redirect('index.php?op=guestHome');
				return $scontacts;
				//include 'application/view/home.php';
			} catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}
		$candidates=$this->contactsService->getAllRegIds();
		$statusesObj=$this->contactsService->getAllStatuses();
		/*foreach($statusesObj as $statusOb)
		{
			echo $statusOb->id ."".$statusOb->displayName;
		}*/
		$evtDetails=$this->contactsService->getEventsCutOff();
		$eve=$evtDetails[0];
		$xyz = $this->contactsService->getCount();	
		$rounds=$this->contactsService->getRounds();		
		include 'application/view/guestHome.php';
    }

	public function showSearch($search) {		
		$errors=array();
		session_start();	
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if ( isset($_POST['msg-submitted']) ) {				
			$Id = isset($_POST['rId'])? $_POST['rId'] :NULL;
			$ptweet = isset($_POST['ptweet'])? $_POST['ptweet'] :NULL;
			$status = isset($_POST['status'])? $_POST['status'] :NULL;
			$pscore = isset($_POST['pscore'])? $_POST['pscore'] :NULL;			
			$search2 = isset($_POST['rId2'])? $_POST['rId2'] :NULL;	
			try{
				$msgs = $this->contactsService->insertMsg($Id,$ptweet,$status,$pscore);	
				$email='Any';
				$scontacts = $this->contactsService->getSearchContact($search2,$email);			
				//$statusArray = $this->contactsService->getAllStatus($status);
				$statusArray = $this->contactsService->getAllStatuses();
				$xyz = $this->contactsService->getCount();
			}
			catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
			$xyz = $this->contactsService->getCount();
			$rounds=$this->contactsService->getRounds();
			include 'application/view/home.php';			 
		}
		else{
			try{
				$email = 'Any';
				$scontacts = $this->contactsService->getSearchContact($search,$email);
				if(count($scontacts) >= 1){
					//$statusArray = $this->contactsService->getAllStatus($scontacts[0]->status);
					$statusArray = $this->contactsService->getAllStatuses();
				}
			}
			catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
			$xyz = $this->contactsService->getCount();
			$rounds=$this->contactsService->getRounds();
			include 'application/view/home.php';
		}
    }
	public function showDetails($rid,$status2) {
		$errors=array();
		$statusArray = $this->contactsService->getAllStatus($status2);
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		if ( isset($_POST['msg-submitted']) ) {	
			$regId = isset($_POST['rId'])? $_POST['rId'] :NULL;
			$ptweet = isset($_POST['ptweet'])? $_POST['ptweet'] :NULL;
			$status = isset($_POST['status'])? $_POST['status'] :NULL;
			$pscore = isset($_POST['pscore'])? $_POST['pscore'] :NULL;
			try{
				$statusArray = $this->contactsService->getAllStatus($status);
				$msgs = $this->contactsService->insertMsg($regId,$ptweet,$status,$pscore);
			}catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
		}	
		$scontacts = $this->contactsService->getSearchContactID($rid); 
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/home.php';
    }
	public function doLogout() {
		$email = '';
		$password='';
	    $errors = array();
		$error='';
		session_start();
		$_SESSION['user']=NULL;
		session_destroy();
		$xyz = $this->contactsService->getCount();
        include 'application/view/login.php';
	}
	public function showLogin() {
		$email = '';
		$password='';
		$err=isset($_GET['errId'])?   $_GET['errId'] :NULL;
		if($err ==1){
			$error='Incorrect username or password';
		}
		else{
			$error='';
		}
		if ( isset($_POST['form-submitted']) ) {
			$email      = isset($_POST['login-email'])?   $_POST['login-email'] :NULL;
			$password      = isset($_POST['login-password'])?   $_POST['login-password'] :NULL;
			try {
				$events = $this->contactsService->getEventsCutOff();
				$res = $this->contactsService->checkCredentials($email,$password);
				if($res==''){
					$this->redirect('index.php?op=login&errId=1');
				}
				else if($res->role=="3"){
					$this->redirect('index.php?op=guestHome');
					session_start();
					$_SESSION['user']=$res;
					$_SESSION['event']=$events[0];
					$_SESSION['tempList']=array();
				}
				else{
					$this->redirect('index.php?op=atHome');
					session_start();
					$_SESSION['user']=$res;
					$_SESSION['event']=$events[0];
					$_SESSION['tempList']=array();
				}
				return $res;
			} catch (ValidationException $e) {
			$errors = $e->getErrors();
			}
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
	include 'application/view/login.php';
	}
    public function listContacts() {
		$errors = array();
		$scontacts=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}
		$orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
		$contacts = $this->contactsService->getAllContacts($orderby);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/contacts.php';
    }
	public function getColleges() {
		$errors = array();
		$college      = isset($_GET['q'])?   $_GET['q'] :NULL; 
		$colleges = $this->contactsService->getAllColleges($college);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/searchCollege.php';
    }
    public function showActivities() {
        $contactactivites = $this->contactsService->getAllActivities();
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/activities.php';
    }
	 public function showProfile2() {
		session_start();
		$myActivities = $this->contactsService->getMyActivities($_SESSION['user']->id);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/profile2.php';
    }
	public function showPanels() {
        $panels = $this->contactsService->getPanelDetails();
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/panels.php';
    }
	public function showPanelsPie() {
        $panels = $this->contactsService->getPanelDetails();
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/panelspie.php';
    }
	public function showLineChart() {
        $panels2 = $this->contactsService->getLineChartDetails();
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/linechart2.php';
    }	
    public function saveContact() {
		$events = $this->contactsService->getEventsCutOff();		
		if($events[0]->isRegComplete == 1)
		{
			$this->redirect('index.php');
		}
        $title = 'Add New Candidate';
        $fname = '';
		$lname = '';
        $mobile = '';
        $email = '';
		$dob='';
		$gender = '';
		$college = '';
		$ssc = '';
		$inter = '';
		$degree = '';
		$yearPassed = '';
		$currentCompany = '';
		$yearsOfExp = '';
		$source = '';
        $errors = array();
        $genders = $this->contactsService->getAllGenders();
		$streams = $this->contactsService->getAllStreams();
		$qualifications = $this->contactsService->getAllQualifications();
        if ( isset($_POST['form-submitted']) ) {
            $fname       = isset($_POST['fname']) ?   $_POST['fname']  :NULL;
			$lname       = isset($_POST['lname']) ?   $_POST['lname']  :NULL;
            $mobile      = isset($_POST['mobile'])?   $_POST['mobile'] :NULL;
            $email      = isset($_POST['l_email'])?   $_POST['l_email'] :NULL;
			$dob      = isset($_POST['dob'])?   $_POST['dob'] :NULL;
			$gender      = isset($_POST['gender'])?   $_POST['gender'] :NULL;
			$college    = isset($_POST['college'])? $_POST['college']:NULL;
			$qualification      = isset($_POST['qualification'])?   $_POST['qualification'] :NULL;
			$stream      = isset($_POST['stream'])?   $_POST['stream'] :NULL;
			$ssc      = isset($_POST['ssc'])?   $_POST['ssc'] :NULL;
			$inter      = isset($_POST['inter'])?   $_POST['inter'] :NULL;
			$degree      = isset($_POST['degree'])?   $_POST['degree'] :NULL;
			$yearPassed      = isset($_POST['yearPassed'])?   $_POST['yearPassed'] :NULL;
			$currentCompany      = isset($_POST['currentCompany'])?   $_POST['currentCompany'] :NULL;
			$yearsOfExp      = isset($_POST['yearsOfExp'])?   $_POST['yearsOfExp'] :NULL;
			$source      = isset($_POST['source'])?   $_POST['source'] :NULL;
            try {
                $res = $this->contactsService->createNewContact($fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source);
				$resUpdate = $this->contactsService->updateContactRegID($res);
                $this->redirect('index.php?op=success&id='.$res);
                return $res;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        $events = $this->contactsService->getEventsCutOff();
		$xyz = $this->contactsService->getCount();		
		$rounds=$this->contactsService->getRounds();
        include 'application/view/contact-form.php';
    }
	public function showMsg() {
		$id = isset($_GET['id'])?$_GET['id']:NULL;
		$msg = isset($_POST['msg']) ? $_POST['msg']:NULL;
		if ( !$id ) {
            throw new Exception('Internal error.');
        }
    }
    public function deleteContact() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $this->contactsService->deleteContact($id);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        $this->redirect('index.php');
    }
    public function showContact() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $contact = $this->contactsService->getContact($id);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        include 'application/view/contact.php';
    }
    public function showContactSuccess() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $contact = $this->contactsService->getContact($id);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        include 'application/view/success.php';
    }
    public function showError($title, $message) {
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        include 'application/view/error.php';
    }
	 public function showStatus() {
		$errors=array();
		$regId2 = isset($_POST['rID'])? $_POST['rID'] :NULL;
		$regemail = isset($_POST['remail'])? $_POST['remail'] :NULL;
		try{
			$events = $this->contactsService->getEventsCutOff();
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		$prefixEve=$events[0]->evtDM;
		$regId=$prefixEve."".$regId2;
		try{
			$scontacts = $this->contactsService->getSearchContact($regId,$regemail); 
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/search.php';
    }
	public function homeDetails($val,$toggle) {
		$errors=array();
		if($toggle == "chart"){
			try{
				$hDetails = $this->contactsService->getHomeDetailsChart($val);	
			}catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
			include 'application/view/homeDetailsChart.php';
		}
		else{
			try{
				$hDetails = $this->contactsService->getHomeDetails($val);	
			}catch (ValidationException $e) {
				$errors = $e->getErrors();
			}
			$xyz = $this->contactsService->getCount();
			$rounds=$this->contactsService->getRounds();
		include 'application/view/homeDetails.php';
		
		}
    }
	public function homeDetailsEvent($val,$toggle) {
		$errors=array();
		try{
			$hDetails = $this->contactsService->getHomeDetailsEventChart($val);	
			//print_r($hDetails);
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		include 'application/view/homeDetailsEventChart.php';		
    }	
	public function getSettings($source,$val) {	
		$errors=array();	
		$xyz = $this->contactsService->getCount();
		try{
			if($val==""){
				$settingFor=array();
			}
			else{
				$settingFor = $this->contactsService->getSettingsFor($source,$val); 
			}
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		if($source == "event"){
			include 'application/view/formEvent.php';
		}
		elseif($source=="status"){
			$emailTemps = $this->contactsService->getEmailTemplates();
			$states=$this->contactsService->getAllStates();
			include 'application/view/formStatus.php';
		}
		elseif($source=="email"){
			include 'application/view/formEmail.php';
		}
		elseif($source=="people"){
			$roles = $this->contactsService->getRoles();
			$staffLst=$this->contactsService->getStaffDetails();
			include 'application/view/formPerson.php';
		}
		elseif($source=="statusNewDef"){
			$emailTemps = $this->contactsService->getEmailTemplates();
			$states=$this->contactsService->getAllStates();
			include 'application/view/formNewStatusDef.php';
		}	
		elseif($source=="candidateDetail"){
			$qualifications=$this->contactsService->getAllQualifications();
			$streams=$this->contactsService->getAllStreams();
			$genders=$this->contactsService->getAllGenders();
			include 'application/view/formCandidate.php';
		}		
		else{
			include 'application/view/form.php';
		}
    }
	public function getIncluded($source) {
		$errors=array();	
		$xyz = $this->contactsService->getCount();
		$statusDefs = $this->contactsService->getStatusDefinitions();
		include 'application/view/formStatusInc.php';
    }
	
	public function homeDetailsBySelection($source,$val) {
		$errors=array();	
		try{
			$hDetails = $this->contactsService->getHomeDetailsBySelection($source,$val); 
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/homeDetailsBySelection.php';
    }
	public function loadSessionListDetails($val)
	{
		$bulkList=json_decode($val);
		session_start();
		$type = isset($_GET['type'])?$_GET['type']:NULL;
		if($type=="1"){
			$_SESSION['tempList']=$bulkList;
		}
		if($type=="2"){
			$_SESSION['tempList']=array();
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/bulkUpdateList.php';
	}
	public function showByStatus($status3,$status4,$type) {		
		$errors=array();
		session_start();
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}		
		$statusContacts = $this->contactsService->getContactsByStatus($status3,$status4,$type);
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
        include 'application/view/statusDetails.php';
    }
	public function updateBulkList($activities,$bulkStatus,$bulkComment){	
		session_start();
		$user=$_SESSION['user']->id;
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		$updtList = $this->contactsService->updateBulkList($activities,$user,$bulkStatus,$bulkComment);
	} 
	public function showByStats(){	
		session_start();		
		if(!isset($_SESSION['user'])){
			$this->redirect('index.php?op=login');
		}	
		$errors=array();	
		try{
			$stats = $this->contactsService->getByStats();
		}catch (ValidationException $e) {
			$errors = $e->getErrors();
		}
		$xyz = $this->contactsService->getCount();
		$rounds=$this->contactsService->getRounds();
		include 'application/view/stats.php';
	} 	
}
?>
