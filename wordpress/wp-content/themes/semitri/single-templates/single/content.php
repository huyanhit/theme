<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <?php if(has_post_thumbnail()) : ?>
    <div class="zo-blog-image">
        <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( 'full' ); ?></a>
		<?php 
			if(!empty(get_the_terms( get_the_ID(), 'category' ))){?>
			<div class="category">
				<?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?>
			</div>
        <?php }?>
    </div>
	 <?php endif ?>

    <div class="zo-blog-detail">
        <h4 class="zo-blog-title"><?php the_title(); ?></h4>
        <div class="zo-blog-meta">
				<div class="zo-blog-meta">
					<ul>
						<li class="zo-blog-date">
							<i class="fa fa-calendar"></i>
							<?php echo get_the_date("d F, Y"); ?>
						</li>
						<li class="zo-blog-like">
							<?php echo post_favorite( 'return','',true) ?>
						</li>
						<li class="zo-blog-comment">
							<a href="<?php the_permalink(); ?>"><i class="fa fa-comment-o"></i><?php _e(' Comments', 'semitri'); ?> <?php echo comments_number('0','1','%'); ?></a>
						</li>
						<li class="social-share">
							<span> <i class="fa fa-share-alt" aria-hidden="true"></i> <?php esc_html_e('Share: ', 'semitri'); ?></span>
							<?php zo_social_share() ?>
						</li>
					</ul>
				</div>
            </ul>
		</div>
        <div class="zo-blog-content">
            <?php the_content();
			wp_link_pages( array(
				'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'semitri' ) . '</span>',
				'after'       => '</p>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'semitri' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
        </div>
		<div class="zo-blog-link row">
            
        </div>
    </div>
</article>