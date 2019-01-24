<?php include('header.php');
include('secure.php');
?>
<script type="text/javascript">
modernAlert();
</script>
<body>
<div class="wrap">       
<?php include('menu.php'); ?>
<div class="content">                
<div class="content-header">                    
<div class="leftside-content-header">
<ul class="breadcrumbs">
<li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Master</a></li>
<li><a href="<?=BASEURL?>index.php">Site Settings</a></li>
</ul>
</div>
</div>

<div class="row animated fadeInUp">                                
<div class="col-sm-12">                    
<div class="panel">
<div class="panel-content">
<div class="row">
<div class="col-sm-offset-2 col-md-8">
<div class="panel-group" id="accordion_group6">                                        

<div class="panel panel-accordion">
<div class="panel-header panel-darker-1">
    <a class="panel-title" data-toggle="collapse" data-parent="#accordion_group6" href="#panel_theme" aria-expanded="true">
        <i class="fa fa-wrench"></i>&nbsp;&nbsp;&nbsp;Panel Theme Settings
    </a>
</div>
<div id="panel_theme" class="panel-collapse collapse in">
    <div class="panel-content">
		<!-- Forms -->
		<div class="row">
		<div class="col-md-12">
		<form id="inline-validation" autocomplete="off" class="form-horizontal" action="<?=BASEURL?>index.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Panel Color</label>
		<div class="col-sm-7">
		<?php $panel_color=$obj->getRow('tbl_meta','meta',"where `key`='panel_color'"); ?>
		<input type="text" class="form-control" id="panel_color" name="panel_color" value="<?=$panel_color?>">
		</div>
		<div class="col-sm-2" style="margin-top:5px;">
		<p style="background-color:<?=$panel_color?>;display:inline;vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</div>
		</div>

		<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Button Hover Color (Dark)</label>
		<div class="col-sm-7">
		<?php $btn_hover_color=$obj->getRow('tbl_meta','meta',"where `key`='btn_hover_color'"); ?>
		<input type="text" class="form-control" id="btn_hover_color" name="btn_hover_color" value="<?=$btn_hover_color?>">
		</div>
		<div class="col-sm-2" style="margin-top:5px;">
		<p style="background-color:<?=$btn_hover_color?>;display:inline;vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</div>
		</div>			

		<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Button Hover Color (Light)</label>
		<div class="col-sm-7">
		<?php $btn_hover_colorl=$obj->getRow('tbl_meta','meta',"where `key`='btn_hover_colorl'"); ?>
		<input type="text" class="form-control" id="btn_hover_colorl" name="btn_hover_colorl" value="<?=$btn_hover_colorl?>">
		</div>
		<div class="col-sm-2" style="margin-top:5px;">
		<p style="background-color:<?=$btn_hover_colorl?>;display:inline;vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</div>
		</div>

		<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Font-Family</label>
		<div class="col-sm-7">
		<?php $body_font_family=$obj->getRow('tbl_meta','meta',"where `key`='body_font_family'"); ?>
		<select class="form-control" id="body_font_family" name="body_font_family">
		<option value='"Open Sans", Arial, sans-serif' <?php if($body_font_family=='"Open Sans", Arial, sans-serif') { echo 'selected'; } ?>>"Open Sans", Arial, sans-serif</option>
		<option value='Cambria' <?php if($body_font_family=='Cambria') { echo 'selected'; } ?>>Cambria</option>
		<option value='Calibri' <?php if($body_font_family=='Calibri') { echo 'selected'; } ?>>Calibri</option>
		<option value='Times New Roman' <?php if($body_font_family=='Times New Roman') { echo 'selected'; } ?>>Times New Roman</option>
		<option value='Hobo' <?php if($body_font_family=='Hobo') { echo 'selected'; } ?>>Hobo</option>
		<option value='Forte' <?php if($body_font_family=='Forte') { echo 'selected'; } ?>>Forte</option>
		<option value='Tempus Sans ITC' <?php if($body_font_family=='Tempus Sans ITC') { echo 'selected'; } ?>>Tempus Sans ITC</option>
		<option value='Chaparral Pro Light' <?php if($body_font_family=='Chaparral Pro Light') { echo 'selected'; } ?>>Chaparral Pro Light</option>
		<option value='Jokerman' <?php if($body_font_family=='Jokerman') { echo 'selected'; } ?>>Jokerman</option>
		<option value='Copperplate Gothic' <?php if($body_font_family=='Copperplate Gothic') { echo 'selected'; } ?>>Copperplate Gothic</option>
		<option value='Comic Sans MS' <?php if($body_font_family=='Comic Sans MS') { echo 'selected'; } ?>>Comic Sans MS</option>
		<option value='Lucida Calligraphy' <?php if($body_font_family=='Lucida Calligraphy') { echo 'selected'; } ?>>Lucida Calligraphy</option>
		<option value='Lucida Handwriting' <?php if($body_font_family=='Lucida Handwriting') { echo 'selected'; } ?>>Lucida Handwriting</option>
		<option value='Verdana' <?php if($body_font_family=='Verdana') { echo 'selected'; } ?>>Verdana</option>	
		<option value='Tahoma' <?php if($body_font_family=='Tahoma') { echo 'selected'; } ?>>Tahoma</option>	
		</select>
		</div>
		<div class="col-sm-2" style="margin-top:5px;">
		<p style="background-color:<?=$body_font_family?>;display:inline;vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;</p>
		</div>
		</div>			

		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-9 center_text">
		<input type="hidden" id="panel_options" value="panel_color,btn_hover_color,btn_hover_colorl,body_font_family">
		<button type="button" onClick="update_meta('panel_options','index.php');" name="update_theme" id="update_theme" class="btn btn-primary">Update</button>
		</div>
		</div>
		</form>
		</div>
		</div>
		<!-- End of Form -->
    </div>
</div>
</div>


</div>
</div>                                                               
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>
<script>
$('#panel_color').colorpicker({format: "hex"});
$('#btn_hover_color').colorpicker({format: "hex"});
$('#btn_hover_colorl').colorpicker({format: "hex"});
</script>