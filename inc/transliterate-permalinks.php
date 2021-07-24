<?php

/**
 * Replace all cyrillic characters in post permalink with latin characters
 */
function crb_cyrllic_alphabets_to_latin_in_post_permalink( $data ) {
	// If the post is not published do not change the permalink
	if ( $data['post_status'] !== 'publish' ) {
		return $data;
	}

	// If the post title is empty do not change the permalink
	if ( empty( $data['post_title'] ) ) {
		return $data;
	}

	$post_title = $data['post_title'];

	$post_id = get_the_ID();
	$post_type = get_post_type();

	// Replace all the cyrllic characters with latin ones
	$post_name_latin = crb_transliterate_cyrlic_to_latin( $post_title );

	// Replace space characters with '-'
	$post_name_latin = sanitize_title( $post_name_latin );

	// Add unique suffix at the end of post_name if there is post with the same name
	$post_name_latin = wp_unique_post_slug( $post_name_latin , $post_id, 'publish', $post_type, 0 );

	$data['post_name'] = $post_name_latin;

	return $data;
}
add_action( 'wp_insert_post_data', 'crb_cyrllic_alphabets_to_latin_in_post_permalink', 20, 3 );

/**
 * Replace all the cyrllic characters with latin ones
 */
function crb_transliterate_cyrlic_to_latin( $cyrilic_text ) {
	$translations_of_alphabets = array(
		"а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", 
		"е"=>"e", "ж"=>"zh", "з"=>"z", "и"=>"i", "й"=>"y", 
		"к"=>"k", "л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", 
		"п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", 
		"ф"=>"f", "х"=>"h", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", 
		"щ"=>"sht", "ъ"=>"a", "ь"=>"y", "ю"=>"yu", "я"=>"ya",
		"А"=>"a", "Б"=>"b", "В"=>"v", "Г"=>"g", "Д"=>"d",
		"Е"=>"e", "Ж"=>"zh", "З"=>"z", "И"=>"i", "Й"=>"y",
		"К"=>"k", "Л"=>"l", "М"=>"m", "Н"=>"n", "О"=>"o",
		"П"=>"p", "Р"=>"r", "С"=>"s", "Т"=>"t", "У"=>"u",
		"Ф"=>"f", "Х"=>"h", "Ц"=>"ts", "Ч"=>"ch", "Ш"=>"sh", 
		"Щ"=>"sht", "Ъ"=>"a", "Ь"=>"y", "Ю"=>"yu", "Я"=>"ya"
	);

	$latin_text = strtr( $cyrilic_text, $translations_of_alphabets );

	return $latin_text;
}
