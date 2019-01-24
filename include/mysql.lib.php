<?php
class connect
{
	var $Host = INT_DB_HOST;
	var $Database = INT_DB_NAME;
	var $User = INT_DB_USER;
	var $Password = INT_DB_PASS;
	var $last_connect = 0;

	var $Link_ID = 0;
	var $Query_ID = 0;
	var $Record = array();
	var $Row;
	var $Errno = 0;
	var $Error = "";

	function connect()
	{		

			$this->last_connect=0;
			$this->Link_ID = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);			
			if (!$this->Link_ID)
			{
				$this->halt("Link_ID == false, connect failed");
				$this->Errno = mysqli_errno($this->Link_ID);
				$this->Error = mysqli_error($this->Link_ID);
			}			
	}
	function halt()
	{
		
	}
	function query($Query_String)
	{
		$this->connect($this->last_connect);
		$this->Query_ID = mysqli_query($this->Link_ID, $Query_String);
		$this->Row = 0;
		$this->Errno = mysqli_errno();
		$this->Error = mysqli_error();
		
		if (!$this->Query_ID)
		{
			$this->halt("Invalid SQL: ".$Query_String);
		}
		return $this->Query_ID;
	}
	
function query_fetch($fetch=0)
{
	if($fetch==0) {
		$result=@mysql_fetch_assoc($this->Query_ID);
	} else {
		$result=@mysql_fetch_array($this->Query_ID);
	}
	
	if(!is_array($result)) 
	return false;
	$this->total_field=mysql_num_fields($this->Query_ID);

	foreach($result as $key=>$val){
		$result[$key]=trim(htmlspecialchars($val));
	}
	 return $result; 
}



function num_field()
{
	return mysql_num_fields($this->Query_ID);
}
function get_field_name($i)
{
	return mysql_field_name($this->Query_ID,$i);
}


function next_record()
	{
		$this->Record = mysql_fetch_array($this->Query_ID);
		$this->Row += 1;
		$this->Errno = mysql_errno();
		$this->Error = mysql_error();
		$stat = is_array($this->Record);
		if (!$stat)
		{
			mysql_free_result($this->Query_ID);
			$this->Query_ID = 0;
		}
		return $this->Record;
	}

	function num_rows()
	{
		return mysql_num_rows($this->Query_ID);
	}
	function getOptionAll($tablename,$col1,$col2,$condition)
	{
		$sql="select * from $tablename $condition";	
		$result=mysqli_query($sql);	
		$opt='';
		while($row=mysqli_fetch_array($result))
		{
		$opt.="<option value=".$row[$col1].">".$row[$col2]."</option>";
		}
		return $opt;
	}
	
	function getOptionAllMul($tablename,$col1,$col2,$sel,$condition)
	{
		$sql="select * from $tablename $condition";	
		$result=mysqli_query($sql);	
		$opt='';
		while($row=mysqli_fetch_array($result))
		{
		  if($sel=='sel')
		  {
			 $opt.="<option selected='' value=".$row[$col1].">".$row[$col2]."</option>";
		 
		  }else 
		  {
			  $opt.="<option value=".$row[$col1].">".$row[$col2]."</option>";
		  }
		}
		return $opt;
	}
	
	function getOptionAll2($tablename,$col1,$col2,$col3,$condition)
	{
		$sql="select * from $tablename $condition";	
		$result=mysqli_query($sql);	
		$opt='';
		while($row=mysqli_fetch_array($result))
		{
		$opt.="<option value=".$row[$col1].">".$row[$col2]."&nbsp;".$row[$col3]."</option>";
		}
		return $opt;
	}
	function getOptionAll3($tablename,$col1,$col2,$col3,$col4,$condition)
	{
		$sql="select * from $tablename $condition";	
		$result=mysql_query($sql);	
		$opt='';
		while($row=mysql_fetch_array($result))
		{
		$opt.="<option value=".$row[$col1].">".$row[$col2]."&nbsp;".$row[$col3]."-".$row[$col4]."</option>";
		}
		return $opt;
	}
	function getOptionAllDistinct($tablename,$col1,$condition)
	{
		$sql="select distinct ".$col1." from $tablename $condition";	
		$result=mysql_query($sql);	
		$opt='';
		while($row=mysql_fetch_array($result))
		{
		$opt.="<option value=".$row[$col1].">".$row[$col1]."</option>";
		}
		return $opt;
	}
function getbalance($tablename,$particulars)
	{
		$sql="select * from $tablename where 1";
		$result=mysql_query($sql);	
		$opt='';
		while($row=mysql_fetch_array($result))
		{
			$p1=$row['separticulars'];
			$p3=$row['sequantity'];
			$p2=explode(',',$p1);
			$p4=explode(',',$p3);
			$plength=count($p2);
			for ( $counter = 0; $counter < $plength; $counter ++) {
				if($p2[$counter]==$particulars)
				{
					$bal=$bal+$p4[$counter];
				}
			}
		}
		return $bal;
	}

	function maxRow($tablename,$field,$condition)
	{
		$sql="select max($field) from $tablename $condition";
		$this->query($sql);
		$result=@mysql_fetch_array($this->Query_ID);
		return $result[0];
	}
	function nxtRow($tablename,$field,$condition)
	{
		$sql="select max($field) from $tablename $condition";
		$this->query($sql);
		$result=@mysql_fetch_array($this->Query_ID);
		return $result[0]+1;
	}
	function getRow($tablename,$field,$condition)
	{
		$sql="select $field from $tablename $condition";
		$this->query($sql);
		$result=@mysqli_fetch_array($this->Query_ID);
		return $result[0];
	}
	
	function getMonth($month)
	{
		$m=array('January','February','March','April','May','June','July','August','September','October','November','December');		
		return $m[$month-1];
	}
	function getMonthShort($month)
	{
		$m=array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');		
		return $m[$month-1];
	}
	function getGrade($mark)
	{
	switch($mark)
		{
		case $mark<=100 and $mark >90 :
		return "A";
		break;
		case $mark<=90 and $mark >80 :
		return "B";
		break;
		case $mark<=80 and $mark >70 :
		return "C";
		break;
	}
	}
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function getRealMacAddr($ip)
{
	ob_start();
    system('getmac /s '.$ip.' /v');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}

function checkpresent($tableName,$columnName,$regno)
{
	$sql="select $columnName from $tableName where regno='$regno' and $columnName=1";
	$cnt=$this->query($sql);
	$cnt1=mysql_num_rows($cnt);
	return $cnt1;
}

function format($field,$digit)
{
return number_format($field,$digit,'.','');
}

function affected_rows()
{
	return mysql_affected_rows($this->Link_ID);
}


function getDMY($date)
{
list($year, $month, $day) = split('[/.-]', $date);
$fdate=$day."-".$month."-".$year;
return $fdate;
}
function getMDY($date)
{
list($year, $month, $day) = split('[/.-]', $date);
$fdate=$month.$day.substr($year,2,2);
return $fdate;
}
function getYMD($date)
{
list($day, $month, $year) = split('[/.-]', $date);
$fdate=$year."-".$month."-".$day;
return $fdate;
}
function sec2tim($seconds)
{
$init =$seconds;
$hours = floor($init / 3600);
$minutes = floor(($init / 60) % 60);
$seconds = $init % 60;
return $hours.':'.$minutes.':'.$seconds;
}

function tim2sec($time) { 
list($h, $m, $s) = explode(':', $time); 
return ($h * 3600) + ($m * 60) + $s; 
}

function URL() { 
	$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
	$protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
	$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
	return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
}

function URL_FROM() { 
	return $_SERVER['HTTP_REFERER']; 
}  

function strleft($s1, $s2) 
{ 
	return substr($s1, 0, strpos($s1, $s2)); 
}

function random()
{
	return mt_rand();
}



function get_address_branch($id)
{
	$this->connect();
	$areacode=$this->getRow("tbl_branch","areacode","where id='".$id."'");
	$aptno=$this->getRow("tbl_branch","aptno","where id='".$id."'");
	$streetno=$this->getRow("tbl_branch","streetno","where id='".$id."'");
	$streetsuffix=$this->getRow("tbl_branch","streetsuffix","where id='".$id."'");
	$streetdir=$this->getRow("tbl_branch","streetdir","where id='".$id."'");
	$streetdir=$this->getRow("tbl_sdirection","ssdirection","where id='".$streetdir."'");
	
	$streetname=$this->getRow("tbl_branch","streetname","where id='".$id."'");
	$streettype=$this->getRow("tbl_branch","streettype","where id='".$id."'");
	$streettype=$this->getRow("tbl_streettype","stype","where id='".$streettype."'");
	
	$loc_type=$this->getRow("tbl_branch","loc_type","where id='".$id."'");
	$loc_type=$this->getRow("tbl_loctype","loctype","where id='".$loc_type."'");
	
	
	$loc_no=$this->getRow("tbl_branch","loc_no","where id='".$id."'");
	$postalcode=$this->getRow("tbl_branch","postalcode","where id='".$id."'");
	$city=$this->getRow("tbl_branch","city","where id='".$id."'");
	$province=$this->getRow("tbl_branch","province","where id='".$id."'");
	$country=$this->getRow("tbl_branch","country","where id='".$id."'");
	
	$city1=$this->getRow("tbl_city","ciname","where id='".$city."'");
	$province1=$this->getRow("tbl_province","pcode","where id='".$province."'");
	
	if($streetsuffix!='')
		{
			$address.=$streetno.", ";
			$address.=$streetsuffix.", ";
			$address.=$streetname."  ".$streettype;
		
		}else{
			
			$address.=$streetno.", ";
			$address.=$streetname."  ".$streettype;
		}
	$address.=' '.$streetdir;
	if($loc_type!='' & $loc_no!='')
		{
			$address.=", ".$loc_type." #".$loc_no;
		}
			$address.='<br>';
	
			$address.=$city1.' ';
			$address.=$province1;
	
	if($postalcode!='')
		{
				$address.=' - '.$postalcode;
		}
	
return $address;

		}


function getMeta($key)
{
	$this->connect();
	return $this->getRow('tbl_meta','meta',"where `key`='".$key."'");
}

function getMO($key,$branch,$cond)
{
	$this->connect();
	if($branch!='' && $cond!='')
	{
		if($this->getRow('tbl_meta','meta',"where `key`='".$cond.$branch."'")=='custom')
		{
			$ret=$this->getRow('tbl_meta','meta',"where `key`='".$key.$branch."'");
		}else{
			$ret=$this->getRow('tbl_meta','meta',"where `key`='".$key."'");
		}
	}else{
			$ret=$this->getRow('tbl_meta','meta',"where `key`='".$key."'");
	}
	return $ret;
}

function url_format($url)
{
   $string = strtolower($url);
   $string = str_replace(" ", "-", $string);
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
   $string = preg_replace('/-+/', '-', $string);
   $string = explode('-',$string);
   $string = array_values(array_filter($string));
   $string = implode('-',$string);
   return $string;
}

function check_url_exists($url,$table,$id)
{
	$this->connect();
	$count=0;
	$surl=$url;
	while($this->getRow($table,'url',"where url='".$url."' and id!='".$id."'")!='')
	{
		$count=$count+1;
		$url=$surl.'-'.$count;
	}
	return $this->url_format($url);
}
function getArray($tablename,$field,$condition)
{
	$sql="select $field from $tablename $condition";
	$this->query($sql);
	while($row=mysql_fetch_array($this->Query_ID))
	{
		$result[]=$row[0];
	}
	return $result;
}	


function clean_num($string) {
   $string = str_replace(' ', '', $string);

   return preg_replace('/[^0-9\s]/', '', $string);
}

function master_page($page)
{
	$data[]=$this->getRow('tbl_master','`table`',"where id='".$page."'");
	$data[]=$this->getRow('tbl_master','module',"where id='".$page."'");
	$data[]=$this->getRow('tbl_master','submodule',"where id='".$page."'");
	$data[]=$this->getRow('tbl_master','pid',"where id='".$page."'");
	$data[]=$this->getRow('tbl_master','`page`',"where id='".$page."'");
	
	return $data;
}


function check_row_exists($table,$row)
{
	$result = $this->query("SHOW COLUMNS FROM `".$table."` LIKE '".$row."'");
	$exists = (mysql_num_rows($result))?TRUE:FALSE;
	return $exists;
	
}


function secureDisplay($InData,$numData)
{
		$data1=str_split($InData);
		for($i=0;$i<count($data1);$i++)
		{
			if($i<(count($data1)-$numData-1))
			{
				$data2[$i]='*';
			}
			else
			{
				$data2[$i]=$data1[$i];
			}
		}
		$data=implode('',$data2);	
		return $data;
}
function admin_log($custid,$action,$tablename,$logid) //logid and custid are same for admin
{
	$ctime=date('h:i:s A');
	$cdate=date('Y-m-d');
	$ip=$this->getRealIpAddr();
	$mac=$this->getRealMacAddr($ip);	
	$sql="insert into tbl_admin_log(`session`,`ctime`,`cdate`,`cfrom`,`curl`,`action`,`table_name`,`IP`,`macid`,`log_id`) values('".session_id()."','".$ctime."','".$cdate."','".$this->URL_FROM()."','".$this->URL()."','".$action."','".$tablename."','".$ip."','".$mac."','".$logid."')";
	$this->query($sql);
}

function get_customer_address($customerid)
{		
	$address='';
	$tempstreetno=$this->getRow('tbl_customer','streetno',"where customerid='".$customerid."'");	
	$tempstreetsuffix=$this->getRow('tbl_customer','streetsuffix',"where customerid='".$customerid."'");
	$pro=$this->getRow('tbl_customer','province',"where customerid='".$customerid."'");
	$tempstype=$this->getRow("tbl_customer","streettype","where customerid='".$customerid."'");
	$tempstype1=$this->getRow("tbl_streettype","stype","where id='".$tempstype."'");
	$tempstreetname=$this->getRow("tbl_customer","streetname","where customerid='".$customerid."'");
	$dir=$this->getRow("tbl_customer","streetdir","where customerid='".$customerid."'");
	$dir1=$this->getRow("tbl_sdirection","sdirection","where id='".$dir."'");
	$templtype=$this->getRow("tbl_customer","loc_type1","where customerid='".$customerid."'");
	$templno=$this->getRow("tbl_customer","loc_no1","where customerid='".$customerid."'");
	$templtype1=$this->getRow("tbl_loctype","loctype","where id='".$templtype."'");	
	if($tempstreetsuffix!='')
	{
		$address.=$tempstreetno.", ";
		$address.=$tempstreetsuffix.", ";
	if($pro==2)
		{
			$address.=$tempstype1."  ".$tempstreetname;
		}else
		{
		$address.=$tempstreetname."  ".$tempstype1;
		}
	}
	else
	{
		$address.=$tempstreetno.", ";
		
		if($pro==2)
		{
			$address.=$tempstype1."  ".$tempstreetname;
		}else
		{
		$address.=$tempstreetname."  ".$tempstype1;
		}
		$address.=' '.$dir1;
	}		
	if($templtype!='' & $templno!='')
		{
		$address.=", ".$templtype1." #".$templno;
		}
	$address.="<br>";
	$cid= $this->getRow("tbl_customer","city","where customerid='".$customerid."'");
	$address.=' '.$this->getRow("tbl_city","ciname","where id='".$cid."'");
	$pro= $this->getRow("tbl_customer","province","where customerid='".$customerid."'");
	$address.=', '.$this->getRow("tbl_province","pcode","where id='".$pro."'");
	$address.=' - '.$this->getRow("tbl_customer","postalcode","where customerid='".$customerid."'");
	return $address;
}

function customer_log($custid,$action,$tablename,$logid)
{
	$ctime=date('h:i:s A');
	$cdate=date('Y-m-d');
	$ip=$this->getRealIpAddr();
	$mac=$this->getRealMacAddr($ip);	
	$sql="insert into tbl_customer_log(`customerid`,`session`,`ctime`,`cdate`,`cfrom`,`curl`,`action`,`table_name`,`IP`,`macid`,`log_id`) values('".$custid."','".session_id()."','".$ctime."','".$cdate."','".$this->URL_FROM()."','".$this->URL()."','".$action."','".$tablename."','".$ip."','".$mac."','".$logid."')";
	$this->query($sql);
}


function is_array_empty($arr)
{
  if(is_array($arr))
  {     
    foreach($arr as $key => $value)
    {
        if(!empty($value) || $value != NULL || $value != "")
        {
            return true;
            break;//stop the process we have seen that at least 1 of the array has value so its not empty
        }
    }
      return 0;
  }
}
function array_trim($Array)
{
	foreach ($Array as $value)
	if (trim($value) == "")
	{
			$index = array_search($value, $Array);
			unset($Array[$index]);
	}
	return $Array;
}
function getDMY1($date)
{
	list($year, $month, $day) = split('[/.-]', $date);
	$fdate=date("F j, Y", strtotime($day.'.'.$month.'.'.$year));	
	return $fdate;
}

function getLatLong($address){    	
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false&key=AIzaSyBWoWfqptSqcHj_tAT3khy2jjj7fuANNaM&libraries=places&callback=initMap'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}

}
?>