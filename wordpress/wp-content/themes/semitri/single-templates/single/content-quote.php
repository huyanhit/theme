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
    <div class="zo-blog-image zo-blog-quote">
        <?php echo zo_archive_quote(); ?>
    </div>
    <div class="zo-blog-detail">
        <h2 class="zo-blog-title"><?php the_title(); ?></h2>
        <div class="zo-blog-meta"><?php zo_archive_detail(); ?></div>
        <div class="zo-blog-content">
            <?php
            if(zo_archive_quote()){
                echo apply_filters('the_content', preg_replace('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));
            } else {
                the_content();
            }
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
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 social-share">
                <?php esc_html_e('Share: ', 'semitri');zo_social_share() ?>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 zo-blog-category">
                <?php the_terms( get_the_ID(), 'category', '', ' , ' ); ?>
            </div>
        </div>
    </div>
</article>