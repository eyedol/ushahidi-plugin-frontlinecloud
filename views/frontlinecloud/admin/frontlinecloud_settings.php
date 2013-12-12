<div class="row">
	<h4 class="fix"><a href="#" class="tooltip" title="<?php echo Kohana::lang("frontlinecloud.tooltip.connect"); ?>"> <?php echo Kohana::lang('frontlinecloud.settings.connect');?></a></h4>
	<p>
		<?php echo Kohana::lang('frontlinecloud.settings.description');?>.
	</p>
</div>
<table style="width: 630px;" class="my_table">
	<tr>
		<td>
			<span class="big_blue_span"><?php echo Kohana::lang('frontlinecloud.settings.step');?> 1:</span>
		</td>
		<td>
			<h4 class="fix"><?php echo Kohana::lang('frontlinecloud.settings.create');?></a></h4>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.create_instructions');?>
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<span class="big_blue_span"><?php echo Kohana::lang('frontlinecloud.settings.step');?> 2:</span>
		</td>
		<td>
			<h4 class="fix"><?php echo Kohana::lang('frontlinecloud.settings.configure');?></a></h4>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.enter_url');?>.
			</p>
			<p class="sync_key">
				<?php echo $frontlinecloud_link; ?>
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.configure_sender');?>.
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.configure_sender_field', $frontlinecloud_sender);?>.
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.configure_add_param');?>.
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.configure_message');?>.
			</p>
			<p>
				<?php echo Kohana::lang('frontlinecloud.settings.configure_message_field', $frontlinecloud_message);?>.
			</p>
		</td>
	</tr>
	<tr>
		<td>
			<span class="big_blue_span"><?php echo Kohana::lang('frontlinecloud.settings.step');?> 3:</span>
		</td>
		<td>
			<h4 class="fix"><?php echo Kohana::lang('frontlinecloud.settings.enable_api');?></a></h4>
			<p class"sync_key">
				<?php echo Kohana::lang('frontlinecloud.settings.secret', '<span class="sync_key">'.$frontlinecloud_key.'</span>');?>.
			</p>
			<div class="row link-row">
				<h4><?php echo Kohana::lang('frontlinecloud.settings.enter_api_url');?>.</h4>
				<?php print form::input('frontlinecloud_api_url', $form['frontlinecloud_api_url'], ' class="text long"'); ?>
			</div>
		</td>
	</tr>
</table>
