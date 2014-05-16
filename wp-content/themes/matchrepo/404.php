<?
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Matchrepo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><? _e( 'Oops! That page can&rsquo;t be found.', 'Matchrepo' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><? _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'Matchrepo' ); ?></p>

					<? get_search_form(); ?>

					<? the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<? if ( Matchrepo_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widgettitle"><? _e( 'Most Used Categories', 'Matchrepo' ); ?></h2>
						<ul>
						<?
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<? endif; ?>

					<?
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'Matchrepo' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<? the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<? get_footer(); ?>