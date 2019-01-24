<?php
session_start();
error_reporting(0);
include('../include/host.config.php');
include('../include/mysql.lib.php');
$obj=new connect;
$values=$_POST['values'];
$key=$values[0];
$meta=$values[1];
for($i=0;$i<count($key);$i++)
{	

	if($obj->getRow('tbl_meta','id',"where `key`='".$key[$i]."'")!='')
	{		
		$obj->query("update `tbl_meta` set `meta`='".$meta[$i]."',`mdon`='".date('Y-m-d H:i:s')."',`mdby`='".$_SESSION[ID]."' where `key`='".$key[$i]."'");	
		$obj->admin_log($_SESSION[ID],'Updated meta detail as "'.$meta[$i].'" for key "'.$key[$i].'"','tbl_meta',$_SESSION[ID]);
	}
	else
	{
		$obj->query("INSERT INTO `tbl_meta` (`key`, `meta`, `mdon`, `mdby`) VALUES ('".$key[$i]."', '".$meta[$i]."', '".date('Y-m-d H:i:s')."', '".$_SESSION[ID]."')");
		$obj->admin_log($_SESSION[ID],'Inserted meta detail as "'.$meta[$i].'" for key "'.$key[$i].'"','tbl_meta',$_SESSION[ID]);
	}
}
?>