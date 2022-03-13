<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<button type="submit" class="search-form__submit btn-icon"><svg width="18" height="18" fill="none"><path d="M12.5 11h-.8l-.3-.3c1-1.1 1.6-2.6 1.6-4.2a6.5 6.5 0 10-2.3 5l.3.2v.8l5 5 1.5-1.5-5-5zm-6 0a4.5 4.5 0 110-9 4.5 4.5 0 010 9z" fill="#000"/></svg></button>
	<input type="search" class="search-form__input" value="<?php echo get_search_query() ?>" name="s" />
</form>