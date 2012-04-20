<style type="text/css">
    
    .toolbar-button.root {
        background: url("<?php echo base_url(); ?>modules/Simplegooglemap/assets/images/icon_16_module.png") no-repeat scroll 4px 50% transparent;
        padding-left: 24px;
    }
    .toolbar-button.map_view {
        background: url("<?php echo base_url(); ?>modules/Simplegooglemap/assets/images/icon_preview_map_16.png") no-repeat scroll 4px 50% transparent;
        padding-left: 24px;
    }
    .toolbar-button.edit_map {
        background: url("<?php echo base_url(); ?>modules/Simplegooglemap/assets/images/icon_edit_map_16.png") no-repeat scroll 4px 50% transparent;
        padding-left: 24px;
    }
</style>
<div class="toolbox divider">
    <input id="map_view" type="button" class="toolbar-button map_view" value="<?= lang('module_simplegooglemap_map_view') ?>" />
</div>
<div class="toolbox divider">
    <input id="edit_map" type="button" class="toolbar-button edit_map" value="<?= lang('module_simplegooglemap_edit_map') ?>" />
</div>
<div class="toolbox divider">
    <input id="root" type="button" class="toolbar-button root" value="<?= lang('module_simplegooglemap_root') ?>" />
</div>
<script type="text/javascript">
	$('root').addEvent('click', function(e){
        e.stop();
        MUI.Content.update({
            'element': $('mainPanel'),
            'title': "<?= lang('module_simplegooglemap_module_name') ?>",
            'url': admin_url + 'module/simplegooglemap/simplegooglemap/index'
        });
    });
    $('map_view').addEvent('click', function(e){
        e.stop();
		MUI.Content.update({
			element: $('mainPanel'),
			loadMethod: 'iframe',
			title: "<?= lang('module_simplegooglemap_map_view') ?>",
			clear:true,
			url: admin_url + 'module/simplegooglemap/simplegooglemap/map_view'
		});
    });
    $('edit_map').addEvent('click', function(e){
        e.stop();
		MUI.Content.update({
			element: $('mainPanel'),
			loadMethod: 'iframe',
			title: "<?= lang('module_simplegooglemap_edit_map') ?>",
			clear:true,
			url: admin_url + 'module/simplegooglemap/simplegooglemap/edit_map'
		});
    });
</script>