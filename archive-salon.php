<?php

get_header();

?>

	<section id="salons-grid">
		<div class="container">
			<div class="title">
				<h2 class="title__heading"><?=__( 'Наши салоны', 'pdp' ); ?></h2>
			</div>

            <div class="salons-grid">
	            <?php

	            if( have_posts() ) :
		            while( have_posts() ) :
			            the_post();
			            pdp_get_salon_card( get_the_ID() );
		            endwhile;
	            endif;

	            ?>
            </div>
		</div>
	</section>

	<section id="salons-map">
		<div class="container">
			<?php pdp_get_map( false ); ?>
		</div>
	</section>

	<section id="salons-banner">
		<div class="container">
			<?php pdp_get_banner( 11465 ); ?>
		</div>
	</section>

<?php get_footer(); ?>