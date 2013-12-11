<table style="width: 630px;" class="my_table">
	<tr>
		<td>
			<span class="big_blue_span"><?php echo Kohana::lang('ui_main.step');?> 1:</span>
		</td>
		<td>
			<h4 class="fix"><a href="#" class="tooltip" title="<?php echo Kohana::lang("tooltips.settings_flsms_synchronize"); ?>"><?php echo Kohana::lang('settings.sms.flsms_synchronize');?></a></h4>
			<p>
				<?php echo Kohana::lang('settings.instructions');?>.
			</p>
			<p class="sync_key">
				<?php echo Kohana::lang('settings.sms.flsms_key');?>: <span><?php echo $frontlinecloud_key; ?></span><br /><br />
				<?php echo Kohana::lang('settings.sms.flsms_link');?>:<br /><span><?php echo $frontlinecloud_link; ?></span>
			</p>
		</td>
	</tr>
</table>
