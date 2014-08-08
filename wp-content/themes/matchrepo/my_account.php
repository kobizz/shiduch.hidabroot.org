<?

/*
Template Name: החשבון שלי
*/

Matchrepo::redirect_not_logged();

Matchrepo::multiCardsHeader();

get_header();

$paged = get_query_var('paged', 1);

$user_id = $current_user->ID;

$args = array(
	'author' => $user_id,
	'post_type' => 'card',
	'orderby' => 'post_date',
	'order' => 'DESC',
	'posts_per_page' => 10,
	'paged' => $paged
);

query_posts($args);

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="user-managing">
			<a href="<?= get_permalink(get_page_by_title('הוספת כרטיס')) ?>">
				<button><? _e('Add New Card', THEME_NAME) ?></button>
			</a>
			<a href="<?= get_permalink(get_page_by_title('ניהול חשבון')) ?>">
				<button><? _e('Account Managing', THEME_NAME) ?></button>
			</a>
			<button><? _e('Email Notifications Settings', THEME_NAME) ?></button>
		</div>
		<div id="user-crumbs">
			<?
			printf(__('Hello %s, there are %d cards in your account', THEME_NAME), $current_user -> display_name, $wp_query ->found_posts)
			?>
		</div>
		<div class="background-area">
			<?

			while(have_posts()) : the_post(); ?>

				<? get_template_part('content', 'account'); ?>

			<? endwhile ?>

			<? Matchrepo::multiCardsNavigation() ?>
		</div>
	</main>
	<!-- #main -->
</div><!-- #primary -->

<? get_sidebar() ?>
<? get_footer() ?>
