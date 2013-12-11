<table style="width: 630px;" class="my_table">
	<tr>
		<td>
			<span class="big_blue_span"><?php echo Kohana::lang('frontlinecloud.settings.step');?> 1:</span>
		</td>
		<td>
			<h4 class="fix"><a href="#" class="tooltip" title="<?php echo Kohana::lang("frontlinecloud.tooltip.connect"); ?>"> <?php echo Kohana::lang('frontlinecloud.settings.connect');?></a></h4>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.description');?>.
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.instructions');?>.
			</p>
			<p class="sync_key">
				<?php echo Kohana::lang('settings.sms.flsms_key');?>: <span><?php echo $frontlinecloud_key; ?></span><br /><br />
				<?php echo Kohana::lang('settings.sms.flsms_link');?>:<br /><span><?php echo $frontlinecloud_link; ?></span>
			</p>
		</td>
	</tr>
</table>
