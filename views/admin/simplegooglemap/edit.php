<!--
* File : edit_map.php
* Type : View File
* User : İskender TOTOĞLU
* Comapany : Altı ve Bir Bilişim Teknolojileri
* Website : http://www.6ve1.com
* Date : 24/01/2012
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= lang('module_simplegooglemap_module_name') ?></title>
    <link href="<?= config_item('module_simplegooglemap_assets_folder') ?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?= config_item('module_simplegooglemap_assets_folder') ?>css/simplegooglemap.css" rel="stylesheet" />
    <script type="text/javascript" src="<?= config_item('module_simplegooglemap_assets_folder') ?>js/jquery-1.8.1.min.js"></script>
    <!--[if lt IE 9]>
        <script src="<?= config_item('module_simplegooglemap_assets_folder') ?>js/html5.js"></script>
    <![endif]-->
    <script src="<?= config_item('module_simplegooglemap_assets_folder') ?>js/simplegooglemap.js"></script>
    <style type="text/css">
    	.container {margin: 0; padding: 0; }
    	.row { padding: 0; }
    	.offset1 { margin: 0 0 0 10px; }
    	.form-actions { padding: 10px 0 0 80px; }
    </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span4">
				<div id="alert-area"></div>
		        <form class="form-horizontal" id="moduleSettingsForm">
		        	<input type="hidden" id="mapTypeControl" name="mapTypeControl" value="<?= $settings['map_type_control'] ?>" />
		    		<input type="hidden" id="panControl" name="panControl" value="<?= $settings['pan_control'] ?>" />
		    		<input type="hidden" id="zoomControl" name="zoomControl" value="<?= $settings['zoom_control'] ?>" />
		    		<input type="hidden" id="scaleControl" name="scaleControl" value="<?= $settings['scale_control'] ?>" />
		    		<input type="hidden" id="streetViewControl" name="streetViewControl" value="<?= $settings['street_view_control'] ?>" />
		    		<input type="hidden" id="overviewMapControl" name="overviewMapControl" value="<?= $settings['overview_map_control'] ?>" />

                    <!-- #height -->
                    <fieldset class="control-group">
                        <label class="control-label" for="zoomLevel"><?=lang('module_simplegooglemap_height')?></label>
                        <div class="controls">
                            <input type="text" class="input-small" name="height" value="<?= $settings['height'] ?>" />
                        </div>
                    </fieldset>

                    <!-- #width -->
                    <fieldset class="control-group">
                        <label class="control-label" for="zoomLevel"><?=lang('module_simplegooglemap_width')?></label>
                        <div class="controls">
                            <input type="text" class="input-small" name="width" value="<?= $settings['width'] ?>" />
                        </div>
                    </fieldset>

		        	<!-- #markerPosition -->
		        	<fieldset class="control-group">
		        		<label class="control-label" for="markerPosition"><?=lang('module_simplegooglemap_default_marker_position')?></label>
		        		<div class="controls">
		            		<input type="text" class="input-medium" id="markerPosition" name="markerPosition" value="<?= $settings['default_marker_position'] ?>" />
		            	</div>
		            </fieldset>

		            <!-- #zoomLevel -->
		            <fieldset class="control-group">
		        		<label class="control-label" for="zoomLevel"><?=lang('module_simplegooglemap_zoom_level')?></label>
		        		<div class="controls">
		            		<input type="text" class="input-small" id="zoomLevel" name="zoomLevel" value="<?= $settings['zoom_level'] ?>" />
		            	</div>
		            </fieldset>

		            <!-- #mapType -->
					<fieldset class="control-group">
						<label class="control-label" for="mapType"><?=lang('module_simplegooglemap_map_type')?></label>
						<div class="controls">
			                <select id="mapType" data-setting="mapType" name="mapType" class="input-medium">
		                        <option value="SATELLITE"<?= ($settings['map_type'] === 'SATELLITE') ? ' selected="selected"' : '' ?>><?=lang('module_simplegooglemap_map_type_satellite')?></option>
		                        <option value="TERRAIN"<?= ($settings['map_type'] === 'TERRAIN') ? ' selected="selected"' : '' ?>><?=lang('module_simplegooglemap_map_type_terrain')?></option>
		                        <option value="ROADMAP"<?= ($settings['map_type'] === 'ROADMAP') ? ' selected="selected"' : '' ?>><?=lang('module_simplegooglemap_map_type_roadmap')?></option>
		                        <option value="HYBRID"<?= ($settings['map_type'] === 'HYBRID') ? ' selected="selected"' : '' ?>><?=lang('module_simplegooglemap_map_type_hybrid')?></option>
		                    </select>
			            </div>
					</fieldset>

		            <!-- #mapTypeControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_map_type_control')?></label>
						<div class="controls btn-group" data-setting="mapTypeControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['map_type_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['map_type_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

		            <!-- #panControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_pan_control')?></label>
						<div class="controls btn-group" data-setting="panControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['pan_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['pan_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

		            <!-- #zoomControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_zoom_control')?></label>
						<div class="controls btn-group" data-setting="zoomControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['zoom_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['zoom_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

		            <!-- #scaleControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_scale_control')?></label>
						<div class="controls btn-group" data-setting="scaleControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['scale_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['scale_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

		            <!-- #streetViewControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_street_view_control')?></label>
						<div class="controls btn-group" data-setting="streetViewControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['street_view_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['street_view_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

					<!-- #overviewMapControl -->
					<fieldset class="control-group">
						<label class="control-label"><?=lang('module_simplegooglemap_overview_map_control')?></label>
						<div class="controls btn-group" data-setting="overviewMapControl" data-toggle="buttons-radio">
			                <button class="btn btn-primary <?= ($settings['overview_map_control'] === 'true') ? 'active' : '' ?>" value="true"><?=lang('module_simplegooglemap_option_on')?></button>
			                <button class="btn btn-primary <?= ($settings['overview_map_control'] === 'false') ? 'active' : '' ?>" value="false"><?=lang('module_simplegooglemap_option_off')?></button>
			            </div>
					</fieldset>

					<ul id="mapTabs" class="nav nav-tabs">
						<?php foreach(Settings::get_languages() as $l): ?>
							<li <?= ($l['def'] == 1) ? 'class="active"' : '' ?>><a href="#<?= $l['lang'] ?>" data-toggle="tab"><?= $l['name'] ?></a></li>
						<?php endforeach; ?>
					</ul>

					<div id="mapTabsContent" class="tab-content">
						<?php foreach(Settings::get_languages() as $l): ?>
				            <div class="tab-pane fade <?= ($l['def'] == 1) ? 'in active' : '' ?>" id="<?= $l['lang'] ?>">
				            	<!-- Title -->
				            	<div class="control-group">
									<label class="control-label" style="width:60px;" for="title_<?= $l['lang'] ?>"><?=lang('ionize_label_title')?></label>
									<div class="controls" style="margin-left:80px;">
										<input type="text" class="input-large focused" id="title_<?= $l['lang'] ?>" name="title_<?= $l['lang'] ?>" value="<?= $lang_data[$l['lang']]['title'] ?>" />
									</div>
								</div>
								<!-- Description -->
				            	<div class="control-group">
									<label class="control-label" style="width:60px;" for="description_<?= $l['lang'] ?>"><?=lang('ionize_label_description')?></label>
									<div class="controls" style="margin-left:80px;">
										<textarea class="input-large" name="description_<?= $l['lang'] ?>" id="description_<?= $l['lang'] ?>" rows="3"/><?= $lang_data[$l['lang']]['description'] ?></textarea>
									</div>
								</div>
				            </div>
				        <?php endforeach; ?>
			        </div>

					<fieldset class="form-actions">
						<input type="submit" class="btn btn-success" id="settingsFormSubmit" value="<?= lang('module_simplegooglemap_save_map_settings')?>" />
					</fieldset>

		        </form>
			</div>
			<div class="span7">
				<div id="mapCanvas"></div>
			</div>
		</div>
	</div><!-- end of .container -->
<!-- Google Map JS -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
$(function () {
    $('[href^=#], .btn').click(function (e) {
        e.preventDefault()
    })

    $().button()

    $('#settingsFormSubmit').click(function(){
		$.ajax({
			type:'POST',
			url:'<?= $controller_url ?>saveSettings',
			data:$('#moduleSettingsForm').serialize(),
			dataType:'json',
			success:function(textStatus){
				switch (textStatus) {
	                case 'success':
	                    newAlert("alert-success", "<?= lang('module_simplegooglemap_settings_saved') ?>");
	                    break
	                case 'error':
	                    newAlert("alert-error", "<?= lang('module_simplegooglemap_settings_nsaved') ?>");
	                    break
	            }
			},
			error:function (){
				newAlert("alert-error", "<?= lang('module_simplegooglemap_settings_nsaved') ?>");
			}
		});
		return false;
	});
});
function updateMarkerPosition(latLng) {
    document.getElementById('markerPosition').value = [
        latLng.lat(),
        latLng.lng()
    ].join(', ');
}
function newAlert(type, message) {
	$("#alert-area").append($("<div class='alert alert-block " + type + " fade in'><a class='close' data-dismiss='alert' href='#'>&times;</a><p> " + message + " </p></div>"));

	setTimeout(function() {
		$(".alert").fadeOut("slow", function() {
			this.parentNode.removeChild(this);
		});
	}, 2000);
}
function initialize() {
    var latLng = new google.maps.LatLng(<?= $settings['default_marker_position'] ?>);

    var myOptions = {
        zoom:<?= $settings['zoom_level'] ?>,
        panControl:<?= $settings['pan_control'] ?>,
        zoomControl:<?= $settings['zoom_control'] ?>,
        scaleControl:<?= $settings['scale_control'] ?>,
        mapTypeControl:<?= $settings['map_type_control'] ?>,
        streetViewControl:<?= $settings['street_view_control'] ?>,
        overviewMapControl:<?= $settings['overview_map_control'] ?>,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.<?= $settings['map_type'] ?>
    }

    var map = new google.maps.Map(document.getElementById('mapCanvas'), myOptions);

    var marker = new google.maps.Marker({
        position:latLng,
        title:'<?= lang('module_simplegooglemap_drag_and_drop_marker') ?>',
        map:map,
        draggable:true
    });

    // Update current position info.
    updateMarkerPosition(latLng);

    google.maps.event.addListener(marker, 'drag', function () {
        updateMarkerPosition(marker.getPosition());
    });
    google.maps.event.addListener(map, 'zoom_changed', function() {
    	zoomLevel = map.getZoom();
    	document.getElementById('zoomLevel').value = [zoomLevel];
    });

    // Switch To Clicked Map Type
    $("[data-setting=mapType]").change(function () {
        // Map Types = HYBRID, ROADMAP, SATELLITE, TERRAIN
        if ($(this).val()) {
            switch ($(this).val()) {
                case 'HYBRID':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.HYBRID
                    });
                    break
                case 'ROADMAP':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                    });
                    break
                case 'SATELLITE':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.SATELLITE
                    });
                    break
                case 'TERRAIN':
                    map.setOptions({
                        mapTypeId:google.maps.MapTypeId.TERRAIN
                    });
                    break
            }
            $(this).children('input').change();
        }
    });// !end of mapType

    $("[data-setting=mapTypeControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('mapTypeControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        mapTypeControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        mapTypeControl:false
                    });
                    break
            }
		}
    });// !end of panControl

    $("[data-setting=panControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('panControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        panControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        panControl:false
                    });
                    break
            }
		}
    });// !end of panControl

    $("[data-setting=zoomControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('zoomControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        zoomControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        zoomControl:false
                    });
                    break
            }
		}
    });// !end of zoomControl

    $("[data-setting=scaleControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('scaleControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        scaleControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        scaleControl:false
                    });
                    break
            }
		}
    });// !end of scaleControl

    $("[data-setting=streetViewControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('streetViewControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        streetViewControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        streetViewControl:false
                    });
                    break
            }
		}
    });// !end of streetViewControl

    $("[data-setting=overviewMapControl] button").click(function () {
    	var buttonValue = $(this).val();

        if (buttonValue != '') {

        	document.getElementById('overviewMapControl').value = [buttonValue];

            // Options : true, false
            switch (buttonValue) {
                case 'true':
                    map.setOptions({
                        overviewMapControl:true
                    });
                    break
                case 'false':
                    map.setOptions({
                        overviewMapControl:false
                    });
                    break
            }
		}
    });// !end of overviewMapControl

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
</body>
</html>
