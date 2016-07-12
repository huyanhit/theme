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
<?php
global $template;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    
	<?php if(has_post_thumbnail()) { ?>
	<div class="zo-blog-image">
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail(  'full' ); ?></a>
	</div>
	<div class="zo-blog-detail">
	<?php }else{?>
		<div class="zo-blog-detail no-image">
	<?php }?>
		<?php 
		if(!empty(get_the_terms( get_the_ID(), 'category' ))){?>
			<div class="zo-blog-category">
				<?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?>
			</div>
        <?php }?>
		
		<h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
       
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
            </ul>
        </div>
        
		<div class="zo-blog-content">
            <?php
            if(get_post_type( get_the_ID() ) != 'page'):
				echo wp_trim_words ( get_the_excerpt(), 20 , '...');
            endif;
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
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 zo-blog-readmore">
                <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php _e('Read More ', 'semitri') ?></a>
            </div>
        </div>
    </div>
</article>
