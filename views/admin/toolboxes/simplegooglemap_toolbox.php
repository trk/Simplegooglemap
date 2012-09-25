<style type="text/css">
    
    .toolbar-button.root {
        background: url("<?= config_item('module_simplegooglemap_assets_folder') ?>images/icon_16_module.png") no-repeat scroll 4px 50% transparent;
        padding-left: 24px;
    }
    .toolbar-button.map_view {
        background: url("<?= config_item('module_simplegooglemap_assets_folder') ?>images/icon_preview_map_16.png") no-repeat scroll 4px 50% transparent;
        padding-left: 24px;
    }
    .toolbar-button.edit_map {
        background: url("<?= config_item('module_simplegooglemap_assets_folder') ?>images/icon_edit_map_16.png") no-repeat scroll 4px 50% transparent;
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
            'url': '<?= $controller_url ?>index'
        });
    });
    $('map_view').addEvent('click', function(e){
        e.stop();
		MUI.Content.update({
			element: $('mainPanel'),
			loadMethod: 'iframe',
			title: "<?= lang('module_simplegooglemap_map_view') ?>",
			clear:true,
			url: '<?= $controller_url ?>view_map'
		});
    });
    $('edit_map').addEvent('click', function(e){
        e.stop();
		MUI.Content.update({
			element: $('mainPanel'),
			loadMethod: 'iframe',
			title: "<?= lang('module_simplegooglemap_edit_map') ?>",
			clear:true,
			url: '<?= $controller_url ?>edit_map'
		});
    });
</script>