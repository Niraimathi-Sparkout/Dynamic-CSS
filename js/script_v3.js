function subpriv(id)
{
	if($('#b'+id).html()=='Hide Submodules')
	{
		$('#s'+id).toggle(300);
		$('#b'+id).html('Show Submodules');
	}else
	{
		$('#s'+id).show(300);
		$('#b'+id).html('Hide Submodules');
	}
}
//Login 
function login_check(base)
{
	var uname=document.getElementById('uname').value;
	var pass=document.getElementById('pass').value;
	var nxt=document.getElementById('nxt').value;
	if(uname=='' && pass=='')
	{
		 $('#status').fadeOut(100).html('Please enter username and password').fadeIn(500);
	}else if(uname=='')
	{
		 $('#status').fadeOut(100).html('Please enter username').fadeIn(500);
	}else if(pass=='')
	{
		 $('#status').fadeOut(100).html('Please enter password').fadeIn(500);
	}else
	{
	$.ajax({
           type: "POST",
           url: base+'login_check.php',
		   data: {
       			 uname:uname,
        		 pass:pass,
                 },
           success: function(respon)
           {   
           		// alert(respon);        	  	
			  var respon1=respon.split('~');
			  if(respon1[0]=='NO')
			  {
			   $('#status').fadeOut(100).html(respon1[1]).fadeIn(500);
			  }else if(respon1[0]=='NOT')
			  {
			   $('#status').fadeOut(100).html(respon1[1]).fadeIn(500);
			   $('#link').fadeOut(100).html(respon1[2]).fadeIn(500);
			  }
			  else if(respon1[0]=='YES')
			  {
				 $('#status').fadeOut(100).html(respon1[1]).fadeIn(500);
				 $('.body-login').fadeOut(1200,function() {
				  if(nxt!='')
				  {
					  window.location.href =nxt;
				  }else
				  {
				 	 window.location.href = base+'Dashboard/';
				  }
				});
			  }
           }
         });
	}
	return false;
}
//End of login

// new

function empty_validation(fieldList,btn_id)
{
	// alert(btn_id);
	var field=new Array();
	field=fieldList.split("~");
	var counter=0;
	for(i=0;i<field.length;i++) 
	{
		if($('#'+field[i]).val()=="") 
		{
			$('#'+field[i]).css('border-color','#ffa39c');
			counter++;
		} 
		else 
		{
			$('#'+field[i]).css('border-color','');
		}
	}
	if(counter>0) 
	{
		alert("The field mark as red could not left empty","Validation!");
		return false;				
	}  
	else 
	{
		document.getElementById(btn_id).disabled=true;
		return true;
	}
}

function empty_validation_message(fieldList,btn_id)
{
	// alert(btn_id);
	var field=new Array();
	field=fieldList.split("~");
	var counter=0;
	var counter1=0;
	for(i=0;i<field.length;i++) 
	{		
		if(field[i]=="msg") 
		{
			var textbox_data = CKEDITOR.instances.msg.getData();
			if(textbox_data=='')
			{				
				counter1++;
			}
		}
		else if(field[i]=="emsg") 
		{
			var textbox_data = CKEDITOR.instances.emsg.getData();
			if(textbox_data=='')
			{				
				counter1++;
			}
		}
		else if(field[i]=="content") 
		{
			var textbox_data = CKEDITOR.instances.content.getData();
			if(textbox_data=='')
			{				
				counter1++;
			}
		}
		else if(field[i]=="econtent") 
		{
			var textbox_data = CKEDITOR.instances.econtent.getData();
			if(textbox_data=='')
			{				
				counter1++;
			}
		}
		else if($('#'+field[i]).val()=="") 
		{
			$('#'+field[i]).css('border-color','#ffa39c');
			counter++;
		} 
		else 
		{
			$('#'+field[i]).css('border-color','');
		}
	}
	if(counter>0) 
	{
		alert("The field mark as red could not left empty","Validation!");
		return false;				
	}
	else if(counter1>0) 
	{
		alert('Please Add Message!');
		return false;				
	}  
	else 
	{
		document.getElementById(btn_id).disabled=true;
		return true;
	}
}

function get_privileges(role)
{
	var base=$('#base').val();
	if(role!='')
	{
	$.ajax({
	   type: "POST",
	   url: base+'ajax/get_privileges.php',
	   data: {				 
			 role:role
			 },
	   success: function(respon)
	   {		  	   	  		  
		  $('#privilege').show('slow');		  
		  $('#privilege').html(respon);		  
	   }
	 });
	}
	else
	{
		$('#privilege').hide('slow');
	}
}

function edit_page(id,url,addblock,editblock)
{
var base=$('#base').val();
$.ajax({
	   type: "POST",
	   url: base+'ajax/'+url,
	   data: {				 
			 id:id
			 },
	   success: function(respon)
	   {		  	   	  
		  $('#'+addblock).hide('slow');
		  $('#'+editblock).show('slow');
		  $('#'+editblock).html(respon);
		  window.scrollTo(0,0);
	   }
	 });
}

function logout()
{
	 $('body').fadeOut(1200,function() {
	 window.location.href = 'Logout/';			 
	});
}

function update_meta(meta,redirect)
{
	var option=$('#'+meta).val();
	option=option.split(',');
	var values= [];
	for(var i=0;i<option.length;i++)
	{
		values[i]=$('#'+option[i]).val();				
	}
	var base=$('#base').val();
	var full=[];
	full[0]=option;	
	full[1]=values;	
	$.ajax({
		   type: "POST",
		   url: base+'ajax/save_meta.php',
		   data: {				 		   		
				 values:full,
				 },
		   success: function(respon)
		   {
			  alert("Saved Successfully!!","Notification!",redirect);
		   }
		 });
}

function get_master_options(params,cid)
{		
	var base=$('#base').val();	
	$.ajax({
	   type: "POST",
	   url: base+'ajax/get_master_options.php',
	   data: {				 		   		
			 params:params,cid:cid,
			 },
	   success: function(respon)
	   {
	   		respon=respon.split('!');
	   		opt=respon[0].split('~');
	   		id=respon[1].split('~');
	   		for (var i = 0; i < opt.length; i++) 
	   		{	   		
			$('#'+id[i]).html(opt[i]);	   			
	   		};
	   }
	 });
}

function get_city(val,cid)
{	
	var base=$('#base').val();	
	$.ajax({
		   type: "POST",
		   url: base+'ajax/getcity.php',
		   data: {				 		   		
				 pid:val,
				 },
		   success: function(respon)
		   {
				$('#'+cid).html(respon);
		   }
		 });
}

function getprovince(cid,pid)
{
	var base=$('#base').val();		
	$.ajax({
		   type: "POST",
		   url: base+'ajax/get_province.php',
		   data: {				 		   		
				 cid:cid,
				 },
		   success: function(respon)
		   {		   		
				$('#'+pid).html(respon);
		   }
		 });
}

function changecase1(id)
{
	document.getElementById(id).value=(document.getElementById(id).value).toUpperCase();
	var pc=document.getElementById(id).value;
	if(pc.length>5)
	{
		var s1=pc.substr(0,3);
		var s2=pc.substr(3,3);
		var s3=s1+" "+s2;
		document.getElementById(id).value=s3;
	}
	if(pc!='')
	{
		Validate(id);
	}
}
function Validate(id)
{
var regEx = /[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]/;
if(regEx.test(document.getElementById(id).value))
{
	return true;
}
else
{	
alert('Enter a valid postal code','Invalid !');
var a=document.getElementById(id).value;
document.getElementById(id).value=a;
return false;
}
}

function isNumberKey(evt)
{
	 var charCode = (evt.which) ? evt.which : event.keyCode
	 if (charCode > 31 && (charCode < 48 || charCode > 57))
	    return false;
	 return true;
}

function isNumberDecKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
 return true;
}
function isCharKey(evt) 
{
var charCode = (evt.which) ? evt.which : event.keyCode
if((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode==32)
{
	return true;
}
else
{
	return false;
}
}

function get_dynamic_options(tbl,field,cond,id) 
{	
	var base=$('#base').val();
	$.ajax({
       type: "POST",
       url: base+'ajax/getdynamicoptions.php',
       data: {
		tbl:tbl,field:field,cond:cond,
		},	
       success: function(respon) 
       { 
       		$('#'+id).html(respon); 
       }
     });
}

function isFloatNumberKey(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


function selectAll(name) {
var items = document.getElementsByName(name+'[]');        
for (var i = 0; i < items.length; i++) {
    if (items[i].type == 'checkbox')
        items[i].checked = true;
}
}

function UnSelectAll(name) {
var items = document.getElementsByName(name+'[]');
for (var i = 0; i < items.length; i++) {
    if (items[i].type == 'checkbox')
        items[i].checked = false;
}
}
function getUsers(roleid,cid,uid)
{
	var base=$('#base').val();	
	var cid=document.getElementById(cid).value;
	$.ajax({
	  url:base+'ajax/get_userslist.php',
	  type:'POST',
	  data:({
		  roleid:roleid,cid:cid,
		  }),
		  success:function(resp)
		  {	
		  	// alert(resp);
			$('#'+uid).html(resp);
		  }	  
	  });
}
function getRoles(cid,role)
{
	var base=$('#base').val();		
	$.ajax({
	  url:base+'ajax/get_rolelist.php',
	  type:'POST',
	  data:({
		  cid:cid,
		  }),
		  success:function(resp)
		  {	
		  	// alert(resp);
			$('#'+role).html(resp);
		  }	  
	  });
}

function validate_email(id,val) 
{
if(val!='')
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(val))
  {
    return true;
  }
    alert("You have entered an invalid email address!",'Notification!');
    $('#'+id).val('');
    return false;
}
}

//***************Reports Start**************//

function get_report(file,id,fields)
{
	if(fields!='')
	{
	var values=Array();
	fields=fields.split('~');
	for (var i = 0; i < fields.length; i++) 
	{
		values[i]=document.getElementById(fields[i]).value;
	};	
	}
	var base=$('#base').val();	
	$.ajax({
		   type: "POST",
		   url: base+'ajax/'+file,
		   data: { fields:fields,values:values },
		   success: function(respon)
		   {		   	
			$('#'+id).html(respon);
		   }
		});
}

// function open_sub(id)
// {
// 	var flag=$('#'+id+'_flag').val();
// 	if(flag==0)
// 	{
// 	$('#'+id).show('slow');
// 	$('#'+id+'_flag').val(1);
// 	}
// 	else
// 	{
// 	$('#'+id).hide('slow');
// 	$('#'+id+'_flag').val(0);
// 	}
// }