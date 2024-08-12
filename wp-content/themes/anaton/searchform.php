<div class="sidebar-info">
	<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
		<input type="text"  placeholder="<?php esc_attr_e( 'Search Here...', 'anaton' )?>" name="s" class="form-control" id="search-box" value="<?php the_search_query(); ?>" >
		<button type="submit"><i class="fas fa-search"></i></button>
	</form>
</div>
