<?php

# Social Share URLs v1.0.2 (Forked)
# -------------------------------------------------

class SocialMedia {

	public function get_links( $args ) {
		$url      = array_key_exists( 'url', $args ) ? $args['url'] : null;
		$title    = array_key_exists( 'title', $args ) ? $args['title'] : null;
		$desc     = array_key_exists( 'desc', $args ) ? $args['desc'] : null;
		$via      = array_key_exists( 'via', $args ) ? $args['via'] : null;
		$hashtags = array_key_exists( 'hashtags', $args ) ? $args['hashtags'] : null;
		$phone    = array_key_exists( 'phonenumber', $args ) ? $args['phonenumber'] : null;

		$text = $desc ? "$title : $desc" : $title;

		return [
			'facebook'  => 'https://www.facebook.com/sharer.php?' . self::build_social_query(
				array(
					'u' => $url,
				)
			),
			'linkedin'  => 'https://www.linkedin.com/shareArticle?' . self::build_social_query(
				array(
					'mini'    => 'true',
					'url'     => $url,
					'title'   => $title,
					'summary' => $text,
				)
			),
			'pinterest' => 'http://pinterest.com/pin/create/link/?' . self::build_social_query(
				array(
					'url' => $url,
				)
			),
			'telegram'  => 'https://t.me/share/url?' . self::build_social_query(
				array(
					'url'  => $url,
					'text' => $text,
					'to'   => $phone,
				)
			),
			'twitter'   => 'https://twitter.com/intent/tweet?' . self::build_social_query(
				array(
					'url'      => $url,
					'text'     => $text,
					'via'      => $via,
					'hashtags' => $hashtags,
				)
			),
			'whatsapp'  => 'https://wa.me/?' . self::build_social_query(
				array(
					'text' => "$text $url",
				)
			),
		];
	}

	private function build_social_query( $query ) {
		return http_build_query( $query, null, '&', PHP_QUERY_RFC3986 );
	}
}
