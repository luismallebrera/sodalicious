<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

/**
* Theme path image
*/
$theme_path_images = SODALICIOUS_THEME_DIRECTORY . 'assets/img/';

/**
 * Wrapper for Kirki
 */
if ( ! class_exists( 'VLT_Options' ) ) {
	class VLT_Options {

		private static $default_options = array();

		public static function add_config( $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_config( 'sodalicious_customize', $args );
			}
		}

		public static function add_panel( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_panel( $name, $args );
			}
		}

		public static function add_section( $name, $args ) {
			if ( class_exists( 'Kirki' ) && isset( $args ) && is_array( $args ) ) {
				Kirki::add_section( $name, $args );
			}
		}

		public static function add_field( $args ) {
			if ( isset( $args ) && is_array( $args ) ) {
				if ( class_exists( 'Kirki' ) ) {
					Kirki::add_field( 'sodalicious_customize', $args );
				}
				if ( isset( $args['settings'] ) && isset( $args['default'] ) ) {
					self::$default_options[$args['settings']] = $args['default'];
				}
			}
		}

		public static function get_option( $name, $default = null ) {
			$value = get_theme_mod( $name, null );

			if ( $value === null ) {
				$value = isset( self::$default_options[$name] ) ? self::$default_options[$name] : null;
			}

			if ( $value === null ) {
				$value = $default;
			}

			return $value;
		}

	}
}

/**
 * Custom get_theme_mod
 */
if ( ! function_exists( 'sodalicious_get_theme_mod' ) ) {
	function sodalicious_get_theme_mod( $name = null, $use_acf = null, $postID = null, $acf_name = null ) {

		$value = null;

		if ( $name == null ) {
			return $value;
		}

		// try get value from meta box
		if ( $use_acf ) {
			$value = sodalicious_get_field( $acf_name ? $acf_name : $name, $postID );
		}

		// get value from options
		if ( $value == null ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		if ( is_archive() || is_search() || is_404() ) {
			if ( class_exists( 'VLT_Options' ) ) {
				$value = VLT_Options::get_option( $name );
			}
		}

		$value = apply_filters( 'sodalicious/get_theme_mod', $value, $name );

		return $value;

	}
}

/**
 * Fix post ID preview
 * https://support.advancedcustomfields.com/forums/topic/preview-solution/page/3/
 */
if ( ! function_exists( 'sodalicious_fix_post_id_on_preview' ) ) {
	function sodalicious_fix_post_id_on_preview( $null, $postID ) {
		if ( is_preview() ) {
			return get_the_ID();
		}
		else {
			$acfPostID = isset( $postID->ID ) ? $postID->ID : $postID;

			if ( ! empty( $acfPostID ) ) {
				return $acfPostID;
			}
			else {
				return $null;
			}
		}
	}
}
add_filter( 'acf/pre_load_post_id', 'sodalicious_fix_post_id_on_preview', 10, 2 );

/**
 * Get value from acf field
 */
if ( ! function_exists( 'sodalicious_get_field' ) ) {
	function sodalicious_get_field( $name = null, $postID = null ) {

		$value = null;

		// try get value from meta box
		if ( function_exists( 'get_field' ) ) {
			if ( $postID == null ) {
				$postID = get_the_ID();
			}
			$value = get_field( $name, $postID );
		}

		return $value;

	}
}

/**
 * Get social icons
 */
if ( ! function_exists( 'sodalicious_get_social_icons' ) ) {
	function sodalicious_get_social_icons() {
		$social_icons = array(
			'socicon-internet' => esc_html__( 'Internet', 'sodalicious' ),
			'socicon-moddb' => esc_html__( 'Moddb', 'sodalicious' ),
			'socicon-indiedb' => esc_html__( 'Indiedb', 'sodalicious' ),
			'socicon-traxsource' => esc_html__( 'Traxsource', 'sodalicious' ),
			'socicon-gamefor' => esc_html__( 'Gamefor', 'sodalicious' ),
			'socicon-pixiv' => esc_html__( 'Pixiv', 'sodalicious' ),
			'socicon-myanimelist' => esc_html__( 'Myanimelist', 'sodalicious' ),
			'socicon-blackberry' => esc_html__( 'Blackberry', 'sodalicious' ),
			'socicon-wickr' => esc_html__( 'Wickr', 'sodalicious' ),
			'socicon-spip' => esc_html__( 'Spip', 'sodalicious' ),
			'socicon-napster' => esc_html__( 'Napster', 'sodalicious' ),
			'socicon-beatport' => esc_html__( 'Beatport', 'sodalicious' ),
			'socicon-hackerone' => esc_html__( 'Hackerone', 'sodalicious' ),
			'socicon-hackernews' => esc_html__( 'Hackernews', 'sodalicious' ),
			'socicon-smashwords' => esc_html__( 'Smashwords', 'sodalicious' ),
			'socicon-kobo' => esc_html__( 'Kobo', 'sodalicious' ),
			'socicon-bookbub' => esc_html__( 'Bookbub', 'sodalicious' ),
			'socicon-mailru' => esc_html__( 'Mailru', 'sodalicious' ),
			'socicon-gitlab' => esc_html__( 'Gitlab', 'sodalicious' ),
			'socicon-instructables' => esc_html__( 'Instructables', 'sodalicious' ),
			'socicon-portfolio' => esc_html__( 'Portfolio', 'sodalicious' ),
			'socicon-codered' => esc_html__( 'Codered', 'sodalicious' ),
			'socicon-origin' => esc_html__( 'Origin', 'sodalicious' ),
			'socicon-nextdoor' => esc_html__( 'Nextdoor', 'sodalicious' ),
			'socicon-udemy' => esc_html__( 'Udemy', 'sodalicious' ),
			'socicon-livemaster' => esc_html__( 'Livemaster', 'sodalicious' ),
			'socicon-crunchbase' => esc_html__( 'Crunchbase', 'sodalicious' ),
			'socicon-homefy' => esc_html__( 'Homefy', 'sodalicious' ),
			'socicon-calendly' => esc_html__( 'Calendly', 'sodalicious' ),
			'socicon-realtor' => esc_html__( 'Realtor', 'sodalicious' ),
			'socicon-tidal' => esc_html__( 'Tidal', 'sodalicious' ),
			'socicon-qobuz' => esc_html__( 'Qobuz', 'sodalicious' ),
			'socicon-natgeo' => esc_html__( 'Natgeo', 'sodalicious' ),
			'socicon-mastodon' => esc_html__( 'Mastodon', 'sodalicious' ),
			'socicon-unsplash' => esc_html__( 'Unsplash', 'sodalicious' ),
			'socicon-homeadvisor' => esc_html__( 'Homeadvisor', 'sodalicious' ),
			'socicon-angieslist' => esc_html__( 'Angieslist', 'sodalicious' ),
			'socicon-codepen' => esc_html__( 'Codepen', 'sodalicious' ),
			'socicon-slack' => esc_html__( 'Slack', 'sodalicious' ),
			'socicon-openaigym' => esc_html__( 'Openaigym', 'sodalicious' ),
			'socicon-logmein' => esc_html__( 'Logmein', 'sodalicious' ),
			'socicon-fiverr' => esc_html__( 'Fiverr', 'sodalicious' ),
			'socicon-gotomeeting' => esc_html__( 'Gotomeeting', 'sodalicious' ),
			'socicon-aliexpress' => esc_html__( 'Aliexpress', 'sodalicious' ),
			'socicon-guru' => esc_html__( 'Guru', 'sodalicious' ),
			'socicon-appstore' => esc_html__( 'Appstore', 'sodalicious' ),
			'socicon-homes' => esc_html__( 'Homes', 'sodalicious' ),
			'socicon-zoom' => esc_html__( 'Zoom', 'sodalicious' ),
			'socicon-alibaba' => esc_html__( 'Alibaba', 'sodalicious' ),
			'socicon-craigslist' => esc_html__( 'Craigslist', 'sodalicious' ),
			'socicon-wix' => esc_html__( 'Wix', 'sodalicious' ),
			'socicon-redfin' => esc_html__( 'Redfin', 'sodalicious' ),
			'socicon-googlecalendar' => esc_html__( 'Googlecalendar', 'sodalicious' ),
			'socicon-shopify' => esc_html__( 'Shopify', 'sodalicious' ),
			'socicon-freelancer' => esc_html__( 'Freelancer', 'sodalicious' ),
			'socicon-seedrs' => esc_html__( 'Seedrs', 'sodalicious' ),
			'socicon-bing' => esc_html__( 'Bing', 'sodalicious' ),
			'socicon-doodle' => esc_html__( 'Doodle', 'sodalicious' ),
			'socicon-bonanza' => esc_html__( 'Bonanza', 'sodalicious' ),
			'socicon-squarespace' => esc_html__( 'Squarespace', 'sodalicious' ),
			'socicon-toptal' => esc_html__( 'Toptal', 'sodalicious' ),
			'socicon-gust' => esc_html__( 'Gust', 'sodalicious' ),
			'socicon-ask' => esc_html__( 'Ask', 'sodalicious' ),
			'socicon-trulia' => esc_html__( 'Trulia', 'sodalicious' ),
			'socicon-loomly' => esc_html__( 'Loomly', 'sodalicious' ),
			'socicon-ghost' => esc_html__( 'Ghost', 'sodalicious' ),
			'socicon-upwork' => esc_html__( 'Upwork', 'sodalicious' ),
			'socicon-fundable' => esc_html__( 'Fundable', 'sodalicious' ),
			'socicon-booking' => esc_html__( 'Booking', 'sodalicious' ),
			'socicon-googlemaps' => esc_html__( 'Googlemaps', 'sodalicious' ),
			'socicon-zillow' => esc_html__( 'Zillow', 'sodalicious' ),
			'socicon-niconico' => esc_html__( 'Niconico', 'sodalicious' ),
			'socicon-toneden' => esc_html__( 'Toneden', 'sodalicious' ),
			'socicon-augment' => esc_html__( 'Augment', 'sodalicious' ),
			'socicon-bitbucket' => esc_html__( 'Bitbucket', 'sodalicious' ),
			'socicon-fyuse' => esc_html__( 'Fyuse', 'sodalicious' ),
			'socicon-yt-gaming' => esc_html__( 'Yt-gaming', 'sodalicious' ),
			'socicon-sketchfab' => esc_html__( 'Sketchfab', 'sodalicious' ),
			'socicon-mobcrush' => esc_html__( 'Mobcrush', 'sodalicious' ),
			'socicon-microsoft' => esc_html__( 'Microsoft', 'sodalicious' ),
			'socicon-pandora' => esc_html__( 'Pandora', 'sodalicious' ),
			'socicon-messenger' => esc_html__( 'Messenger', 'sodalicious' ),
			'socicon-gamewisp' => esc_html__( 'Gamewisp', 'sodalicious' ),
			'socicon-bloglovin' => esc_html__( 'Bloglovin', 'sodalicious' ),
			'socicon-tunein' => esc_html__( 'Tunein', 'sodalicious' ),
			'socicon-gamejolt' => esc_html__( 'Gamejolt', 'sodalicious' ),
			'socicon-trello' => esc_html__( 'Trello', 'sodalicious' ),
			'socicon-spreadshirt' => esc_html__( 'Spreadshirt', 'sodalicious' ),
			'socicon-500px' => esc_html__( '500px', 'sodalicious' ),
			'socicon-8tracks' => esc_html__( '8tracks', 'sodalicious' ),
			'socicon-airbnb' => esc_html__( 'Airbnb', 'sodalicious' ),
			'socicon-alliance' => esc_html__( 'Alliance', 'sodalicious' ),
			'socicon-amazon' => esc_html__( 'Amazon', 'sodalicious' ),
			'socicon-amplement' => esc_html__( 'Amplement', 'sodalicious' ),
			'socicon-android' => esc_html__( 'Android', 'sodalicious' ),
			'socicon-angellist' => esc_html__( 'Angellist', 'sodalicious' ),
			'socicon-apple' => esc_html__( 'Apple', 'sodalicious' ),
			'socicon-appnet' => esc_html__( 'Appnet', 'sodalicious' ),
			'socicon-baidu' => esc_html__( 'Baidu', 'sodalicious' ),
			'socicon-bandcamp' => esc_html__( 'Bandcamp', 'sodalicious' ),
			'socicon-battlenet' => esc_html__( 'Battlenet', 'sodalicious' ),
			'socicon-mixer' => esc_html__( 'Mixer', 'sodalicious' ),
			'socicon-bebee' => esc_html__( 'Bebee', 'sodalicious' ),
			'socicon-bebo' => esc_html__( 'Bebo', 'sodalicious' ),
			'socicon-behance' => esc_html__( 'Bēhance', 'sodalicious' ),
			'socicon-blizzard' => esc_html__( 'Blizzard', 'sodalicious' ),
			'socicon-blogger' => esc_html__( 'Blogger', 'sodalicious' ),
			'socicon-buffer' => esc_html__( 'Buffer', 'sodalicious' ),
			'socicon-chrome' => esc_html__( 'Chrome', 'sodalicious' ),
			'socicon-coderwall' => esc_html__( 'Coderwall', 'sodalicious' ),
			'socicon-curse' => esc_html__( 'Curse', 'sodalicious' ),
			'socicon-dailymotion' => esc_html__( 'Dailymotion', 'sodalicious' ),
			'socicon-deezer' => esc_html__( 'Deezer', 'sodalicious' ),
			'socicon-delicious' => esc_html__( 'Delicious', 'sodalicious' ),
			'socicon-deviantart' => esc_html__( 'Deviantart', 'sodalicious' ),
			'socicon-diablo' => esc_html__( 'Diablo', 'sodalicious' ),
			'socicon-digg' => esc_html__( 'Digg', 'sodalicious' ),
			'socicon-discord' => esc_html__( 'Discord', 'sodalicious' ),
			'socicon-disqus' => esc_html__( 'Disqus', 'sodalicious' ),
			'socicon-douban' => esc_html__( 'Douban', 'sodalicious' ),
			'socicon-draugiem' => esc_html__( 'Draugiem', 'sodalicious' ),
			'socicon-dribbble' => esc_html__( 'Dribbble', 'sodalicious' ),
			'socicon-drupal' => esc_html__( 'Drupal', 'sodalicious' ),
			'socicon-ebay' => esc_html__( 'Ebay', 'sodalicious' ),
			'socicon-ello' => esc_html__( 'Ello', 'sodalicious' ),
			'socicon-endomodo' => esc_html__( 'Endomodo', 'sodalicious' ),
			'socicon-envato' => esc_html__( 'Envato', 'sodalicious' ),
			'socicon-etsy' => esc_html__( 'Etsy', 'sodalicious' ),
			'socicon-facebook' => esc_html__( 'Facebook', 'sodalicious' ),
			'socicon-feedburner' => esc_html__( 'Feedburner', 'sodalicious' ),
			'socicon-filmweb' => esc_html__( 'Filmweb', 'sodalicious' ),
			'socicon-firefox' => esc_html__( 'Firefox', 'sodalicious' ),
			'socicon-flattr' => esc_html__( 'Flattr', 'sodalicious' ),
			'socicon-flickr' => esc_html__( 'Flickr', 'sodalicious' ),
			'socicon-formulr' => esc_html__( 'Formulr', 'sodalicious' ),
			'socicon-forrst' => esc_html__( 'Forrst', 'sodalicious' ),
			'socicon-foursquare' => esc_html__( 'Foursquare', 'sodalicious' ),
			'socicon-friendfeed' => esc_html__( 'Friendfeed', 'sodalicious' ),
			'socicon-github' => esc_html__( 'Github', 'sodalicious' ),
			'socicon-goodreads' => esc_html__( 'Goodreads', 'sodalicious' ),
			'socicon-google' => esc_html__( 'Google', 'sodalicious' ),
			'socicon-googlescholar' => esc_html__( 'Googlescholar', 'sodalicious' ),
			'socicon-googlegroups' => esc_html__( 'Googlegroups', 'sodalicious' ),
			'socicon-googlephotos' => esc_html__( 'Googlephotos', 'sodalicious' ),
			'socicon-googleplus' => esc_html__( 'Googleplus', 'sodalicious' ),
			'socicon-grooveshark' => esc_html__( 'Grooveshark', 'sodalicious' ),
			'socicon-hackerrank' => esc_html__( 'Hackerrank', 'sodalicious' ),
			'socicon-hearthstone' => esc_html__( 'Hearthstone', 'sodalicious' ),
			'socicon-hellocoton' => esc_html__( 'Hellocoton', 'sodalicious' ),
			'socicon-heroes' => esc_html__( 'Heroes', 'sodalicious' ),
			'socicon-smashcast' => esc_html__( 'Smashcast', 'sodalicious' ),
			'socicon-horde' => esc_html__( 'Horde', 'sodalicious' ),
			'socicon-houzz' => esc_html__( 'Houzz', 'sodalicious' ),
			'socicon-icq' => esc_html__( 'Icq', 'sodalicious' ),
			'socicon-identica' => esc_html__( 'Identica', 'sodalicious' ),
			'socicon-imdb' => esc_html__( 'Imdb', 'sodalicious' ),
			'socicon-instagram' => esc_html__( 'Instagram', 'sodalicious' ),
			'socicon-issuu' => esc_html__( 'Issuu', 'sodalicious' ),
			'socicon-istock' => esc_html__( 'Istock', 'sodalicious' ),
			'socicon-itunes' => esc_html__( 'Itunes', 'sodalicious' ),
			'socicon-keybase' => esc_html__( 'Keybase', 'sodalicious' ),
			'socicon-lanyrd' => esc_html__( 'Lanyrd', 'sodalicious' ),
			'socicon-lastfm' => esc_html__( 'Lastfm', 'sodalicious' ),
			'socicon-line' => esc_html__( 'Line', 'sodalicious' ),
			'socicon-linkedin' => esc_html__( 'Linkedin', 'sodalicious' ),
			'socicon-livejournal' => esc_html__( 'Livejournal', 'sodalicious' ),
			'socicon-lyft' => esc_html__( 'Lyft', 'sodalicious' ),
			'socicon-macos' => esc_html__( 'Macos', 'sodalicious' ),
			'socicon-mail' => esc_html__( 'Mail', 'sodalicious' ),
			'socicon-medium' => esc_html__( 'Medium', 'sodalicious' ),
			'socicon-meetup' => esc_html__( 'Meetup', 'sodalicious' ),
			'socicon-mixcloud' => esc_html__( 'Mixcloud', 'sodalicious' ),
			'socicon-modelmayhem' => esc_html__( 'Modelmayhem', 'sodalicious' ),
			'socicon-mumble' => esc_html__( 'Mumble', 'sodalicious' ),
			'socicon-myspace' => esc_html__( 'Myspace', 'sodalicious' ),
			'socicon-newsvine' => esc_html__( 'Newsvine', 'sodalicious' ),
			'socicon-nintendo' => esc_html__( 'Nintendo', 'sodalicious' ),
			'socicon-npm' => esc_html__( 'Npm', 'sodalicious' ),
			'socicon-odnoklassniki' => esc_html__( 'Odnoklassniki', 'sodalicious' ),
			'socicon-openid' => esc_html__( 'Openid', 'sodalicious' ),
			'socicon-opera' => esc_html__( 'Opera', 'sodalicious' ),
			'socicon-outlook' => esc_html__( 'Outlook', 'sodalicious' ),
			'socicon-overwatch' => esc_html__( 'Overwatch', 'sodalicious' ),
			'socicon-patreon' => esc_html__( 'Patreon', 'sodalicious' ),
			'socicon-paypal' => esc_html__( 'Paypal', 'sodalicious' ),
			'socicon-periscope' => esc_html__( 'Periscope', 'sodalicious' ),
			'socicon-persona' => esc_html__( 'Persona', 'sodalicious' ),
			'socicon-pinterest' => esc_html__( 'Pinterest', 'sodalicious' ),
			'socicon-play' => esc_html__( 'Play', 'sodalicious' ),
			'socicon-player' => esc_html__( 'Player', 'sodalicious' ),
			'socicon-playstation' => esc_html__( 'Playstation', 'sodalicious' ),
			'socicon-pocket' => esc_html__( 'Pocket', 'sodalicious' ),
			'socicon-qq' => esc_html__( 'Qq', 'sodalicious' ),
			'socicon-quora' => esc_html__( 'Quora', 'sodalicious' ),
			'socicon-raidcall' => esc_html__( 'Raidcall', 'sodalicious' ),
			'socicon-ravelry' => esc_html__( 'Ravelry', 'sodalicious' ),
			'socicon-reddit' => esc_html__( 'Reddit', 'sodalicious' ),
			'socicon-renren' => esc_html__( 'Renren', 'sodalicious' ),
			'socicon-researchgate' => esc_html__( 'Researchgate', 'sodalicious' ),
			'socicon-residentadvisor' => esc_html__( 'Residentadvisor', 'sodalicious' ),
			'socicon-reverbnation' => esc_html__( 'Reverbnation', 'sodalicious' ),
			'socicon-rss' => esc_html__( 'Rss', 'sodalicious' ),
			'socicon-sharethis' => esc_html__( 'Sharethis', 'sodalicious' ),
			'socicon-skype' => esc_html__( 'Skype', 'sodalicious' ),
			'socicon-slideshare' => esc_html__( 'Slideshare', 'sodalicious' ),
			'socicon-smugmug' => esc_html__( 'Smugmug', 'sodalicious' ),
			'socicon-snapchat' => esc_html__( 'Snapchat', 'sodalicious' ),
			'socicon-songkick' => esc_html__( 'Songkick', 'sodalicious' ),
			'socicon-soundcloud' => esc_html__( 'Soundcloud', 'sodalicious' ),
			'socicon-spotify' => esc_html__( 'Spotify', 'sodalicious' ),
			'socicon-stackexchange' => esc_html__( 'Stackexchange', 'sodalicious' ),
			'socicon-stackoverflow' => esc_html__( 'Stackoverflow', 'sodalicious' ),
			'socicon-starcraft' => esc_html__( 'Starcraft', 'sodalicious' ),
			'socicon-stayfriends' => esc_html__( 'Stayfriends', 'sodalicious' ),
			'socicon-steam' => esc_html__( 'Steam', 'sodalicious' ),
			'socicon-storehouse' => esc_html__( 'Storehouse', 'sodalicious' ),
			'socicon-strava' => esc_html__( 'Strava', 'sodalicious' ),
			'socicon-streamjar' => esc_html__( 'Streamjar', 'sodalicious' ),
			'socicon-stumbleupon' => esc_html__( 'Stumbleupon', 'sodalicious' ),
			'socicon-swarm' => esc_html__( 'Swarm', 'sodalicious' ),
			'socicon-teamspeak' => esc_html__( 'Teamspeak', 'sodalicious' ),
			'socicon-teamviewer' => esc_html__( 'Teamviewer', 'sodalicious' ),
			'socicon-technorati' => esc_html__( 'Technorati', 'sodalicious' ),
			'socicon-telegram' => esc_html__( 'Telegram', 'sodalicious' ),
			'socicon-tripadvisor' => esc_html__( 'Tripadvisor', 'sodalicious' ),
			'socicon-tripit' => esc_html__( 'Tripit', 'sodalicious' ),
			'socicon-triplej' => esc_html__( 'Triplej', 'sodalicious' ),
			'socicon-tumblr' => esc_html__( 'Tumblr', 'sodalicious' ),
			'socicon-twitch' => esc_html__( 'Twitch', 'sodalicious' ),
			'socicon-twitter' => esc_html__( 'Twitter', 'sodalicious' ),
			'socicon-uber' => esc_html__( 'Uber', 'sodalicious' ),
			'socicon-ventrilo' => esc_html__( 'Ventrilo', 'sodalicious' ),
			'socicon-viadeo' => esc_html__( 'Viadeo', 'sodalicious' ),
			'socicon-viber' => esc_html__( 'Viber', 'sodalicious' ),
			'socicon-viewbug' => esc_html__( 'Viewbug', 'sodalicious' ),
			'socicon-vimeo' => esc_html__( 'Vimeo', 'sodalicious' ),
			'socicon-vine' => esc_html__( 'Vine', 'sodalicious' ),
			'socicon-vkontakte' => esc_html__( 'Vkontakte', 'sodalicious' ),
			'socicon-warcraft' => esc_html__( 'Warcraft', 'sodalicious' ),
			'socicon-wechat' => esc_html__( 'Wechat', 'sodalicious' ),
			'socicon-weibo' => esc_html__( 'Weibo', 'sodalicious' ),
			'socicon-whatsapp' => esc_html__( 'Whatsapp', 'sodalicious' ),
			'socicon-wikipedia' => esc_html__( 'Wikipedia', 'sodalicious' ),
			'socicon-windows' => esc_html__( 'Windows', 'sodalicious' ),
			'socicon-wordpress' => esc_html__( 'Wordpress', 'sodalicious' ),
			'socicon-wykop' => esc_html__( 'Wykop', 'sodalicious' ),
			'socicon-xbox' => esc_html__( 'Xbox', 'sodalicious' ),
			'socicon-xing' => esc_html__( 'Xing', 'sodalicious' ),
			'socicon-yahoo' => esc_html__( 'Yahoo', 'sodalicious' ),
			'socicon-yammer' => esc_html__( 'Yammer', 'sodalicious' ),
			'socicon-yandex' => esc_html__( 'Yandex', 'sodalicious' ),
			'socicon-yelp' => esc_html__( 'Yelp', 'sodalicious' ),
			'socicon-younow' => esc_html__( 'Younow', 'sodalicious' ),
			'socicon-youtube' => esc_html__( 'Youtube', 'sodalicious' ),
			'socicon-zapier' => esc_html__( 'Zapier', 'sodalicious' ),
			'socicon-zerply' => esc_html__( 'Zerply', 'sodalicious' ),
			'socicon-zomato' => esc_html__( 'Zomato', 'sodalicious' ),
			'socicon-zynga' => esc_html__( 'Zynga', 'sodalicious' )
		);
		return apply_filters( 'sodalicious/get_social_icons', $social_icons );
	}
}

/**
 * Get Elementor templates
 */
if ( ! function_exists( 'sodalicious_get_elementor_templates' ) ) {
	function sodalicious_get_elementor_templates( $type = null ) {

		$args = [
			'post_type' => 'elementor_library',
			'posts_per_page' => -1,
		];

		if ( $type ) {

			$args[ 'tax_query' ] = [
				[
					'taxonomy' => 'elementor_library_type',
					'field' => 'slug',
					'terms' => $type,
				],
			];

		}

		$page_templates = get_posts( $args );

		$options[0] = esc_html__( 'Select a Template', 'sodalicious' );

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		} else {

			$options[0] = esc_html__( 'Create a Template First', 'sodalicious' );

		}

		return $options;

	}
}