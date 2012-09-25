<div id="maincolumn">
	<h2 class="main" style="background:url(<?= config_item('module_simplegooglemap_assets_folder') ?>images/icon_48_module.png) no-repeat top left;"><?php echo lang('module_simplegooglemap_module_name'); ?></h2>
	<div class="subtitle">
		<p class="lite"><?= lang('module_simplegooglemap_module_usage') ?></p>
	</div>
    <?= trace($settings) ?>
	<?php echo lang('module_simplegooglemap_doc_content') ?>
</div>
<script type="text/javascript">
	/** Module Panel toolbox **/
	ION.initModuleToolbox('<?php echo config_item('module_simplegooglemap_folder_lowercase') ?>','simplegooglemap_toolbox');
</script>