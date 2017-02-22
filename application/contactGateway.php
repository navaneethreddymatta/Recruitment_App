<?php

/**
 * Table data gateway.
 * 
 *  OK I'm using old MySQL driver, so kill me ...
 *  This will do for simple apps but for serious apps you should use PDO.
 */
class ContactsGateway {
	public function selectAll($order) {
		//$ini_array = parse_ini_file("assets/ini/events.ini");
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		if ( !isset($order) ) {
			$order = "fname";
		}
		$dbOrder =  mysql_real_escape_string($order);
		$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName FROM candidates t1,qualifications t2,streams t3, status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.status = t4.id AND t1.event=$event");
		$contacts = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$contacts[] = $obj;			
		}
		return $contacts;
	}
	public function selectById($id) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbId = mysql_real_escape_string($id);
		$dbres = mysql_query("SELECT * FROM candidates WHERE id=$dbId and event=$event");
		return mysql_fetch_object($dbres);
    }
	public function getSettingsFor($source,$val) {
		$dbId = mysql_real_escape_string($val);
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		if($source=="event"){
			$dbres = mysql_query("SELECT * FROM events WHERE id=$dbId");
		}
		if($source=="status"){
			$dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.emailTemplate,s.emailLabel ,e.name as emailTemplateName FROM status as s, emails as e WHERE s.id=$dbId and s.event=$event and e.id=s.emailTemplate");
		}
		if($source=="email"){
			$dbres = mysql_query("SELECT * FROM emails WHERE id=$dbId");
		}
		if($source=="people"){
			$dbres = mysql_query("SELECT * FROM staff WHERE id=$dbId");
		}
		if($source=="statusNewDef"){
			$dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.roundName,s.ordinal,s.emailTemplate,s.emailLabel ,e.name as emailTemplateName FROM statusdefinitions as s, emails as e WHERE s.id=$dbId and e.id=s.emailTemplate");
		}
		return mysql_fetch_object($dbres);
	}
	public function getStatusDefinitions() {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbres = mysql_query("SELECT distinct d.roundName,d.round, (select count(*) from status s where s.event= $event and s.round=d.round) as cnt FROM statusdefinitions d");
		$definitions = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$definitions[] = $obj;
		}
		return $definitions;
	}
	public function getCurrentRounds() {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbres = mysql_query("SELECT distinct round FROM status where event=$event");
		$rounds = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$rounds[] = $obj;
		}
		return $rounds;
	}
	
	public function deleteStatuses($val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		//echo "DELETE FROM status where event=$event and round=$val";
		$dbres = mysql_query("DELETE FROM status where event=$event and round=$val");
		return $dbres;
	}
	
	public function insertStatuses($val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbres2 = mysql_query("SELECT * FROM statusdefinitions where round=$val");
		$statuses = array();
		while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
			$statuses[] = $obj;
		}
		//echo count($statuses);
		foreach($statuses as $status)
		{
			$dbres1 = mysql_query("insert into status (name,displayName,state,round,emailTemplate,emailLabel,definition,event) select name,displayName,state,round,emailTemplate,emailLabel,id,'$event' from statusdefinitions d where d.id=$status->id");
			//echo "insert into status (name,displayName,state,round,emailTemplate,emailLabel,definition,event) select name,displayName,state,round,emailTemplate,emailLabel,id,'$event' from statusdefinitions d where d.id=$status->id<br>";
		}
		return $dbres2;
	}
	
	public function checkCredentials($email,$password) {
		$dbEmail = "'".mysql_real_escape_string($email)."'";
		$dbPassword = "'".mysql_real_escape_string($password)."'";
		$dbres = mysql_query("SELECT * FROM staff WHERE username=$dbEmail and password=$dbPassword");
		return mysql_fetch_object($dbres);
	}
	public function selectByEMD($email,$mobile) {		
		$dbEmail = "'".mysql_real_escape_string($email)."'";
		$dbMobile = "'".mysql_real_escape_string($mobile)."'";
		$dbres = mysql_query("SELECT * FROM candidates WHERE email=$dbEmail or mobile=$dbMobile");
		$scontacts = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$scontacts[] = $obj;
		}
		return $scontacts;
	}
	public function getEventsCutOff() {        
		$dbres = mysql_query("SELECT id,evtCutOff,evtYearFrom,evtYearTo,evtDate,evtDM,isEmail,isRegComplete FROM events WHERE isActive=1");
		$details = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$details[] = $obj;
		}
		return $details;
	}	
	public function selectByStatus($status,$status1,$type) {	
		/*$ini_array = parse_ini_file("assets/ini/events.ini");
		$event=$ini_array['event'];*/
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$state1 = "'".mysql_real_escape_string($status)."'";
		$state2 = "'".mysql_real_escape_string($status1)."'";
		$type = "'".mysql_real_escape_string($type)."'"; 	
		$dbres = mysql_query("SELECT c.*,s.displayName as statusName,c1.status as c1status,c1.score as score, $type as type FROM candidates c,status s, candidateactivities c1 WHERE (c1.status=$state1 && c1.status=s.id && c.id=c1.cid && c1.event=$event) || (c1.status=$state2 && c1.status=s.id && c.id=c1.cid && c1.event=$event)");        
		$qcontacts = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$qcontacts[] = $obj;
		}        
		return $qcontacts;
    }
	public function selectBySearch($search,$email) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($search)."'";
		$dbEmail = "'".mysql_real_escape_string($email)."'";
		if($email=="Any"){
			$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName FROM candidates t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.regId=$dbSearch AND t1.status = t4.id AND t1.event=$event ");
		}
		else{
			$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName FROM candidates t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.regId=$dbSearch AND t1.email=$dbEmail AND t1.status = t4.id AND t1.event=$event ");
		}
        $scontacts = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $scontacts[] = $obj;
			$acts = $this->selectAllActivitiesbyId($obj->regId);
			$scontacts['activities'] = $acts;
		}
		return $scontacts;
    }
	public function getAllHomeDetails($val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbSearch = "'".mysql_real_escape_string($val)."'";
		if($val == "college"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, college as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates WHERE event=$event GROUP BY college");
		}
		if($val == "stream"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, s.name as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates, streams as s where stream=s.id and event=$event GROUP BY stream");
		}
		if($val == "source"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val,source as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates  where  event=$event GROUP BY source");
		}
		if($val == "event"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, e.name as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates, events as e where event=e.id  GROUP BY event");
		}
		if($val == "person"){
			$dbres = mysql_query("select s.id as name,'person' as val,s.name as oname,$dbSearch as search,
			(select count(*) from candidates where isWritten=1 and weid=s.id and event =$event ) as WQ,(select count(*) from candidates where isWritten=0 and weid=s.id and event =$event) as WD,
			(select count(*) from candidates where isR1=1 and r1eid=s.id and event =$event) as R1Q,(select count(*) from candidates where isR1=0 and r1eid=s.id and event =$event) as R1D,
			(select count(*) from candidates where isR2=1 and r2eid=s.id and event =$event) as R2Q,(select count(*) from candidates where isR2=0 and r2eid=s.id and event =$event) as R2D,
			(select count(*) from candidates where isR3=1 and r3eid=s.id and event =$event) as R3Q,(select count(*) from candidates where isR3=0 and r3eid=s.id and event =$event) as R3D,
			(select count(*) from candidates where isR4=1 and r4eid=s.id and event =$event) as R4Q,(select count(*) from candidates where isR4=0 and r4eid=s.id and event =$event) as R4D,
			(select count(*) from candidates where isOnsite=1 and oneid=s.id and event =$event) as ONQ,(select count(*) from candidates where isOnsite=0 and oneid=s.id and event =$event) as OND,
			(select count(*) from candidates where isHR=1 and hreid=s.id and event =$event) as HQ,(select count(*) from candidates where isHR=0 and hreid=s.id and event =$event) as HD,
			(select count(*) from candidates where isFinal=1 and feid=s.id and event =$event) as FQ,(select count(*) from candidates where isFinal=0 and feid=s.id and event =$event) as FD
			 from staff s,candidates c where c.event=$event group by s.id");
		}
	    $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
	    return $hDetails;
    }
	public function getAllHomeDetailsChart($val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($val)."'";
		if($val == "college"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val,college as name,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 1) then 1 else null end) as FQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 0) then 1 else null end) as FD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1) then 1 else null end) as HQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 0) then 1 else null end) as HD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 ) then 1 else null end) as ONQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite =0) then 1 else null end) as OND,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1) then 1 else null end) as R4Q ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 0) then 1	else null end) as R4D,count(case	when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 0 ) then 1	else null end) as R3D ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 0 ) then 1 else null end ) as R2D,count(case	when(isWritten = 1 and isR1 = 0 ) then 1 else null end) as R1D,count(case when(isWritten = 0 ) then 1 else null end) as WD,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 ) then 1 else null end) as R3Q,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 ) then 1 else null end) as R2Q,count(case when(isWritten = 1 and isR1 = 1  ) then 1 else null end) as R1Q,count(case when(isWritten = 1  ) then 1 else null end) as WQ,$dbSearch as search from candidates WHERE event=$event GROUP BY college");
		}
		if($val == "stream"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, s.name as name,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 1) then 1 else null end) as FQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 0) then 1 else null end) as FD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1) then 1 else null end) as HQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 0) then 1 else null end) as HD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 ) then 1 else null end) as ONQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite =0) then 1 else null end) as OND,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1) then 1 else null end) as R4Q ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 0) then 1	else null end) as R4D,count(case	when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 0 ) then 1	else null end) as R3D ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 0 ) then 1 else null end ) as R2D,count(case	when(isWritten = 1 and isR1 = 0 ) then 1 else null end) as R1D,count(case when(isWritten = 0 ) then 1 else null end) as WD,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 ) then 1 else null end) as R3Q,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 ) then 1 else null end) as R2Q,count(case when(isWritten = 1 and isR1 = 1  ) then 1 else null end) as R1Q,count(case when(isWritten = 1  ) then 1 else null end) as WQ,$dbSearch as search from candidates,streams as s where stream=s.id and event=$event GROUP BY stream");
		}
		if($val == "source"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val,source as name,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 1) then 1 else null end) as FQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 0) then 1 else null end) as FD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1) then 1 else null end) as HQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 0) then 1 else null end) as HD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 ) then 1 else null end) as ONQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite =0) then 1 else null end) as OND,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1) then 1 else null end) as R4Q ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 0) then 1	else null end) as R4D,count(case	when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 0 ) then 1	else null end) as R3D ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 0 ) then 1 else null end ) as R2D,count(case	when(isWritten = 1 and isR1 = 0 ) then 1 else null end) as R1D,count(case when(isWritten = 0 ) then 1 else null end) as WD,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 ) then 1 else null end) as R3Q,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 ) then 1 else null end) as R2Q,count(case when(isWritten = 1 and isR1 = 1  ) then 1 else null end) as R1Q,count(case when(isWritten = 1  ) then 1 else null end) as WQ,$dbSearch as search from candidates WHERE event=$event GROUP BY source");
		}
		if($val == "event"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, e.name as name,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 1) then 1 else null end) as FQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1 and isFinal = 0) then 1 else null end) as FD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 1) then 1 else null end) as HQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 and isHR = 0) then 1 else null end) as HD ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite = 1 ) then 1 else null end) as ONQ ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1 and isOnsite =0) then 1 else null end) as OND,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 1) then 1 else null end) as R4Q ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 and isR4 = 0) then 1	else null end) as R4D,count(case	when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 0 ) then 1	else null end) as R3D ,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 0 ) then 1 else null end ) as R2D,count(case	when(isWritten = 1 and isR1 = 0 ) then 1 else null end) as R1D,count(case when(isWritten = 0 ) then 1 else null end) as WD,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 and isR3 = 1 ) then 1 else null end) as R3Q,count(case when(isWritten = 1 and isR1 = 1 and isR2 = 1 ) then 1 else null end) as R2Q,count(case when(isWritten = 1 and isR1 = 1  ) then 1 else null end) as R1Q,count(case when(isWritten = 1  ) then 1 else null end) as WQ,$dbSearch as search from candidates, events as e where event=e.id GROUP BY event");
		}
		if($val == "person"){
			$dbres = mysql_query("select s.id as name,'person' as val,s.name as oname,$dbSearch as search,
			(select count(*) from candidates where isWritten=1 and weid=s.id and event =$event) as WQ,(select count(*) from candidates where isWritten=0 and weid=s.id and event =$event) as WD,
			(select count(*) from candidates where isR1=1 and r1eid=s.id and event =$event) as R1Q,(select count(*) from candidates where isR1=0 and r1eid=s.id and event =$event) as R1D,
			(select count(*) from candidates where isR2=1 and r2eid=s.id and event =$event) as R2Q,(select count(*) from candidates where isR2=0 and r2eid=s.id and event =$event) as R2D,
			(select count(*) from candidates where isR3=1 and r3eid=s.id and event =$event) as R3Q,(select count(*) from candidates where isR3=0 and r3eid=s.id and event =$event) as R3D,
			(select count(*) from candidates where isR4=1 and r4eid=s.id and event =$event) as R4Q,(select count(*) from candidates where isR4=0 and r4eid=s.id and event =$event) as R4D,
			(select count(*) from candidates where isOnsite=1 and oneid=s.id and event =$event) as ONQ,(select count(*) from candidates where isOnsite=0 and oneid=s.id and event =$event) as OND,
			(select count(*) from candidates where isHR=1 and hreid=s.id and event =$event) as HQ,(select count(*) from candidates where isHR=0 and hreid=s.id and event =$event) as HD,
			(select count(*) from candidates where isFinal=1 and feid=s.id and event =$event)  as FQ,(select count(*) from candidates where isFinal=0 and feid=s.id and event =$event) as FD
			from staff s,candidates c where c.event =$event group by s.id");
		}		
        $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
		return $hDetails;
    }
	public function getAllHomeDetailsBySelection($source,$val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($val)."'";
		$dbSource = mysql_real_escape_string($source);
		if($source=="source"){
			$dbres = mysql_query("SELECT regId,c.id as id1,fname,lname,email,mobile,s.id as statusID ,s.displayName as status from candidates c,status s where c.source=$dbSearch and  c.status=s.id and c.event=$event");
		}
		if($source=="college"){
			$dbres = mysql_query("SELECT regId,c.id as id1,fname,lname,email,mobile,s.id as statusID ,s.displayName as status from candidates c,status s  where c.college=$dbSearch and  c.status=s.id and event=$event");
		}
		if($source=="stream"){
			$dbres = mysql_query("SELECT regId,c1.id as id1,fname,lname,email,mobile,s.id as statusID ,s.displayName as status from candidates c1,streams as c,status s  where c1.stream=c.id and c.name=$dbSearch and  c1.status=s.id and event=$event");
		}
		if($source=="event"){
			$dbres = mysql_query("SELECT regId,c1.id as id1,fname,lname,email,mobile,s.id as statusID ,s.displayName as status from candidates c1,events as c,status s  where c1.event=c.id and c.name=$dbSearch and  c1.status=s.id and c1.event=$event");
		}
		if($source=="person"){		
			$dbres = mysql_query("SELECT c.id as id1,c.fname,c.lname,c.regId,c.mobile,s.id as statusID ,s.displayName as status,c.email from candidates c,status s where (weid=$val or r1eid=$val or r2eid=$val or r3eid=$val or r4eid=$val or oneid=$val or hreid=$val or feid=$val) and c.event=$event and  c.status=s.id ") ;
		}
        $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
		return $hDetails;
    }
	public function selectBySearchID($search) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($search)."'";
        $dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName FROM candidates t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.id=$dbSearch AND t1.status = t4.id AND t1.event=$event");
		$scontacts = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $scontacts[] = $obj;
			$acts = $this->selectAllActivitiesbyId($obj->regId);
			$scontacts['activities'] = $acts;
		}
		return $scontacts;
    }
    public function setEvent($id,$name,$location,$details,$cutoff,$passout,$idpref,$active,$email,$isRegComplete) {
        $dbName = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
		$dbLocation = ($location != NULL)?"'".mysql_real_escape_string($location)."'":'NULL';
        $dbDetails = ($details != NULL)?"'".mysql_real_escape_string($details)."'":'NULL';
        $dbCutoff = ($cutoff != NULL)?"'".mysql_real_escape_string($cutoff)."'":'NULL';
		$dbPassout = ($passout != NULL)?"'".mysql_real_escape_string($passout)."'":'NULL';
		$dbIdpref = ($idpref != NULL)?"'".mysql_real_escape_string($idpref)."'":'NULL';
		$dbActive = ($active != NULL)?"'".mysql_real_escape_string($active)."'":'NULL';
		$dbEmail = ($email != NULL)?"'".mysql_real_escape_string($email)."'":'NULL';
		$dbIsRegComplete = ($isRegComplete != NULL)?"'".mysql_real_escape_string($isRegComplete)."'":'NULL';
		$dbToday = date("Y-m-d H:i:s");
		$dbToday="'".mysql_real_escape_string($dbToday)."'";
		$dbres= mysql_query("SELECT * from events where isActive='1'");
		if($dbActive=="'NULL'" || count($dbres)==0){
			$dbActive='1';
		}
		else{
			$dbres= mysql_query("UPDATE events SET isActive=NULL");
			$dbActive='1';
		}
		if($id=="" || $id==NULL){			
			mysql_query("INSERT INTO events (name,location, evtDetails, evtCutOff,evtYearFrom,evtDM,isActive,evtDate,isEmail,isRegComplete) VALUES ($dbName,$dbLocation, $dbDetails, $dbCutoff,$dbPassout,$dbIdpref,$dbActive,$dbToday,$dbEmail,$dbIsRegComplete)");
			
		}
		else{
			mysql_query("UPDATE events SET name=$dbName , location=$dbLocation, evtDetails=$dbDetails, evtCutOff=$dbCutoff, evtYearFrom=$dbPassout, evtDM=$dbIdpref, isActive=$dbActive,isEmail=$dbEmail, isRegComplete=$dbIsRegComplete WHERE id=$id");
		}
        return mysql_insert_id();
    }
	public function setStatus($id,$name,$displayname,$state,$emailTemp,$emailLbl)	{		        
		$dbname = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
        $dbdisplayname = ($displayname != NULL)?"'".mysql_real_escape_string($displayname)."'":'NULL';
        $dbstate = ($state != NULL)?"'".mysql_real_escape_string($state)."'":'NULL';
		$dbemailTemp = ($emailTemp != NULL)?"'".mysql_real_escape_string($emailTemp)."'":'NULL';
		$dbemailLbl = ($emailLbl != NULL)?"'".mysql_real_escape_string($emailLbl)."'":'NULL';
		if($id=="" || $id==NULL){
			mysql_query("INSERT INTO status (name,displayName, state, emailTemplate,emailLabel) VALUES ($dbname,$dbdisplayname, $dbstate, $dbemailTemp,$dbemailLbl)");
		}
		else{
			mysql_query("UPDATE status SET name=$dbname , displayName=$dbdisplayname, state=$dbstate, emailTemplate=$dbemailTemp, emailLabel=$dbemailLbl WHERE id=$id");
		}
        return mysql_insert_id();
    }
	public function setEmail($id,$name,$subject,$body){		        
		$dbname = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
        $dbsubject = ($subject != NULL)?"'".mysql_real_escape_string($subject)."'":'NULL';
        $dbbody = ($body != NULL)?"'".mysql_real_escape_string($body)."'":'NULL';		
		if($id=="" || $id==NULL){
			mysql_query("INSERT INTO emails (name,subject,body) VALUES ($dbname,$dbsubject, $dbbody)");
		}
		else{
			mysql_query("UPDATE emails SET name=$dbname , subject=$dbsubject, body=$dbbody WHERE id=$id");
		}
        return mysql_insert_id();
    }
	public function setPerson($id,$name,$username,$role,$password)	{		        
		$dbname = ($name != NULL)?"'".mysql_real_escape_string($name)."'":'NULL';
        $dbusername = ($username != NULL)?"'".mysql_real_escape_string($username)."'":'NULL';
        $dbrole = ($role != NULL)?"'".mysql_real_escape_string($role)."'":'NULL';		
		$dbpassword = ($password != NULL)?"'".mysql_real_escape_string($password)."'":'NULL';		
		if($id=="" || $id==NULL){
			mysql_query("INSERT INTO staff (name,username,password,role) VALUES ($dbname,$dbusername,$dbpassword, $dbrole)");
		}
		else{
			mysql_query("UPDATE staff SET name=$dbname , username=$dbusername,password=$dbpassword, role=$dbrole WHERE id=$id");
		}
        return mysql_insert_id();
    }
	public function setStatusDefinition($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl)	{		        		
        $dbdisplayname = ($displayname != NULL)?"'".mysql_real_escape_string($displayname)."'":'NULL';
		$dbroundname = ($roundname != NULL)?"'".mysql_real_escape_string($roundname)."'":'NULL';
        $dbstate = ($state != NULL)?"'".mysql_real_escape_string($state)."'":'NULL';
		$dbemailTemp = ($emailTemp != NULL)?"'".mysql_real_escape_string($emailTemp)."'":'NULL';
		$dbemailLbl = ($emailLbl != NULL)?"'".mysql_real_escape_string($emailLbl)."'":'NULL';
		/*if($id=="" || $id==NULL){
			$dbres = mysql_query("SELECT * FROM state where id!='1'");
			$states = array();
			while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
				$states[] = $obj;
			}
			$dbres1 = mysql_query("SELECT MAX(round) as highestRound FROM statusDefinitions");
			$dbround=$dbres1 
			foreach($states as $state)
			{
				mysql_query("INSERT INTO statusdefinitions (name,displayName,roundName,round, state, emailTemplate,emailLabel,ordinal) VALUES ($state->displayName,$state->displayName,$dbdisplayname,round $state->id, $state->emailTemp,$dbdisplayname,ordinal)");
				
			}
			
		}
		else{
			mysql_query("UPDATE status SET name=$dbname , displayName=$dbdisplayname, state=$dbstate, emailTemplate=$dbemailTemp, emailLabel=$dbemailLbl WHERE id=$id");
		}*/
        return mysql_insert_id();
    }
    public function insert( $fname,$lname, $mobile, $email,$dob,$gender, $college, $qualification, $stream, $ssc, $inter, $degree, $yearPassed, $currentCompany,$yearsOfExp, $source,$event ) {
        $dbFName = ($fname != NULL)?"'".mysql_real_escape_string($fname)."'":'NULL';
		$dbLName = ($lname != NULL)?"'".mysql_real_escape_string($lname)."'":'NULL';
        $dbMobile = ($mobile != NULL)?"'".mysql_real_escape_string($mobile)."'":'NULL';
        $dbEmail = ($email != NULL)?"'".mysql_real_escape_string($email)."'":'NULL';
		$dbDob = ($dob != NULL)?"'".mysql_real_escape_string($dob)."'":'NULL';
		$dbGender = ($gender != NULL)?"'".mysql_real_escape_string($gender)."'":'NULL';
		$dbCollege = ($college != NULL)?"'".mysql_real_escape_string($college)."'":'NULL';
		$dbQualification = ($qualification != NULL)?"'".mysql_real_escape_string($qualification)."'":'NULL';
		$dbStream = ($stream != NULL)?"'".mysql_real_escape_string($stream)."'":'NULL';
		$dbSSC = ($ssc != NULL)?"'".mysql_real_escape_string($ssc)."'":'NULL';
		$dbInter = ($inter != NULL)?"'".mysql_real_escape_string($inter)."'":'NULL';
		$dbDegree = ($degree != NULL)?"'".mysql_real_escape_string($degree)."'":'NULL';
        $dbYearPassed = ($yearPassed != NULL)?"'".mysql_real_escape_string($yearPassed)."'":'NULL';
		$dbCurrentCompany = ($currentCompany != NULL)?"'".mysql_real_escape_string($currentCompany)."'":'NULL';
		$dbYearsOfExp = ($yearsOfExp != NULL)?"'".mysql_real_escape_string($yearsOfExp)."'":'NULL';
		$dbSource = ($source != NULL)?"'".mysql_real_escape_string($source)."'":'NULL';
		$dbEvent = ($event != NULL)?"'".mysql_real_escape_string($event)."'":'NULL';
		mysql_query("INSERT INTO candidates (fname,lname, mobile, email,dob,gender,college,qualification,stream,ssc,inter,degree,yearPassed,currentCompany,yearsOfExperience,source,status,event) VALUES ($dbFName,$dbLName, $dbMobile, $dbEmail,$dbDob,$dbGender,$dbCollege,$dbQualification,$dbStream,$dbSSC,$dbInter,$dbDegree,$dbYearPassed,$dbCurrentCompany,$dbYearsOfExp, $dbSource,1,$dbEvent)");
        return mysql_insert_id();
    }
    public function updateContactReg( $res ) {
        date_default_timezone_set('Asia/Calcutta'); 
		$dbToday = date("d-m-Y H:i:s");
		$regID = date("dm");
		$events=$this->getEventsCutOff();
		$event=$events[0];
		if($event->evtDM != null && $event->evtDM != ""){
			$regID = $event->evtDM;
		}
		$id=(int)($res);
		$nid=$id;
		if($id<10){
			$nid="000".$id;
		}
		else if($id>=10 && $id<99){
			$nid="00".$id;
		}
		else if($id>=100 && $id<999){
			$nid="0".$id;
		}
		else{
			$nid=$id;
		}
		$dbMod=$id % 3;
		if($dbMod == 0){
			$dbSet='C';
		}
		else if($dbMod == 1){
			$dbSet='A';
		}
		else{
			$dbSet='B';
		}
		$dbRegId = $regID."".$nid;
		$dbRegId="'".mysql_real_escape_string($dbRegId)."'";
		$dbToday="'".mysql_real_escape_string($dbToday)."'";
		$res="'".mysql_real_escape_string($res)."'";
		mysql_query("UPDATE candidates SET regId=$dbRegId , regDate=$dbToday, paper='$dbSet' WHERE id=$res");
		$resu=$this->getEmailDetails($id,'1');
        return mysql_insert_id();
    }
    public function delete($id) {
        $dbId = mysql_real_escape_string($id);
        mysql_query("DELETE FROM candidates WHERE id=$dbId");
    }
    public function selectAllGenders() {
        $order = "name";
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM genders ORDER BY $dbOrder ASC");
        $genders = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $genders[] = $obj;
        }
        return $genders;
    }
	public function selectAllStreams() {
        $order = "name";
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM streams ORDER BY $dbOrder ASC");
        $streams = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $streams[] = $obj;
        }
        return $streams;
    }
	public function selectAllQualifications() {
        $order = "name";
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM qualifications ORDER BY $dbOrder ASC");
        $qualifications = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $qualifications[] = $obj;
        }
        return $qualifications;
    }
	public function selectAllActivities() {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT c1.*,s1.name as staff,c2.regId as regId,s2.displayName as statusName,s2.state as state FROM candidateactivities c1,staff s1,candidates c2,status s2  where c1.cid=c2.id AND c1.eid=s1.id AND c1.status=s2.id and c1.event=$event ORDER BY id DESC limit 8");
        $candidateactivities = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $candidateactivities[] = $obj;
        }
        return $candidateactivities;
    }
	public function showAllPanels() {
        $ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$panels = array();
		$dbres = mysql_query("select count(id) as total,count(case when(isWritten=0) then 1 else null END) as isWT,count(case when(isR1=0) then 1 else null END) as isR1,count(case when(isR2=0) then 1 else null END) as isR2,count(case when(isR3=0) then 1 else null END) as isR3,count(case when(isR4=0) then 1 else null END) as isR4,count(case when(isOnsite=0) then 1 else null END) as isOnsite,count(case when(isHR=0) then 1 else null END) as isHR,count(case when(isFinal=0) then 1 else null END) as isFinal from candidates where event = $event");
        $panels[] = mysql_fetch_object($dbres);
        return $panels;
    }
	
	public function getCount() {
        $ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$panels = array();
		$dbres = mysql_query("select count(id) as total from candidates where event = $event");
        $panels[] = mysql_fetch_object($dbres);
        return $panels;
    }
	public function showAllLinePanels() {
        /*$ini_array = parse_ini_file("assets/ini/events.ini");
		$event=$ini_array['event'];*/
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;		
		$panels = array();
		$query = "select distinct count(id) as total,";
		$events=$this->getEventsCutoffs();
		$event=$events[0]->id;
		$rounds[]=array();
		$dbres="select distinct round from status where event = $event and round != 0";
		while ( ($round = mysql_fetch_object($dbres)) != NULL ) {
            $rounds[] = $obj;
        }		
		for($i=1;i<$rounds.length;$i++)
		{
		 $query = $query .  "count(case when(round = $rounds[$i] and isRejected != 1) then 1 else null END as R".$i."Progress,
		 count(case when(round = $rounds[$i] and isRejected != 1) then 1 else null END) as isR".$i;
		 if($i == $rounds.length)
		 {
		  $query = $query . ",";
		 }
		}
		$query = $query . "from candidates where event=" . $event;
		$dbres=$query;	
        return $panels;
    }
	public function selectAllActivitiesbyId($regId) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($regId)."'";
		$dbres = mysql_query("SELECT c1.*,s1.name as staff,c2.regId as regId,s2.displayName as statusName FROM candidateactivities c1,staff s1,candidates c2,status s2  where c1.cid=c2.id AND c1.eid=s1.id AND c1.status=s2.id AND c2.regId=$dbSearch AND c1.event=$event ORDER BY id DESC ");
        $candidateactivities = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $candidateactivities[] = $obj;
        }
        return $candidateactivities;
    }
	public function insertMsg($Id,$ptweet,$status,$pscore) {
		/*$eventsArray = parse_ini_file("assets/ini/events.ini");
		$event=$eventsArray['event'];*/
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$Id = mysql_real_escape_string($Id);
		$ptweet = "'".mysql_real_escape_string($ptweet)."'";
		$status = mysql_real_escape_string($status);
		$pscore = mysql_real_escape_string($pscore);
		$event = mysql_real_escape_string($event);
		/*echo "<pre>";
		echo "Status is";*/
		/*print_r($status);*/
		$user = $_SESSION['user']->id;
		date_default_timezone_set("Asia/Kolkata"); 
		$tstamp = date('d-m-Y H:i:s');
		$result = mysql_query("INSERT INTO candidateactivities (cid,eid,stime,score,status,comment,event) VALUES ($Id,$user,'$tstamp',$pscore,$status,$ptweet,$event)");
		if($status == '3' || $status == '4'){
			if($status == '3')
				$result1 = mysql_query("UPDATE candidates SET status=$status, written=$pscore,isWritten=0, weid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, written=$pscore,isWritten=1, weid=$user WHERE id=$Id");
		}
		else if($status == '5' || $status == '6'){
			if($status == '5')
				$result1 = mysql_query("UPDATE candidates SET status=$status, round1=$pscore,isR1=0, r1eid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, round1=$pscore,isR1=1, r1eid=$user WHERE id=$Id");
		}
		else if($status == '7' || $status == '8'){
			if($status == '7')
				$result1 = mysql_query("UPDATE candidates SET status=$status, round2=$pscore,isR2=0, r2eid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, round2=$pscore,isR2=1, r2eid=$user WHERE id=$Id");
		}
		else if($status == '9' || $status == '10'){
			if($status == '9')
				$result1 = mysql_query("UPDATE candidates SET status=$status, round3=$pscore,isR3=0, r3eid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, round3=$pscore,isR3=1, r3eid=$user WHERE id=$Id");
		}
		else if($status == '11' || $status == '12'){
			if($status == '11')
				$result1 = mysql_query("UPDATE candidates SET status=$status, round4=$pscore, isR4=0, r4eid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, round4=$pscore, isR4=1, r4eid=$user WHERE id=$Id");
		}
		else if($status == '13' || $status == '14'){
			if($status == '13')
				$result1 = mysql_query("UPDATE candidates SET status=$status, onsite=$pscore, isOnsite=0, oneid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, onsite=$pscore, isOnsite=1, oneid=$user WHERE id=$Id");
		}
		else if($status == '15' || $status == '16'){
			if($status == '15')
				$result1 = mysql_query("UPDATE candidates SET status=$status, hr=$pscore, isHR=0, hreid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, hr=$pscore, isHR=1, hreid=$user WHERE id=$Id");
		}	
		else if($status == '17' || $status == '18'){
			if($status == '17')
				$result1 = mysql_query("UPDATE candidates SET status=$status,  isFinal=0, feid=$user WHERE id=$Id");
			else
				$result1 = mysql_query("UPDATE candidates SET status=$status, isFinal=1, feid=$user WHERE id=$Id");
		}		
		else {
			$result1 = mysql_query("UPDATE candidates SET status=$status  WHERE id=$Id");
		}
		$resu=$this->getEmailDetails($Id,$status);
		return $result;
		 
	}
	public function getAllStatus($status) {	
		$status1 = $status+1;
		$status2 = $status+2;
		$status3 = $status+3;
		$order = "name";
		$selection =  mysql_query("SELECT state FROM status where id = $status");
		while ( ($obj = mysql_fetch_object($selection)) != NULL ) {
            $state = $obj->state;
        }
        $dbOrder =  mysql_real_escape_string($order);
		if($state == 3)
			$dbres = mysql_query("SELECT * FROM status where id = $status1 OR id= $status2 ORDER BY id DESC");
		else if($state == 1)
			$dbres = mysql_query("SELECT * FROM status where id = $status1 OR id= $status2 OR id = $status3 ORDER BY id DESC");
		else
			$dbres = mysql_query("SELECT * FROM status where id = $status1 ORDER BY id ASC");        
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}	
	public function getAllStatuses() {	
		$order = "name";
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM status");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getAllColleges($college) {	
        $dbCollege = "'%".mysql_real_escape_string($college)."%'";
        $dbres = mysql_query("SELECT college FROM candidates where college like $dbCollege GROUP BY college order by college");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getAllAStatuses() {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.emailTemplate ,e.name as emailTemplateName FROM status as s, emails as e WHERE s.event=$event and (e.id=s.emailTemplate or s.emailTemplate=NULL)");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}	
	public function getAllStatusDefinitions() {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.roundName,s.ordinal,s.emailTemplate ,e.name as emailTemplateName FROM statusdefinitions as s, emails as e WHERE e.id=s.emailTemplate or s.emailTemplate=NULL");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}	
	public function getAllStates() {	
        $dbres = mysql_query("SELECT id, name FROM state");
        $stateList = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $stateList[] = $obj;
        }
        return $stateList;
	}	
	public function getAllEvents() {	
        $dbres = mysql_query("SELECT * FROM events");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getEmailTemplates() {	
        $dbres = mysql_query("SELECT * FROM emails");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getRoles() {	
        $dbres = mysql_query("SELECT * FROM roles");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getStaffDetails() {	
        $dbres = mysql_query("SELECT s.*,r.name as rolename FROM staff s,roles r where s.role=r.id");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getAllMyActivities($loggedInUser){
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$result = mysql_query("select c1.*,s1.name as staff,c2.regId as regId,c2.fname as fname,c2.lname as lname,s2.displayName as statusName from candidateactivities c1,staff s1,candidates c2,status s2 where s1.id=c1.eid AND s1.id =$loggedInUser AND c2.id = c1.cid AND s2.id=c1.status AND c1.event=$event ORDER BY ID DESC");		
		$acts = array();
        while ( ($obj = mysql_fetch_object($result)) != NULL ) {
            $acts[] = $obj;
        }
		return $acts;
	}
	public function getAllSheets(){
		$ini_array = $this->getEventsCutOff();
		$dbevent=$ini_array[0]->id;
		$result = mysql_query("select c.regId,CONCAT(c.fname,' ',c.lname) as fullname,c.ssc,c.inter,c.degree,c.mobile,c.email,c.college,c.yearPassed,c.currentCompany,c.yearsOfExperience,c.source,c.paper as paper,s.name as stream,q.name as qualification from candidates c,streams s,qualifications q where c.stream=s.id AND c.qualification = q.id AND c.event=$dbevent ");		
		$sheets = array();
		while ( ($obj = mysql_fetch_object($result)) != NULL ) {
            $sheets[] = $obj;
        }
		return $sheets;
	}
	public function getCandidate($reg3){
		$ini_array = $this->getEventsCutOff();
		$dbregid = "'".mysql_real_escape_string($reg3)."'";
		$event=$ini_array[0]->id;
		$result = mysql_query("select id,regId,CONCAT(fname,' ',lname) as fullname,email from candidates where regId=$dbregid AND event=$event");		
		$sheets = array();
		while ( ($obj = mysql_fetch_object($result)) != NULL ) {
            $sheets[] = $obj;
        }
		if(count($sheets) == 0)
		{
			return null;
		}
		$candid=$sheets[0];
		return $candid;
	}
	public function sendEmail($to,$regId,$emailTemp,$firstName,$lastName) {
		$to1 = "nrm@flexeye.com";
		$reg=$regId;
		$fname=$firstName;
		$lname=$lastName;
		$fullName=$firstName." ".$lastName;
		$from = "vn@flexeye.com";
		$subject = $emailTemp->subject;
		$body = $emailTemp->body;
		$status=$emailTemp->name;
		$currStat=$emailTemp->emailLabel;
		$body=str_replace("--status--",$currStat,$body);
		$body=str_replace("--candidateid--",$fullName,$body);
		$body=str_replace("--XXXXX--",$reg,$body);
		$url = "https://dev4.in.flexeye.com/v1/sendMail_Default/send?to=".$to."&from=".$from."&subject=".urlencode($subject)."&body=".urlencode($body)."";
		$ch = curl_init($url);
		if ($ch) {
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLINFO_HEADER_OUT, false);
			curl_setopt( $ch, CURLOPT_HEADER,false);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch,CURLOPT_USERPWD,"emailUser:emailUser");
			curl_setopt($ch,CURLOPT_POSTFIELDS,"");
			curl_setopt($ch,CURLOPT_PROXY,"172.16.21.1:3128");
			$data = curl_exec ($ch);
			//echo $data;
			$myArray = json_decode($data, true);
			$result= $myArray['results'];
			$results =explode(" --- ",$result);
			if($results[0]=="Fail"){
				//echo "Cannot send email ".$results[1];
			}
			else if($results[0]=="Pass"){
				//echo "Email sent successfully";
			}
			else {
				//echo "Cannot do much about this";
			}
			curl_close($ch);
		}
		else{
			echo "cannot connect";
			curl_close($ch);
		}
        //include 'application/view/default.php';
    }
	public function getEmailDetails($tId,$status){
		$ini_array = $this->getEventsCutOff();
		$eventNotify=$ini_array[0]->isEmail;
		if($eventNotify == 1){
			$res = mysql_query("select s.id as sid,s.name as name,s.emailLabel as emailLabel, e.id as eid,e.subject as subject,e.body as body from status s, emails e where s.id=$status and s.emailTemplate = e.id");		
			$result = array();		
			while ( ($obj = mysql_fetch_object($res)) != NULL ) {
				$result[] = $obj;
			}
			$res1 = mysql_query("select id,regId,email,fname,lname from candidates where id=$tId");		
			$result1 = array();		
			while ( ($obj1 = mysql_fetch_object($res1)) != NULL ) {
				$result1[] = $obj1;
			}		
			if(count($result) > 0 && count($result1) > 0){
				$emailTemp=$result[0];			
				$to=$result1[0]->email;
				$regId=$result1[0]->regId;
				$firstName=$result1[0]->fname;
				$lastName=$result1[0]->lname;
				$this->sendEmail($to,$regId,$emailTemp,$firstName,$lastName);
			}		
		}
	}
	public function updateBulkList($activities,$user){
		date_default_timezone_set("Asia/Kolkata"); 
		$tstamp = date('d-m-Y H:i:s');
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		for($i=0;$i<count($activities);$i++){
			$activity=$activities[$i];
			$tId=$activity['id'];
			$tStatus=$activity['statusId'];
			$tScore=$activity['score'];
			$tComment=$activity['status'];
			$result = mysql_query("select id from candidateactivities where cid=$tId and status=$tStatus and event=$event");		
			$res = array();
			while ( ($obj = mysql_fetch_object($result)) != NULL ) {
				$res[] = $obj;
			}
			if(count($res) == 0){
				$result = mysql_query("INSERT INTO candidateactivities (cid,eid,stime,score,status,event,comment) VALUES ($tId,'$user','$tstamp',$tScore,$tStatus,$event,'$tComment')");
			}
			else{
				$result = mysql_query("UPDATE candidateactivities SET eid=$user, stime=$tstamp, score=$tScore, status=$tStatus,comment=$tComment WHERE cid=$tId and status=$tStatus");	
			}
			if($tStatus == 3 || $tStatus == 4){
				if($tStatus == 3)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, written=$tScore, isWritten=0, weid=$user WHERE id=$tId");				
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, written=$tScore, isWritten=1, weid=$user WHERE id=$tId");	
			}
			else if($tStatus == 5 || $tStatus == 6){
				if($tStatus == 5)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round1=$tScore, isR1=0, r1eid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round1=$tScore, isR1=1, r1eid=$user WHERE id=$tId");
			}
			else if($tStatus == 7 || $tStatus == 8){
				if($tStatus == 7)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round2=$tScore, isR2=0, r2eid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round2=$tScore, isR2=1, r2eid=$user WHERE id=$tId");
			}
			else if($tStatus == 9 || $tStatus == 10){
				if($tStatus == 9)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round3=$tScore, isR3=0, r3eid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round3=$tScore, isR3=1, r3eid=$user WHERE id=$tId");
			}
			else if($tStatus == 11 || $tStatus == 12){
				if($tStatus == 11)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round4=$tScore, isR4=0, r4eid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, round4=$tScore, isR4=1, r4eid=$user WHERE id=$tId");
			}
			else if($tStatus == 13 || $tStatus == 14){
				if($tStatus == 13)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, onsite=$tScore, isOnsite=0, oneid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, onsite=$tScore, isOnsite=1, oneid=$user WHERE id=$tId");
			}
			else if($tStatus == 15 || $tStatus == 16){
				if($tStatus == 15)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, finalStatus=$tScore, isFinal=0, feid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, finalStatus=$tScore, isFinal=1, feid=$user WHERE id=$tId");
			}
			else if($tStatus == 17 || $tStatus == 18){
				if($tStatus == 17)
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus, isFinal=0, feid=$user WHERE id=$tId");
				else
					$result1 = mysql_query("UPDATE candidates SET status=$tStatus isFinal=1, feid=$user WHERE id=$tId");
			}
			else{
				$result1 = mysql_query("UPDATE candidates SET status=$tStatus  WHERE id=$tId");
			}
			$resu=$this->getEmailDetails($tId,$tStatus);
		}
	}
	public function getAllRegIds(){
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$result = mysql_query("select c.regId as regId,c.status as status,s.state as state from candidates c, status s where c.status=s.id and c.event=$event");		
		$sheets = array();		
        while ( ($obj = mysql_fetch_object($result)) != NULL ) {
            $sheets[] = $obj;
        }
		if(count($sheets) == 0){
			return null;
		}
		return $sheets;
	}
	public function selectByStats() {
    	$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
	    $panels = array();
		$dbres = mysql_query("select count(id) as t1 from candidates where event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b where a.status = b.id and b.round=0 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b where a.status = b.id and b.round=1 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b where a.status = b.id and b.round=2 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b where a.status = b.id and b.round=3 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b where a.status = b.id and b.round=4 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);   
		$streamsM = array();
		$dbres = mysql_query("select * from streams" );
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$streams = array();           
			$sid = $obj->id;
			$dbresT = mysql_query("select count(id) as t1 from candidates where event=$event and stream = $sid" );
			$streams[] = mysql_fetch_object($dbresT);
			$dbresW = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b,candidates as c1 where a.status = b.id and b.round=0 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbresW);
			$dbres1 = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b,candidates as c1 where a.status = b.id and b.round=1 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres1);
			$dbres2 = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b,candidates as c1 where a.status = b.id and b.round=2 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres2);
			$dbres3 = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b,candidates as c1 where a.status = b.id and b.round=3 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres3);
			$dbres4 = mysql_query("select count(a.id) as t1 from candidateactivities as a, status as b,candidates as c1 where a.status = b.id and b.round=4 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres4);
			$streamsM[] = $streams;
		}
		$panels['streams'] = $streamsM ;		
        return $panels;
    }
}
?>