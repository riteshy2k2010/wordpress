<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


<div class="single-page-banner">
	<?php if ( is_single() ) : ?>
	<div class="container">	
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	</div>
	<?php endif; // is_single() ?>
</div>
</div>


<div class="single-page-in">
	<div class="container">
		<div class="row">
			<div class="col-md-9">	
				<div id="primary" class="site-content">
					<div id="content" role="main">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
                            <p>
								<?php
								$id = get_the_ID();
					            $website = get_field('website__blog', $id);
								$instagram = get_field('instagram', $id);						                                                 //echo $instagram;
								?>
								<?php
								 if(!empty($website)){
								?>
								<span><strong style="color: #e50b16;">Website :</strong> <?php echo $website;?></span><br>
								<?php
								 }
								?>
								<?php
								 if(!empty($instagram)){
								?>
								<span><strong style="color: #e50b16;">Instagram :</strong> <?php echo $instagram;?></span><br>
								<?php
								 }
								?>
							</p>
						    <p>
							   <?php
								$id = get_the_ID();
								$surname = get_field('surname', $id);
								if(!empty($surname)){
							   ?>
							<span><strong></strong> <?php echo $surname;?> </span><br>
								<?php
								}
								?>
						    </p>
							<?php get_template_part( 'content', get_post_format() ); ?>

							<div class="single-nav">
								<div class="container">
									<nav class="nav-single">
										<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
										<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span> 
										<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
									</nav>
									<!-- .nav-single -->
								</div>
							</div>

							<?php // comments_template( '', true ); ?>

						<?php endwhile; // End of the loop. ?>

					</div><!-- #content -->
				</div>
			</div>
			<div class="col-md-3 blog-sidebar">
				<div class="wpb_wrapper">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="wpb_wrapper">
			      <h4 class="related-desc">Weitere Szenarien</h4>
				     <?php
						$related_query = new WP_Query(array(
							'post_type' => 'post',
							'posts_per_page' => 6,
							'orderby' => 'rand'
    					));
						?>
					<?php //print_r(get_queried_object_id());?>
					<?php if ($related_query->have_posts()) { ?>

						<div class="related-posts-grid">

							<?php while ($related_query->have_posts()) { ?>

								<?php $related_query->the_post(); ?>

								<div class="grid-item">

									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('post-thumb-small'); ?>
									</a>

									<h5 class="related-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h5>
									<p>
										<?php
										$id = get_the_ID();
							            $website = get_field('website__blog', $id);
										$instagram = get_field('instagram', $id);						                                                 //echo $instagram;
										?>
										<?php
										 if(!empty($website)){
										?>
										<span><strong style="color: #e50b16;">Website : </strong><?php echo $website;?></span><br>
										<?php
										 }
										?>
										<?php
										 if(!empty($instagram)){
										?>
										<span><strong style="color: #e50b16;">Instagram :</strong> <?php echo $instagram;?></span><br>
										<?php
										 }
										?>
									</p> 
													
								</div>

							<?php } ?>

						</div>

					    <?php wp_reset_postdata(); ?>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
