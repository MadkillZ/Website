<!DOCTYPE html>
<html lang="en">
	<title>Preferences</title>
	<meta charset="utf-8">
	<meta name="author" content="Francois Viviers">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/form.css" type="text/css">
<link rel="stylesheet" href="css/switch.css" type="text/css">

<body>
<?php
	include 'php/header.php'
?>
<div id="character_dis">
        <form if="" style="align-self: left;" action="">
            <div class="DataObjectPageLeft row form">
                <h2 style="margin: 0px;" id="settings_title">Filter by rating:</h2>
            </div>
            <hr style="width: 570px; float: left;">

            <div id="setting0" class="DataObjectPageRight row">
                <div class="col">
                    <p style="margin: 0px;" id="setting0_name">Ascending:</p>
                </div>
                <div class="col">
                    <label class="switch">
                        <input type="checkbox" class="radio" name="setting0_input" id="setting0_input">
                        <span class="slider round"></span>
                    </label>
					
                </div>
            </div>
			<div id="setting0" class="DataObjectPageRight row">
                <div class="col">
                    <p style="margin: 0px;" id="setting0_name">Descending:</p>
                </div>
                <div class="col">
                    <label class="switch">
                        <input type="checkbox" class="radio" name="setting0_input" id="setting1_input">
                        <span class="slider round"></span>
                    </label>
					
                </div>
            </div>
            <hr style="width: 570px; float: left;">

            <div class="DataObjectPageLeft row">
                <div class="col">
                    <button class="input" type="submit" id="setting_save">Save</button>
                </div>
                <div class="col">
                    <p id="setting_error"></p>
                </div>
            </div>
			<label id="message123"></label>
        </form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$("input:checkbox").on('click', function() {
		var $box = $(this);
		if ($box.is(":checked")) {
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
		});
		$("#setting_save").click(function(){
			if ($('#setting0_input').is(':checked')){
				document.cookie = "pref=Asc";
			}
			else if ($('#setting1_input').is(':checked')){
				document.cookie = "pref=Desc";
				
			}
			$("#message123").text("Preference updated!");
		});
	</script>
</body>