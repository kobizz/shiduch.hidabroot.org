<?

abstract class Matchrepo{

	const REGISTER_URL = '';

	static function multiCardsHeader(){
		wp_register_style('multi-cards', get_stylesheet_directory_uri() . '/css/multi-cards.css');
		wp_enqueue_style('multi-cards');
	}

	static function multiCardsNavigation(){

		global $wp_query;

		$big = 9999999;

		if(!$paged = get_query_var('paged'))
			$paged = 1;

		$args = array(
			'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => $paged,
			'total' => $wp_query->max_num_pages,
			'prev_text' => '<',
			'next_text' => '>',
		);

		echo '<div id="page-navigation">' . paginate_links($args) . '</div>';
	}

	/**
	 * @return void
	 */

	static function redirect_not_logged(){
		if(! is_user_logged_in()){
			wp_redirect(self::get_register_url());
			exit;
		}
	}

	/**
	 * @return string
	 */

	static function get_register_url(){
		return get_permalink(get_page_by_title('הרשמה'));
	}
} 