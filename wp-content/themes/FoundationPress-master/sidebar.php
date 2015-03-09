<aside id="sidebar" class="small-12 large-4 columns">

	<div class="sidebar">

		<div class="separator-sidebar"></div>
		
		<?php do_action('foundationPress_before_sidebar'); ?>
		<?php dynamic_sidebar("sidebar-widgets"); ?>
		<?php do_action('foundationPress_after_sidebar'); ?>

		
	</div>

</aside>
