<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Catch Themes
 * @subpackage Catch Box
 * @since Catch Box 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'catch-box' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h3 class="entry-format"><?php _e( 'Image', 'catch-box' ); ?></h3>
			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( "Reply", 'catch-box' ) . '</span>', _x( '1', 'comments number', 'catch-box' ), _x( '%', 'comments number', 'catch-box' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'catch-box' ) ); ?>
			<?php wp_link_pages( array( 
                'before'		=> '<div class="page-link"><span class="pages">' . __( 'Pages:', 'catch-box' ) . '</span>',
                'after'			=> '</div>',
                'link_before' 	=> '<span>',
                'link_after'   	=> '</span>',
            ) ); 
            ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<div class="entry-meta">
				<?php
					printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s" rel="author">%6$s</a></span></span>', 'catch-box' ),
						esc_url( get_permalink() ),
						get_the_date( 'c' ),
						get_the_date(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'catch-box' ), get_the_author() ) ),
						esc_html( get_the_author() )
					);
				?>
			</div><!-- .entry-meta -->
			<div class="entry-meta">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'catch-box' ) );
					if ( $categories_list ):
				?>
				<span class="cat-links">
					<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'catch-box' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'catch-box' ) );
					if ( $tags_list ): ?>
				<span class="tag-links">
					<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'catch-box' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>

				<?php if ( comments_open() ) : ?>
				<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'catch-box' ) . '</span>', __( '<b>1</b> Reply', 'catch-box' ), __( '<b>%</b> Replies', 'catch-box' ) ); ?></span>
				<?php endif; // End if comments_open() ?>
			</div><!-- .entry-meta -->

			<?php edit_post_link( __( 'Edit', 'catch-box' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->