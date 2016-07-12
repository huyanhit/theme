<?php
/**
 * The Template for displaying all single posts
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */

get_header(); ?>
<div class="<?php zo_main_class(); ?>">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>
					
                <?php endwhile; // end of the loop. ?>
                
				<?php get_template_part( 'author-bio' ); ?>
					
				<?php comments_template( '', true ); ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>