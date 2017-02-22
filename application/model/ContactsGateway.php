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
		$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName,t4.backgroundColor as bgColor FROM candidates_$event t1,qualifications t2,streams t3, status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.status = t4.id AND t1.event=$event");
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
		$dbres = mysql_query("SELECT * FROM candidates_$event WHERE id=$dbId and event=$event");
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
			$dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.roundName,s.ordinal,s.emailTemplate,s.emailLabel ,s.shortName as chartLabel,s.shortName2 as legendLabel,s.backgroundColor as colorValue, e.name as emailTemplateName FROM status as s, emails as e WHERE s.id=$dbId and s.event=$event and e.id=s.emailTemplate");
		}
		if($source=="email"){
			$dbres = mysql_query("SELECT * FROM emails WHERE id=$dbId");
		}
		if($source=="people"){
			$dbres = mysql_query("SELECT * FROM staff WHERE id=$dbId");
		}
		if($source=="statusNewDef"){
			$dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.roundName,s.ordinal,s.emailTemplate,s.emailLabel ,s.shortName as chartLabel,s.shortName2 as legendLabel,s.backgroundColor as colorValue,e.name as emailTemplateName FROM statusdefinitions as s, emails as e WHERE s.id=$dbId and e.id=s.emailTemplate");
		}
		if($source=="candidateDetail"){
			$dbres = mysql_query("SELECT * FROM candidates_$event WHERE regId='$dbId'");
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
			$dbres1 = mysql_query("insert into status (name,displayName,state,round,roundName,emailTemplate,emailLabel,definition,ordinal,event,shortName,shortName2,backgroundColor) select name,displayName,state,round,roundName,emailTemplate,emailLabel,id,ordinal,'$event',shortName,shortName2,backgroundColor from statusdefinitions d where d.id=$status->id");
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
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;	
		$dbEmail = "'".mysql_real_escape_string($email)."'";
		$dbMobile = "'".mysql_real_escape_string($mobile)."'";
		$numDays=$ini_array[0]->evtPriorAtnDays;
		if($numDays == null)
		{
			$numDays=180;
		}
		$dbres1=mysql_query("select * from events where evtDate > NOW() - INTERVAL $numDays DAY");
		$events=array();
		while ( ($obj = mysql_fetch_object($dbres1)) != NULL ) {
			$events[] = $obj;
		}
		$scontacts = array();
		for($j=0;$j<count($events);$j++)
		{
			$evtId=$events[$j]->id;
			//echo "SELECT * FROM candidates_$evtId WHERE email=$dbEmail or mobile=$dbMobile";
			$dbres = mysql_query("SELECT * FROM candidates_$evtId WHERE email=$dbEmail or mobile=$dbMobile");
			while ( ($obj1 = mysql_fetch_object($dbres)) != NULL ) {
				$scontacts[] = $obj1;
			}
		}
		//$dbres = mysql_query("SELECT * FROM candidates_$event WHERE email=$dbEmail or mobile=$dbMobile");
		//$scontacts = array();
		/*while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$scontacts[] = $obj;
		}*/
		return $scontacts;
	}
	public function getEventsCutOff() {        
		$dbres = mysql_query("SELECT id,evtCutOff,evtYearFrom,evtYearTo,evtDate,evtDM,isEmail,isRegComplete,evtPriorAtnDays FROM events WHERE isActive=1");
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
		$dbres = mysql_query("SELECT c.*,s.displayName as statusName,c1.status as c1status,c1.score as score, $type as type FROM candidates_$event c,status s, candidateactivities_$event c1 WHERE (c1.status=$state1 && c1.status=s.id && c.id=c1.cid && c1.event=$event) || (c1.status=$state2 && c1.status=s.id && c.id=c1.cid && c1.event=$event)");        
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
			$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName,t4.id as statusId,t4.round as roundId,t4.state as stateId,t4.ordinal as ordinalId FROM candidates_$event t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.regId=$dbSearch AND t1.status = t4.id AND t1.event=$event AND t4.event=$event ORDER BY t4.ordinal ASC");
		}
		else{
			$dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName,t4.id as statusId,t4.round as roundId,t4.state as stateId,t4.ordinal as ordinalId FROM candidates_$event t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.regId=$dbSearch AND t1.email=$dbEmail AND t1.status = t4.id AND t1.event=$event AND t4.event=$event ORDER BY t4.ordinal ASC");
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
			$dbres = mysql_query("SELECT count(*) as total,$val as val, college as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates_$event WHERE event=$event GROUP BY college");
		}
		if($val == "stream"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, s.name as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates_$event, streams as s where stream=s.id and event=$event GROUP BY stream");
		}
		if($val == "source"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val,source as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates_$event  where  event=$event GROUP BY source");
		}
		if($val == "event"){
			$dbres = mysql_query("SELECT count(*) as total,$val as val, e.name as name,count(case isWritten when 1 then 1 else null end) as Written,count(case isR1 when 1 then 1 else null end) as R1,count(case isR2 when 1 then 1 else null end) as R2,count(case isR3 when 1 then 1 else null end) as R3,count(case isR4 when 1 then 1 else null end) as R4,count(case isOnsite when 1 then 1 else null end) as Onsite,count(case isHR when 1 then 1 else null end) as MD,count(case isFinal when 1 then 1 else null end) as HR,count(case isFinal when 1 then 1 else null end) as HR,count(case when (isWritten =0 || isR1 = 0 || isR2 = 0|| isR3 = 0|| isR4 = 0 || isOnsite = 0|| isHR = 0|| isFinal = 0)  then 1 else null end) as rejs, $dbSearch as search from candidates_$event, events as e where event=e.id  GROUP BY event");
		}
		if($val == "person"){
			$dbres = mysql_query("select s.id as name,'person' as val,s.name as oname,$dbSearch as search,
			(select count(*) from candidates_$event where isWritten=1 and weid=s.id and event =$event ) as WQ,(select count(*) from candidates_$event where isWritten=0 and weid=s.id and event =$event) as WD,
			(select count(*) from candidates_$event where isR1=1 and r1eid=s.id and event =$event) as R1Q,(select count(*) from candidates_$event where isR1=0 and r1eid=s.id and event =$event) as R1D,
			(select count(*) from candidates_$event where isR2=1 and r2eid=s.id and event =$event) as R2Q,(select count(*) from candidates_$event where isR2=0 and r2eid=s.id and event =$event) as R2D,
			(select count(*) from candidates_$event where isR3=1 and r3eid=s.id and event =$event) as R3Q,(select count(*) from candidates_$event where isR3=0 and r3eid=s.id and event =$event) as R3D,
			(select count(*) from candidates_$event where isR4=1 and r4eid=s.id and event =$event) as R4Q,(select count(*) from candidates_$event where isR4=0 and r4eid=s.id and event =$event) as R4D,
			(select count(*) from candidates_$event where isOnsite=1 and oneid=s.id and event =$event) as ONQ,(select count(*) from candidates_$event where isOnsite=0 and oneid=s.id and event =$event) as OND,
			(select count(*) from candidates_$event where isHR=1 and hreid=s.id and event =$event) as HQ,(select count(*) from candidates_$event where isHR=0 and hreid=s.id and event =$event) as HD,
			(select count(*) from candidates_$event where isFinal=1 and feid=s.id and event =$event) as FQ,(select count(*) from candidates_$event where isFinal=0 and feid=s.id and event =$event) as FD
			 from staff s,candidates_$event c where c.event=$event group by s.id");
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
		$events=$this->getEventsCutoff();
		$event=mysql_real_escape_string($events[0]->id);
		$rounds[]=array();
		$table1="candidateactivities_".$event;
		$table="candidates_".$event;
		//$dbres=mysql_query("select distinct round,shortName,'#990000' as bg from status where event = $event ");
		$dbres=mysql_query("select id,round,state,backgroundColor as bg,shortName2 as shortName from status where event=$event and state !=4 order by ordinal ASC");
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			
			$rounds[] = $obj;
		}		
		$roundSize=sizeOf($rounds);
		if($val == "stream"){
			$query = "SELECT count(distinct c.id) as total,'$val' as val,s.name as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=1) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==3)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1 and c.stream=s.id) then 1 else null END) as rejs  FROM ".$table." c, streams s where c.stream = s.id GROUP BY stream";
			//echo $query;
			$dbres = mysql_query($query);	
		}		
		else if($val == "college"){
			$query = "SELECT count(distinct c.id) as total,'$val' as val,c.college as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=1) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==3)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1) then 1 else null END) as rejs FROM ".$table." c GROUP BY college";
			//echo $query;
			$dbres = mysql_query($query);
			/*$query = "SELECT count(distinct a.cid) as total,'$val' as val,college as name";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid where a.event=".$event." GROUP BY college";
			//echo $query;
			$dbres = mysql_query($query);	*/
		}		
		else if($val == "source"){
		$query = "SELECT count(distinct c.id) as total,'$val' as val,c.source as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=1) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==3)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1) then 1 else null END) as rejs FROM ".$table." c GROUP BY source";
			//echo $query;
			$dbres = mysql_query($query);
			/*$query = "SELECT count(distinct a.cid) as total,'$val' as val,source as name";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid where a.event=".$event." GROUP BY source";
			//echo $query;
			$dbres = mysql_query($query);*/	
		}		
		else if($val == "event"){
			$query = "SELECT count(distinct a.cid) as total,e.name as name,'$val' as val";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				 /*if($i < ($roundSize-1))
				 {
					$query = $query . ",";
				 }
				 else
				 {
					$query = $query;
				 }*/
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid INNER JOIN events e on e.id=a.event group by e.name";
			//echo $query;
			$dbres = mysql_query($query);	
		}		
		/*else if($val == "person"){
			$query = "SELECT count(distinct a.cid) as total,'$val' as val,s.name as name";			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid INNER JOIN staff s on s.id=a.eid where a.event=".$event." GROUP BY a.eid";
			//echo $query;
			$dbres = mysql_query($query);	
		}	*/
		else if($val == "person"){
			$query = "SELECT s.id as id,count(case when(c.eid=s.id and c.state != 4 and c.isduplicate=0) then 1 else null END) as total,'$val' as val,s.name as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isduplicate=0 and c.eid=s.id and c.state =".$rounds[$i]->state.") then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==3)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.eid=s.id and isduplicate=0  and c.state =".$rounds[$i]->state.") then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
					
			$query = $query . ",count(case when(c.eid=s.id and c.state=2 and c.isduplicate=0)then 1 else null END) as rejs FROM ".$table1." c ,staff s  GROUP BY s.id";
			//echo $query;
			$dbres = mysql_query($query);
		}
        $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
		$hDetails['count']=$roundSize-1;
		$hDetails['rounds']=$rounds;
		/*echo "<pre>";	
		print_r($hDetails);*/		
		return $hDetails;
    }
	
	
	/* FOR TABLE VIEW  */
		public function getAllHomeDetailsTable($val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;		
        $dbSearch = "'".mysql_real_escape_string($val)."'";
		$events=$this->getEventsCutoff();
		$event=mysql_real_escape_string($events[0]->id);
		$rounds[]=array();
		$table1="candidateactivities_".$event;
		$table="candidates_".$event;
		//$dbres=mysql_query("select distinct round,shortName,'#990000' as bg from status where event = $event ");
		$dbres=mysql_query("select id,round,state,backgroundColor as bg,shortName2 as shortName from status where event=$event and state !=4 order by ordinal ASC");
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			
			$rounds[] = $obj;
		}		
		$roundSize=sizeOf($rounds);
		if($val == "stream"){
			$query = "SELECT count(distinct c.id) as total,'$val' as val,s.name as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2 || $rounds[$i]->state==3 )
				{
					$isRej = 0;
					if($rounds[$i]->state==2)
					{
						$isRej=1;
					}
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=$isRej) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1 and c.stream=s.id) then 1 else null END) as rejs  FROM ".$table." c, streams s where c.stream = s.id GROUP BY stream";
			//echo $query;
			$dbres = mysql_query($query);	
		}		
		else if($val == "college"){
			$query = "SELECT count(distinct c.id) as total,'$val' as val,c.college as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2 || $rounds[$i]->state==3)
				{
					$isRej = 0;
					if($rounds[$i]->state==2)
					{
						$isRej=1;
					}
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=$isRej) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1) then 1 else null END) as rejs FROM ".$table." c GROUP BY college";
			//echo $query;
			$dbres = mysql_query($query);
			/*$query = "SELECT count(distinct a.cid) as total,'$val' as val,college as name";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid where a.event=".$event." GROUP BY college";
			//echo $query;
			$dbres = mysql_query($query);	*/
		}		
		else if($val == "source"){
		$query = "SELECT count(distinct c.id) as total,'$val' as val,c.source as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2 || $rounds[$i]->state==3)
				{
					$isRej = 0;
					if($rounds[$i]->state==2)
					{
						$isRej=1;
					}
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=$isRej) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . ",count(case when(c.isRejected=1) then 1 else null END) as rejs FROM ".$table." c GROUP BY source";
			//echo $query;
			$dbres = mysql_query($query);
			/*$query = "SELECT count(distinct a.cid) as total,'$val' as val,source as name";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid where a.event=".$event." GROUP BY source";
			//echo $query;
			$dbres = mysql_query($query);*/	
		}		
		else if($val == "event"){
			$query = "SELECT count(distinct a.cid) as total,e.name as name,'$val' as val";
			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				 /*if($i < ($roundSize-1))
				 {
					$query = $query . ",";
				 }
				 else
				 {
					$query = $query;
				 }*/
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid INNER JOIN events e on e.id=a.event group by e.name";
			//echo $query;
			$dbres = mysql_query($query);	
		}		
		/*else if($val == "person"){
			$query = "SELECT count(distinct a.cid) as total,'$val' as val,s.name as name";			
			for($i=1;$i<$roundSize;$i++)
			{			
				 $color=$rounds[$i]->bg;
				 $color=$rounds[$i]->bg;
				 $query = $query .  ",count(case when(a.round =".$rounds[$i]->round." and a.state=3 and isDuplicate= 0) then 1 else null END)  as R".$i."Q,count(case when(a.round =".$rounds[$i]->round." and a.state=2 and isDuplicate= 0) then 1 else null END)  as R".$i."D,'".$color."' as R".$i."bg";
				
			}		
			$query = $query . " FROM ".$table1."  a INNER JOIN ".$table." c on c.id = a.cid INNER JOIN staff s on s.id=a.eid where a.event=".$event." GROUP BY a.eid";
			//echo $query;
			$dbres = mysql_query($query);	
		}	*/
		else if($val == "person"){
			$query = "SELECT s.id as id,count(case when(c.eid=s.id and c.state != 4 and c.isduplicate=0) then 1 else null END) as total,'$val' as val,s.name as name";
			$j=0;
			for($i=1;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2 || $rounds[$i]->state==3)
				{
					/*$isRej = 0;
					if($rounds[$i]->state==2)
					{
						$isRej=1;
					}*/
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isduplicate=0 and c.eid=s.id and c.state =".$rounds[$i]->state.") then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			
					
			$query = $query . ",count(case when(c.eid=s.id and c.state=2 and c.isduplicate=0)then 1 else null END) as rejs FROM ".$table1." c ,staff s  GROUP BY s.id";
			//echo $query;
			$dbres = mysql_query($query);
		}
        $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
		$hDetails['count']=$roundSize-1;
		$hDetails['rounds']=$rounds;
		/*echo "<pre>";	
		print_r($hDetails);*/		
		return $hDetails;
    }

	/* ---------FOR TABLE VIEW ------------------- */
	public function getHomeDetailsEventChart($val) {			
        $dbSearch = "'".mysql_real_escape_string($val)."'";
		$events=$this->getEventsCutoff();
		$event=mysql_real_escape_string($events[0]->id);
		$dbres2=mysql_query("select id,name from events where isDisabled=0");
		$eventsList=array();
		while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {			
			$eventsList[] = $obj;
		}	
		$hDetails = array();
		$eDetails=array();
		foreach($eventsList as $eachEvent)
		{
			$rndNum=1;			
			$rounds=array();
			$eachEventId=$eachEvent->id;
			$table="candidates_".$eachEventId;			
			$dbres=mysql_query("select id,round,state,backgroundColor as bg from status where event=$eachEventId and state !=4 order by ordinal ASC");
			//echo "select id,round,state,backgroundColor as bg from status where event=$eachEventId and state !=4 order by ordinal ASC";
			while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {			
				$rounds[] = $obj;
			}		
			$roundSize=sizeOf($rounds);
			$query = "SELECT e.id as id,count(distinct c.id) as total,'$val' as val,e.name as name,(select count(*) from status where event=9 and state!=4 ) as rcnt";
			$j=0;
			for($i=0;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==2)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=1) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=0;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==3)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}
			for($i=0;$i<$roundSize;$i++)
			{			
				$color=$rounds[$i]->bg;			
				if($rounds[$i]->state==1)
				{
					$query = $query .  ",count(case when(c.round =".$rounds[$i]->round." and c.isRejected=0) then 1 else null END)  as R".$j.",'".$color."' as R".$j."bg";
					$j++;
				}
			}			
			$query = $query . " FROM ".$table." c, events e where c.event = e.id GROUP BY c.event";
			//echo $query;
			$dbres3 = mysql_query($query);
			while ( ($obj = mysql_fetch_object($dbres3)) != NULL ) {
				$hDetails[] = $obj;						
			}
			
			$rndNum++;
		}
		//$hDetails[]=$eDetails;
		return $hDetails;				
    }	
	public function getAllHomeDetailsBySelection($source,$val) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($val)."'";
		$dbSource = mysql_real_escape_string($source);
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
		if($source=="source"){
			$dbres = mysql_query("SELECT regId, c.id as id1,fname,lname,email,mobile,s.id as statusID ,s.backgroundColor as bg ,s.displayName as status,c.event as evtID from ".$table." c,status s where c.source=$dbSearch and  c.status=s.id and c.event=$event");
		}
		if($source=="college"){
			$dbres = mysql_query("SELECT regId,c.id as id1,fname,lname,email,mobile,s.id as statusID ,s.backgroundColor as bg ,s.displayName as status,c.event as evtID from ".$table." c,status s  where c.college=$dbSearch and  c.status=s.id and c.event=$event");			
		}
		if($source=="stream"){
			$dbres = mysql_query("SELECT regId,c1.id as id1,fname,lname,email,mobile,s.id as statusID ,s.backgroundColor as bg ,s.displayName as status,c1.event as evtID from ".$table." c1,streams as c,status s  where c1.stream=c.id and c.name=$dbSearch and  c1.status=s.id and c1.event=$event");			
		}
		if($source=="event"){
			$dbres = mysql_query("SELECT regId,c1.id as id1,fname,lname,email,mobile,s.id as statusID ,s.backgroundColor as bg ,s.displayName as status,c1.event as evtID from candidates_$val c1,events as c,status s  where c1.event=c.id and  c1.status=s.id and c1.event=$val");
			
		}
		if($source=="person"){		
			$dbres = mysql_query("select c1.id as id1,c1.regId,c1.lname as lname,c1.fname,c1.email,c1.mobile,(select s.name from status s where c2.status=s.id) as statusID,(select s.displayName from status s where c2.status=s.id) as status,(select s.backgroundColor from status s where c2.status=s.id) as bg,c1.event as evtID from ".$table." c1,".$table1." c2 where c1.id=c2.cid and c2.eid=(select id from staff s where s.name=".$dbSearch.") and c2.isduplicate=0");
			
		}
        $hDetails = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $hDetails[] = $obj;						
        }
		$hDetails['val']=$event;
		return $hDetails;
    }
	public function selectBySearchID($search) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbSearch = "'".mysql_real_escape_string($search)."'";
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
        $dbres = mysql_query("SELECT  t1.*,t2.name as qualName,t3.name as streamName,t4.displayName as statusName FROM ".$table." t1,qualifications t2,streams t3,status t4 WHERE t1.qualification=t2.id AND t1.stream=t3.id AND t1.id=$dbSearch AND t1.status = t4.id AND t1.event=$event");
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
			mysql_query("INSERT INTO events (name,location, evtPriorAtnDays, evtCutOff,evtYearFrom,evtDM,isActive,evtDate,isEmail,isRegComplete) VALUES ($dbName,$dbLocation, $dbDetails, $dbCutoff,$dbPassout,$dbIdpref,$dbActive,$dbToday,$dbEmail,$dbIsRegComplete)");
			$dbres2=mysql_query("select id from events where evtDate=$dbToday and evtDM=$dbIdpref");
			$events = array();
			while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
				$events[] = $obj;
			}	
			$event=$events[0]->id;
			mysql_query("CREATE TABLE candidates_$event like candidates");
			mysql_query("CREATE TABLE candidateactivities_$event like candidateactivities");
		}
		else{
			mysql_query("UPDATE events SET name=$dbName , location=$dbLocation, evtPriorAtnDays=$dbDetails, evtCutOff=$dbCutoff, evtYearFrom=$dbPassout, evtDM=$dbIdpref, isActive=$dbActive,isEmail=$dbEmail, isRegComplete=$dbIsRegComplete WHERE id=$id");
		}
		
        return mysql_insert_id();
    }
	public function setStatus($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal)	{		        		
        $dbdisplayname = ($displayname != NULL)?"'".mysql_real_escape_string($displayname)."'":'NULL';
		$dbroundname = ($roundname != NULL)?"'".mysql_real_escape_string($roundname)."'":'NULL';
        $dbstate = ($state != NULL)?"'".mysql_real_escape_string($state)."'":'NULL';
		$dbemailTemp = ($emailTemp != NULL)?"'".mysql_real_escape_string($emailTemp)."'":'NULL';
		$dbemailLbl = ($emailLbl != NULL)?"'".mysql_real_escape_string($emailLbl)."'":'NULL';
		$dbchartLbl = ($chartLbl != NULL)?"'".mysql_real_escape_string($chartLbl)."'":'NULL';
		$dblegendLbl = ($legendLbl != NULL)?"'".mysql_real_escape_string($legendLbl)."'":'NULL';
		$dbcolorVal = ($colorVal != NULL)?"'".mysql_real_escape_string($colorVal)."'":'NULL';
		if($id=="" || $id==NULL){
			
		}
		else{
			$dbres2 = mysql_query("UPDATE status SET name=$dbdisplayname , displayName=$dbdisplayname, state=$dbstate, emailTemplate=$dbemailTemp, emailLabel=$dbemailLbl,shortName=$dbchartLbl,shortName2=$dblegendLbl,backgroundColor=$dbcolorVal WHERE id=$id");
			$dbres3 = mysql_query("SELECT round from status where id=$id");
			$rounds = array();
			while ( ($obj = mysql_fetch_object($dbres3)) != NULL ) {
				$rounds[] = $obj;
			}	
			$round=$rounds[0]->round;			
			$dbres6 = mysql_query("UPDATE status SET roundName=$dbroundname,ordinal=$ordinal WHERE round=$round");
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
	public function setStatusDefinition($id,$displayname,$roundname,$ordinal,$state,$emailTemp,$emailLbl,$chartLbl,$legendLbl,$colorVal)	{		        		
        $dbdisplayname = ($displayname != NULL)?"'".mysql_real_escape_string($displayname)."'":'NULL';
		$dbroundname = ($roundname != NULL)?"'".mysql_real_escape_string($roundname)."'":'NULL';
        $dbstate = ($state != NULL)?"'".mysql_real_escape_string($state)."'":'NULL';
		$dbemailTemp = ($emailTemp != NULL)?"'".mysql_real_escape_string($emailTemp)."'":'NULL';
		$dbemailLbl = ($emailLbl != NULL)?"'".mysql_real_escape_string($emailLbl)."'":'NULL';
		$dbchartLbl = ($chartLbl != NULL)?"'".mysql_real_escape_string($chartLbl)."'":'NULL';
		$dblegendLbl = ($legendLbl != NULL)?"'".mysql_real_escape_string($legendLbl)."'":'NULL';
		$dbcolorVal = ($colorVal != NULL)?"'".mysql_real_escape_string($colorVal)."'":'NULL';
		$dbres = mysql_query("SELECT * FROM state where id!='1'");
		$states = array();
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$states[] = $obj;
		}
		if($id=="" || $id==NULL){			
			//$dbres1 = mysql_query("SELECT MAX(round) as highestRound FROM statusdefinitions");
			$dbres1 = mysql_query("SELECT round FROM statusdefinitions order by round DESC");
			$rnds = array();
			while ( ($obj = mysql_fetch_object($dbres1)) != NULL ) {
				$rnds[] = $obj;
			}	
			$rnd=$rnds[0]->round;
			//$dbres2 = mysql_query("SELECT MAX(ordinal) as highestOrdinal FROM statusdefinitions");
			$dbres2 = mysql_query("SELECT ordinal FROM statusdefinitions order by ordinal DESC");
			$ords = array();
			while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
				$ords[] = $obj;
			}	
			$ord=$ords[0]->ordinal;
			$dbround=intval($rnd)+1; 
			$dbordinal=intval($ord)+1;	
			$roundNames=explode(" ",$roundname);
			$shortLbl="";
			foreach($roundNames as $roundN)
			{
				$firstLetter=substr($roundN,0,1);
				$shortLbl=$shortLbl."".$firstLetter;
			}
			$shortLbl = strtoupper($shortLbl);
			foreach($states as $state)
			{				
				$firstLetter1=substr($state->displayName,0,1);
				$shortLbl2=$shortLbl."-".$firstLetter1;
				$dbname=$roundname." ".$state->displayName;
				$dbres3 = mysql_query("INSERT INTO statusdefinitions (name,displayName,roundName,round, state, emailTemplate,emailLabel,ordinal,shortName,shortName2) VALUES ('$dbname','$dbname','$roundname',$dbround, $state->id, $state->emailTemp,'$roundname',$dbordinal,'$shortLbl','$shortLbl2')");				
			}			
		}
		else{
			$dbres4 = mysql_query("UPDATE statusdefinitions SET name=$dbdisplayname , displayName=$dbdisplayname, state=$dbstate, emailTemplate=$dbemailTemp, emailLabel=$dbemailLbl,shortName=$dbchartLbl,shortName2=$dblegendLbl,backgroundColor=$dbcolorVal WHERE id=$id");
			$dbres5 = mysql_query("SELECT round from statusdefinitions where id=$id");
			$rounds = array();
			while ( ($obj = mysql_fetch_object($dbres5)) != NULL ) {
				$rounds[] = $obj;
			}	
			$round=$rounds[0]->round;
			//echo "UPDATE statusdefinitions SET roundName=$dbroundname,ordinal=$ordinal WHERE round=$round";		
			$dbres6 = mysql_query("UPDATE statusdefinitions SET roundName=$dbroundname,ordinal=$ordinal WHERE round=$round");
		}
        return $states;
    }
	public function setCandidateDetails($id,$fname,$lname,$email,$mobile,$dob,$gender,$college,$qualification,$stream,$ssc,$inter,$degree,$yearPassed,$currentCompany,$yearsOfExp,$source)	{
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$dbfname = ($fname != NULL)?"'".mysql_real_escape_string($fname)."'":'NULL';
        $dblname = ($lname != NULL)?"'".mysql_real_escape_string($lname)."'":'NULL';
        $dbemail = ($email != NULL)?"'".mysql_real_escape_string($email)."'":'NULL';		
		$dbmobile = ($mobile != NULL)?"'".mysql_real_escape_string($mobile)."'":'NULL';	
		$dbdob = ($dob != NULL)?"'".mysql_real_escape_string($dob)."'":'NULL';
        $dbgender = ($gender != NULL)?"'".mysql_real_escape_string($gender)."'":'NULL';
        $dbcollege = ($college != NULL)?"'".mysql_real_escape_string($college)."'":'NULL';		
		$dbqualification = ($qualification != NULL)?"'".mysql_real_escape_string($qualification)."'":'NULL';
		$dbstream = ($stream != NULL)?"'".mysql_real_escape_string($stream)."'":'NULL';
        $dbssc = ($ssc != NULL)?"'".mysql_real_escape_string($ssc)."'":'NULL';
        $dbinter = ($inter != NULL)?"'".mysql_real_escape_string($inter)."'":'NULL';		
		$dbdegree = ($degree != NULL)?"'".mysql_real_escape_string($degree)."'":'NULL';
		$dbyearPassed = ($yearPassed != NULL)?"'".mysql_real_escape_string($yearPassed)."'":'NULL';
        $dbcurrentCompany = ($currentCompany != NULL)?"'".mysql_real_escape_string($currentCompany)."'":'NULL';
        $dbyearsOfExp = ($yearsOfExp != NULL)?"'".mysql_real_escape_string($yearsOfExp)."'":'NULL';		
		$dbsource = ($source != NULL)?"'".mysql_real_escape_string($source)."'":'NULL';		
		if($id=="" || $id==NULL){
			
		}
		else{
			mysql_query("UPDATE candidates_$event SET fname=$dbfname,lname=$dblname,email=$dbemail,mobile=$dbmobile,dob=$dbdob,gender=$dbgender,college=$dbcollege,qualification=$dbqualification,stream=$dbstream,yearPassed=$dbyearPassed,ssc=$dbssc,inter=$dbinter,degree=$dbdegree,currentCompany=$dbcurrentCompany,yearsOfExperience=$dbyearsOfExp,source=$dbsource WHERE id=$id");
		}
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
		$dbres2 = mysql_query("select id,round from status where event=$dbEvent and ordinal=0");
		$statuses = array();
        while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
            $statuses[] = $obj;
        }
		$dbStatus=$statuses[0]->id;
		$dbRound=$statuses[0]->round;
		mysql_query("INSERT INTO candidates_$event (fname,lname, mobile, email,dob,gender,college,qualification,stream,ssc,inter,degree,yearPassed,currentCompany,yearsOfExperience,source,status,event,round,isRejected) VALUES ($dbFName,$dbLName, $dbMobile, $dbEmail,$dbDob,$dbGender,$dbCollege,$dbQualification,$dbStream,$dbSSC,$dbInter,$dbDegree,$dbYearPassed,$dbCurrentCompany,$dbYearsOfExp, $dbSource,$dbStatus,$dbEvent,$dbRound,0)");
		$candId=mysql_insert_id();
		$dbres2=mysql_query("INSERT INTO candidateactivities_$event (cid,status,event,round,state) VALUES ($candId,$dbStatus,$dbEvent,$dbRound,'1')");
		
        return $candId;
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
		mysql_query("UPDATE candidates_$event->id SET regId=$dbRegId , regDate=$dbToday, paper='$dbSet' WHERE id=$res");
		$resultId=mysql_insert_id();
		$dbres2 = mysql_query("select id,round from status where event=$event->id and ordinal=0");
		$statuses = array();
        while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
            $statuses[] = $obj;
        }
		$dbStatus=$statuses[0]->id;
		$resu=$this->getEmailDetails($res,$dbStatus);
		
        return $resultId;
    }
    public function delete($id) {
        $dbId = mysql_real_escape_string($id);
        mysql_query("DELETE FROM candidates_$event WHERE id=$dbId");
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
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
        $dbres = mysql_query("SELECT c1.*,s1.name as staff,c2.regId as regId,s2.displayName as statusName,s2.state as state FROM ".$table1." c1,staff s1,".$table." c2,status s2  where c1.cid=c2.id AND c1.eid=s1.id AND c1.status=s2.id and c1.event=$event ORDER BY id DESC limit 8");
        $candidateactivities = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $candidateactivities[] = $obj;
        }
        return $candidateactivities;
    }
	public function showAllPanels() {
        /*$ini_array = parse_ini_file("assets/ini/events.ini");
		$event=$ini_array['event'];*/
		$ini_array = $this->getEventsCutOff();
		//$event=$ini_array[0]->id;		
		$panels = array();
		$query = "select distinct count(id) as total,";
		$events=$this->getEventsCutoff();
		$event=mysql_real_escape_string($events[0]->id);
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
		$rounds[]=array();
		$dbres=mysql_query("select distinct round,shortName from status where event = $event and round != 0 order by ordinal ASC");
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			
            $rounds[] = $obj;
        }		
		$roundSize=sizeOf($rounds);
		for($i=1;$i<$roundSize;$i++)
		{			
			 $query = $query .  "count(case when(round =".$rounds[$i]->round." and isRejected = 1) then 1 else null END) as isR".$i;
			 if($i < ($roundSize-1))
			 {
				$query = $query . ",";
			 }
			 else
			 {
			    $query = $query;
			 }
		}		
		$query = $query . " from ".$table." where event=" . $event;
		//echo $query;
		$dbres1 = mysql_query($query);	
		while ( ($obj1 = mysql_fetch_object($dbres1)) != NULL ) {
            $panels[] = $obj1;
        }
		$panels['1']=$rounds;
		$panels['2']=$roundSize-1;
        return $panels;
    }
	
	public function getCount() {
        $ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
		$panels = array();
		$dbres = mysql_query("select count(id) as total from ".$table." where event = $event");
        $panels[] = mysql_fetch_object($dbres);
        return $panels;
    }
	/*edited for rounds*/
	public function getRounds() {
        $ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$panels = array();
		$dbres = mysql_query("select round,shortName2,backgroundColor from status where event = $event and round != 0 order by ordinal,state ASC");        
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			
            $panels[] = $obj;
        }	
        return $panels;
    }
	public function showAllLinePanels() {
        /*$ini_array = parse_ini_file("assets/ini/events.ini");
		$event=$ini_array['event'];*/
		$ini_array = $this->getEventsCutOff();
		//$event=$ini_array[0]->id;		
		$panels = array();
		$query = "select distinct count(id) as total,";
		$events=$this->getEventsCutoff();
		$event=mysql_real_escape_string($events[0]->id);
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
		$rounds[]=array();
		$dbres=mysql_query("select distinct round,shortName from status where event = $event and round != 0 order by ordinal ASC");
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			
            $rounds[] = $obj;
        }		
		$roundSize=sizeOf($rounds);
		for($i=1;$i<$roundSize;$i++)
		{			
			 $query = $query .  "count(case when(round =".$rounds[$i]->round." and isRejected != 1) then 1 else null END) as R".$i."Progress,count(case when(round =".$rounds[$i]->round." and isRejected = 1) then 1 else null END) as isR".$i;
			 if($i < ($roundSize-1))
			 {
				$query = $query . ",";
			 }
			 else
			 {
			    $query = $query;
			 }
		}		
		$query = $query . " from ".$table." where event=" . $event;
		//echo $query;
		$dbres1 = mysql_query($query);	
		while ( ($obj1 = mysql_fetch_object($dbres1)) != NULL ) {
            $panels[] = $obj1;
        }
		$panels['1']=$rounds;
		$panels['2']=$roundSize-1;
        return $panels;
    }
	public function selectAllActivitiesbyId($regId) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$table="candidates_".$event;
		$table1="candidateactivities_".$event;
        $dbSearch = "'".mysql_real_escape_string($regId)."'";
		$dbres = mysql_query("SELECT c1.*,s1.name as staff,c2.regId as regId,s2.displayName as statusName,s2.backgroundColor as bgColor FROM ".$table1." c1,staff s1,".$table." c2,status s2  where c1.cid=c2.id AND c1.eid=s1.id AND c1.status=s2.id AND c2.regId=$dbSearch AND c1.event=$event ORDER BY id DESC ");
        $candidateactivities = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $candidateactivities[] = $obj;
        }
        return $candidateactivities;
    }
	public function insertMsg($Id,$ptweet,$status,$pscore) {
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$Id = mysql_real_escape_string($Id);
		$ptweet = "'".mysql_real_escape_string($ptweet)."'";
		$status = mysql_real_escape_string($status);
		$pscore = mysql_real_escape_string($pscore);
		$event = mysql_real_escape_string($event);
		$user = $_SESSION['user']->id;
		date_default_timezone_set("Asia/Kolkata"); 
		$tstamp = date('d-m-Y H:i:s');
		$dbres1=mysql_query("select round,ordinal,state from status where event=$event and id=$status");
		$roundObjs = array();
        while ( ($obj = mysql_fetch_object($dbres1)) != NULL ) {
            $roundObjs[] = $obj;
        }
		$round=$roundObjs[0]->round;
		$ordinal=$roundObjs[0]->ordinal;
		$newstate=$roundObjs[0]->state;
		$dbres2=mysql_query("select * from candidateactivities_$event where event=$event and round=$round and cid=$Id");
		$activities = array();
        while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
            $activities[] = $obj;
        }
		if(count($activities)>0)
		{
			$dbres3=mysql_query("UPDATE candidateactivities_$event SET isduplicate=1 where event=$event and round=$round and cid=$Id");
		}		
		$dbres4=mysql_query("select distinct round from status where ordinal < $ordinal order by ordinal DESC");
		$prevRoundObjs = array();
        while ( ($obj = mysql_fetch_object($dbres4)) != NULL ) {
            $prevRoundObjs[] = $obj;
        }
		if(count($prevRoundObjs) > 0)
		{
			foreach($prevRoundObjs as $prevRound)
			{
				$prevRoundId=$prevRound->round;
				$dbres5=mysql_query("select * from candidateactivities_$event where round=$prevRoundId and cid=$Id");
				$prevActivs = array();
				while ( ($obj = mysql_fetch_object($dbres5)) != NULL ) {
					$prevActivs[] = $obj;
				}
				if(count($prevActivs) == 0)
				{
					$dbres6=mysql_query("select id,state from status where event=$event and round=$prevRoundId and state=4");
					$prounds = array();
					while ( ($obj = mysql_fetch_object($dbres6)) != NULL ) {
						$prounds[] = $obj;
					}
					if(count($prounds) > 0)
					{
						$skipRound=$prounds[0]->id;
						$skipState=$prounds[0]->state;
						$dbres7=mysql_query("INSERT INTO candidateactivities_$event (cid,eid,stime,score,status,comment,event,round,state) VALUES ($Id,$user,'$tstamp',0,$skipRound,$ptweet,$event,$prevRoundId,$skipState)");
					}
				}				
			}
		}
		$result = mysql_query("INSERT INTO candidateactivities_$event (cid,eid,stime,score,status,comment,event,round,state) VALUES ($Id,$user,'$tstamp',$pscore,$status,$ptweet,$event,$round,$newstate)");
		if($newstate == '2')
		{
			$resul = mysql_query("UPDATE candidates_$event set status=$status,round=$round,isRejected=1 where id=$Id");
		}
		else
		{
			$resul = mysql_query("UPDATE candidates_$event set status=$status,round=$round,isRejected=0 where id=$Id");
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
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$order = "name";
        $dbOrder =  mysql_real_escape_string($order);
        $dbres = mysql_query("SELECT * FROM status where event=$event and (state = '2' or state='3') order by ordinal ASC");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getAllColleges($college) {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbCollege = "'%".mysql_real_escape_string($college)."%'";
        $dbres = mysql_query("SELECT college FROM candidates_$event where college like $dbCollege GROUP BY college order by college");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}
	public function getAllAStatuses() {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.ordinal,s.emailTemplate ,e.name as emailTemplateName FROM status as s, emails as e WHERE s.event=$event and (e.id=s.emailTemplate or s.emailTemplate=NULL)");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}	
	public function getAllStatusDefinitions() {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT s.id, s.name,s.displayName,s.state,s.round,s.roundName,s.ordinal,s.emailTemplate ,e.name as emailTemplateName FROM statusdefinitions as s, emails as e WHERE e.id=s.emailTemplate or s.emailTemplate=NULL order by s.ordinal");
        $status = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $status[] = $obj;
        }
        return $status;
	}	
	public function getAllCandidateDetails() {	
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
        $dbres = mysql_query("SELECT c.id as id,c.regId as regId, CONCAT(c.fname,' ',c.lname) as fullName,c.email as email,c.mobile as mobile,c.yearPassed as yearPassed FROM candidates_$event c");
        $cands = array();
        while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
            $cands[] = $obj;
        }
        return $cands;
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
		$result = mysql_query("select c1.*,s1.name as staff,c2.regId as regId,c2.fname as fname,c2.lname as lname,s2.displayName as statusName from candidateactivities_$event c1,staff s1,candidates_$event c2,status s2 where s1.id=c1.eid AND s1.id =$loggedInUser AND c2.id = c1.cid AND s2.id=c1.status AND c1.event=$event ORDER BY ID DESC");		
		$acts = array();
        while ( ($obj = mysql_fetch_object($result)) != NULL ) {
            $acts[] = $obj;
        }
		return $acts;
	}
	public function getAllSheets(){
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$result = mysql_query("select c.regId,CONCAT(c.fname,' ',c.lname) as fullname,c.ssc,c.inter,c.degree,c.mobile,c.email,c.college,c.yearPassed,c.currentCompany,c.yearsOfExperience,c.source,c.paper as paper,s.name as stream,q.name as qualification from candidates_$event c,streams s,qualifications q where c.stream=s.id AND c.qualification = q.id AND c.event=$event ");		
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
		$result = mysql_query("select c.id as id,c.regId as regId,CONCAT(c.fname,' ',c.lname) as fullname,c.email as email,s.displayName as statusName from candidates_$event c, status s  where c.regId=$dbregid AND c.event=$event AND c.status=s.id AND s.event=$event");		
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
		$to1 = "flexeyeindia@gmail.com";
		$reg=$regId;
		$fname=$firstName;
		$lname=$lastName;
		$fullName=$firstName." ".$lastName;
		$from = "vn@flexeye.com";
		$subject = $emailTemp->subject;
		$body = $emailTemp->body;
		$status=$emailTemp->name;
		$currStat=$emailTemp->emailLabel;
		$body=str_replace("--registrationId--",$reg,$body);
		$body=str_replace("--status--",$currStat,$body);
		$body=str_replace("--candidateid--",$fullName,$body);
		
		$headers="MIME-Version: 1.0\r\n";
		$headers=$headers."Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers=$headers."From: flexeyeindia@gmail.com". "\r\n";
		$headers=$headers. 'Bcc: flexeyeindia@gmail.com' . "\r\n";
		mail("nrm@flexeye.com",$subject,$body,$headers);
		
		/*$url = "https://dev4.in.flexeye.com/v1/sendMail_Default/send?to=".$to1."&from=".$from."&subject=".urlencode($subject)."&body=".urlencode($body)."";
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
		}*/
        //include 'application/view/default.php';
    }
	public function getEmailDetails($tId,$status){
		$ini_array = $this->getEventsCutOff();
		$eventNotify=$ini_array[0]->isEmail;
		$event=$ini_array[0]->id;
		if($eventNotify == 1){
			$res = mysql_query("select s.id as sid,s.name as name,s.emailLabel as emailLabel, e.id as eid,e.subject as subject,e.body as body from status s, emails e where s.id=$status and s.emailTemplate = e.id and s.event=$event");		
			$result = array();		
			while ( ($obj = mysql_fetch_object($res)) != NULL ) {
				$result[] = $obj;
			}
			$res1 = mysql_query("select id,regId,email,fname,lname from candidates_$event where id=$tId");		
			$result1 = array();		
			while ( ($obj1 = mysql_fetch_object($res1)) != NULL ) {
				$result1[] = $obj1;
			}		
			if(count($result) > 0 && count($result1) > 0){
				$emailTemp=$result[0];			
				$to=$result1[0]->email;
				$dbregId="".$result1[0]->regId;
				$firstName=$result1[0]->fname;
				$lastName=$result1[0]->lname;
				$this->sendEmail($to,$dbregId,$emailTemp,$firstName,$lastName);
			}		
		}
	}
	public function updateBulkList($activities,$user,$bulkStatus,$bulkComment){
		date_default_timezone_set("Asia/Kolkata"); 
		$tstamp = date('d-m-Y H:i:s');
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		for($i=0;$i<count($activities);$i++)
		{
			$activity=$activities[$i];
			$tId=$activity['id'];			
			$tStatus=$bulkStatus;
			$tScore=$activity['score'];			
			$tComment=$bulkComment;
			$dbres1=mysql_query("select round,ordinal,state from status where event=$event and id=$tStatus");
			$roundObjs = array();
			while ( ($obj = mysql_fetch_object($dbres1)) != NULL ) {
				$roundObjs[] = $obj;
			}
			$round=$roundObjs[0]->round;
			$ordinal=$roundObjs[0]->ordinal;
			$newstate=$roundObjs[0]->state;
			$dbres2=mysql_query("select * from candidateactivities_$event where event=$event and round=$round and cid=$tId");
			$tActivities = array();		
			while ( ($obj = mysql_fetch_object($dbres2)) != NULL ) {
				$tActivities[] = $obj;
			}
			if(count($tActivities)>0)
			{
				$dbres3=mysql_query("UPDATE candidateactivities_$event SET isduplicate=1 where event=$event and round=$round and cid=$tId");
			}
			$dbres4=mysql_query("select distinct round from status where event=$event and ordinal < $ordinal order by ordinal DESC");
			$prevRoundObjs = array();
			while ( ($obj = mysql_fetch_object($dbres4)) != NULL ) {
				$prevRoundObjs[] = $obj;
			}
			if(count($prevRoundObjs) > 0)
			{
				foreach($prevRoundObjs as $prevRound)
				{
					$prevRoundId=$prevRound->round;
					$dbres5=mysql_query("select * from candidateactivities_$event where round=$prevRoundId and cid=$tId");
					$prevActivs = array();
					while ( ($obj = mysql_fetch_object($dbres5)) != NULL ) {
						$prevActivs[] = $obj;
					}
					if(count($prevActivs) == 0)
					{
						$dbres6=mysql_query("select id,state from status where event=$event and round=$prevRoundId and state=4");
						$prounds = array();
						while ( ($obj = mysql_fetch_object($dbres6)) != NULL ) {
							$prounds[] = $obj;
						}
						if(count($prounds) > 0)
						{
							$skipRound=$prounds[0]->id;
							$skipState=$prounds[0]->state;
							$dbres7=mysql_query("INSERT INTO candidateactivities_$event (cid,eid,stime,score,status,comment,event,round,state) VALUES ($tId,$user,'$tstamp',0,$skipRound,'$tComment',$event,$prevRoundId,$skipState)");
						}
					}
					/*else
					{
						break;
					}*/
				}	
			}
			$result = mysql_query("INSERT INTO candidateactivities_$event (cid,eid,stime,score,status,comment,event,round,state) VALUES ($tId,$user,'$tstamp',$tScore,$tStatus,'$tComment',$event,$round,$newstate)");	
			if($newstate == '2')
			{
				$resul = mysql_query("UPDATE candidates_$event set status=$tStatus,round=$round,isRejected=1 where id=$tId");
			}
			else
			{
				$resul = mysql_query("UPDATE candidates_$event set status=$tStatus,round=$round,isRejected=0 where id=$tId");
			}				
			$resu=$this->getEmailDetails($tId,$tStatus);
		}
		return $resu;
	}
	public function getAllRegIds(){
		$ini_array = $this->getEventsCutOff();
		$event=$ini_array[0]->id;
		$result = mysql_query("select c.regId as regId,c.status as status,s.state as state from candidates_$event c, status s where c.status=s.id and c.event=$event");		
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
		$dbres = mysql_query("select count(id) as t1 from candidates_$event where event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b where a.status = b.id and b.round=0 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b where a.status = b.id and b.round=1 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b where a.status = b.id and b.round=2 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b where a.status = b.id and b.round=3 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);
		$dbres = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b where a.status = b.id and b.round=4 and b.state=3 and a.event=$event");
        $panels[] = mysql_fetch_object($dbres);   
		$streamsM = array();
		$dbres = mysql_query("select * from streams" );
		while ( ($obj = mysql_fetch_object($dbres)) != NULL ) {
			$streams = array();           
			$sid = $obj->id;
			$dbresT = mysql_query("select count(id) as t1 from candidates_$event where event=$event and stream = $sid" );
			$streams[] = mysql_fetch_object($dbresT);
			$dbresW = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b,candidates_$event as c1 where a.status = b.id and b.round=0 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbresW);
			$dbres1 = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b,candidates_$event as c1 where a.status = b.id and b.round=1 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres1);
			$dbres2 = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b,candidates_$event as c1 where a.status = b.id and b.round=2 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres2);
			$dbres3 = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b,candidates_$event as c1 where a.status = b.id and b.round=3 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres3);
			$dbres4 = mysql_query("select count(a.id) as t1 from candidateactivities_$event as a, status as b,candidates_$event as c1 where a.status = b.id and b.round=4 and b.state=3 and a.event=$event and c1.id =a.cid and c1.stream = $sid");
			$streams[] = mysql_fetch_object($dbres4);
			$streamsM[] = $streams;
		}
		$panels['streams'] = $streamsM ;		
        return $panels;
    }
}
?>