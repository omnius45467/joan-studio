<?php
/**
 * Category Template Tags and API.
 *
 * @package WordPress
 * @subpackage Template
 */

/**
 * Retrieve category link URL.
 *
 * @since 1.0.0
 * @see get_term_link()
 *
 * @param int|object $category Category ID or object.
 * @return string Link on success, empty string if category does not exist.
 */
function get_category_link( $category ) {
	if ( ! is_object( $category ) )
		$category = (int) $category;

	$category = get_term_link( $category, 'category' );

	if ( is_wp_error( $category ) )
		return '';

	return $category;
}

/**
 * Retrieve category parents with separator.
 *
 * @since 1.2.0
 *
 * @param int $id Category ID.
 * @param bool $link Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool $nicename Optional, default is false. Whether to use nice name for display.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function get_category_parents( $id, $link = false, $separator = '/', $nicename = false, $visited = array() ) {
	$chain = '';
	$parent = get_term( $id, 'category' );
	if ( is_wp_error( $parent ) )
		return $parent;

	if ( $nicename )
		$name = $parent->slug;
	else
		$name = $parent->name;

	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= get_category_parents( $parent->parent, $link, $separator, $nicename, $visited );
	}

	if ( $link )
		$chain .= '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">'.$name.'</a>' . $separator;
	else
		$chain .= $name.$separator;
	return $chain;
}

/**
 * Retrieve post categories.
 *
 * @since 0.71
 *
 * @param int $id Optional, default to current post ID. The post ID.
 * @return array
 */
function get_the_category( $id = false ) {
	$categories = get_the_terms( $id, 'category' );
	if ( ! $categories || is_wp_error( $categories ) )
		$categories = array();

	$categories = array_values( $categories );

	foreach ( array_keys( $categories ) as $key ) {
		_make_cat_compat( $categories[$key] );
	}

	/**
	 * Filter the array of categories to return for a post.
	 *
	 * @since 3.1.0
	 *
	 * @param array $categories An array of categories to return for the post.
	 */
	return apply_filters( 'get_the_categories', $categories );
}

/**
 * Sort categories by name.
 *
 * Used by usort() as a callback, should not be used directly. Can actually be
 * used to sort any term object.
 *
 * @since 2.3.0
 * @access private
 *
 * @param object $a
 * @param object $b
 * @return int
 */
function _usort_terms_by_name( $a, $b ) {
	return strcmp( $a->name, $b->name );
}

/**
 * Sort categories by ID.
 *
 * Used by usort() as a callback, should not be used directly. Can actually be
 * used to sort any term object.
 *
 * @since 2.3.0
 * @access private
 *
 * @param object $a
 * @param object $b
 * @return int
 */
function _usort_terms_by_ID( $a, $b ) {
	if ( $a->term_id > $b->term_id )
		return 1;
	elseif ( $a->term_id < $b->term_id )
		return -1;
	else
		return 0;
}

/**
 * Retrieve category name based on category ID.
 *
 * @since 0.71
 *
 * @param int $cat_ID Category ID.
 * @return string|WP_Error Category name on success, WP_Error on failure.
 */
function get_the_category_by_ID( $cat_ID ) {
	$cat_ID = (int) $cat_ID;
	$category = get_term( $cat_ID, 'category' );

	if ( is_wp_error( $category ) )
		return $category;

	return ( $category ) ? $category->name : '';
}

/**
 * Retrieve category list in either HTML list or custom format.
 *
 * @since 1.5.1
 *
 * @param string $separator Optional, default is empty string. Separator for between the categories.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 * @return string
 */
function get_the_category_list( $separator = '', $parents='', $post_id = false ) {
	global $wp_rewrite;
	if ( ! is_object_in_taxonomy( get_post_type( $post_id ), 'category' ) ) {
		/** This filter is documented in wp-includes/category-template.php */
		return apply_filters( 'the_category', '', $separator, $parents );
	}

	$categories = get_the_category( $post_id );
	if ( empty( $categories ) ) {
		/** This filter is documented in wp-includes/category-template.php */
		return apply_filters( 'the_category', __( 'Uncategorized' ), $separator, $parents );
	}

	$rel = ( is_object( $wp_rewrite ) && $wp_rewrite->using_permalinks() ) ? 'rel="category tag"' : 'rel="category"';

	$thelist = '';
	if ( '' == $separator ) {
		$thelist .= '<ul class="post-categories">';
		foreach ( $categories as $category ) {
			$thelist .= "\n\t<li>";
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '"  ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= $category->name.'</a></li>';
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a></li>';
			}
		}
		$thelist .= '</ul>';
	} else {
		$i = 0;
		foreach ( $categories as $category ) {
			if ( 0 < $i )
				$thelist .= $separator;
			switch ( strtolower( $parents ) ) {
				case 'multiple':
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, true, $separator );
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a>';
					break;
				case 'single':
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>';
					if ( $category->parent )
						$thelist .= get_category_parents( $category->parent, false, $separator );
					$thelist .= "$category->name</a>";
					break;
				case '':
				default:
					$thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" ' . $rel . '>' . $category->name.'</a>';
			}
			++$i;
		}
	}

	/**
	 * Filter the category or list of categories.
	 *
	 * @since 1.2.0
	 *
	 * @param array  $thelist   List of categories for the current post.
	 * @param string $separator Separator used between the categories.
	 * @param string $parents   How to display the category parents. Accepts 'multiple',
	 *                          'single', or empty.
	 */
	return apply_filters( 'the_category', $thelist, $separator, $parents );
}

/**
 * Check if the current post in within any of the given categories.
 *
 * The given categories are checked against the post's categories' term_ids, names and slugs.
 * Categories given as integers will only be checked against the post's categories' term_ids.
 *
 * Prior to v2.5 of WordPress, category names were not supported.
 * Prior to v2.7, category slugs were not supported.
 * Prior to v2.7, only one category could be compared: in_category( $single_category ).
 * Prior to v2.7, this function could only be used in the WordPress Loop.
 * As of 2.7, the function can be used anywhere if it is provided a post ID or post object.
 *
 * @since 1.2.0
 *
 * @param int|string|array $category Category ID, name or slug, or array of said.
 * @param int|object $post Optional. Post to check instead of the current post. (since 2.7.0)
 * @return bool True if the current post is in any of the given categories.
 */
function in_category( $category, $post = null ) {
	if ( empty( $category ) )
		return false;

	return has_category( $category, $post );
}

/**
 * Display the category list for the post.
 *
 * @since 0.71
 *
 * @param string $separator Optional, default is empty string. Separator for between the categories.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 */
function the_category( $separator = '', $parents='', $post_id = false ) {
	echo get_the_category_list( $separator, $parents, $post_id );
}

/**
 * Retrieve category description.
 *
 * @since 1.0.0
 *
 * @param int $category Optional. Category ID. Will use global category ID by default.
 * @return string Category description, available.
 */
function category_description( $category = 0 ) {
	return term_description( $category, 'category' );
}

/**
 * Display or retrieve the HTML dropdown list of categories.
 *
 * The list of arguments is below:
 *     'show_option_all' (string) - Text to display for showing all categories.
 *     'show_option_none' (string) - Text to display for showing no categories.
 *     'option_none_value' (mixed) - Value to use when no category is selected.
 *     'orderby' (string) default is 'ID' - What column to use for ordering the
 * categories.
 *     'order' (string) default is 'ASC' - What direction to order categories.
 *     'show_count' (bool|int) default is 0 - Whether to show how many posts are
 * in the category.
 *     'hide_empty' (bool|int) default is 1 - Whether to hide categories that
 * don't have any posts attached to them.
 *     'child_of' (int) default is 0 - See {@link get_categories()}.
 *     'exclude' (string) - See {@link get_categories()}.
 *     'echo' (bool|int) default is 1 - Whether to display or retrieve content.
 *     'depth' (int) - The max depth.
 *     'tab_index' (int) - Tab index for select element.
 *     'name' (string) - The name attribute value for select element.
 *     'id' (string) - The ID attribute value for select element. Defaults to name if omitted.
 *     'class' (string) - The class attribute value for select element.
 *     'selected' (int) - Which category ID is selected.
 *     'taxonomy' (string) - The name of the taxonomy to retrieve. Defaults to category.
 *
 * The 'hierarchical' argument, which is disabled by default, will override the
 * depth argument, unless it is true. When the argument is false, it will
 * display all of the categories. When it is enabled it will use the value in
 * the 'depth' argument.
 *
 * @since 2.1.0
 *
 * @param string|array $args Optional. Override default arguments.
 * @return string HTML content only if 'echo' argument is 0.
 */
function wp_dropdown_categories( $args = '' ) {
	$defaults = array(
		'show_option_all' => '', 'show_option_none' => '',
		'orderby' => 'id', 'order' => 'ASC',
		'show_count' => 0,
		'hide_empty' => 1, 'child_of' => 0,
		'exclude' => '', 'echo' => 1,
		'selected' => 0, 'hierarchical' => 0,
		'name' => 'cat', 'id' => '',
		'class' => 'postform', 'depth' => 0,
		'tab_index' => 0, 'taxonomy' => 'category',
		'hide_if_empty' => false, 'option_none_value' => -1
	);

	$defaults['selected'] = ( is_category() ) ? get_query_var( 'cat' ) : 0;

	// Back compat.
	if ( isset( $args['type'] ) && 'link' == $args['type'] ) {
		_deprecated_argument( __FUNCTION__, '3.0', '' );
		$args['taxonomy'] = 'link_category';
	}

	$r = wp_parse_args( $args, $defaults );
	$option_none_value = $r['option_none_value'];

	if ( ! isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
		$r['pad_counts'] = true;
	}

	$tab_index = $r['tab_index'];

	$tab_index_attribute = '';
	if ( (int) $tab_index > 0 ) {
		$tab_index_attribute = " tabindex=\"$tab_index\"";
	}
	$categories = get_terms( $r['taxonomy'], $r );
	$name = esc_attr( $r['name'] );
	$class = esc_attr( $r['class'] );
	$id = $r['id'] ? esc_attr( $r['id'] ) : $name;

	if ( ! $r['hide_if_empty'] || ! empty( $categories ) ) {
		$output = "<select name='$name' id='$id' class='$class' $tab_index_attribute>\n";
	} else {
		$output = '';
	}
	if ( empty( $categories ) && ! $r['hide_if_empty'] && ! empty( $r['show_option_none'] ) ) {

		/**
		 * Filter a taxonomy drop-down display element.
		 *
		 * A variety of taxonomy drop-down display elements can be modified
		 * just prior to display via this filter. Filterable arguments include
		 * 'show_option_none', 'show_option_all', and various forms of the
		 * term name.
		 *
		 * @since 1.2.0
		 *
		 * @see wp_dropdown_categories()
		 *
		 * @param string $element Taxonomy element to list.
		 */
		$show_option_none = apply_filters( 'list_cats', $r['show_option_none'] );
		$output .= "\t<option value='" . esc_attr( $option_none_value ) . "' selected='selected'>$show_option_none</option>\n";
	}

	if ( ! empty( $categories ) ) {

		if ( $r['show_option_all'] ) {

			/** This filter is documented in wp-includes/category-template.php */
			$show_option_all = apply_filters( 'list_cats', $r['show_option_all'] );
			$selected = ( '0' === strval($r['selected']) ) ? " selected='selected'" : '';
			$output .= "\t<option value='0'$selected>$show_option_all</option>\n";
		}

		if ( $r['show_option_none'] ) {

			/** This filter is documented in wp-includes/category-template.php */
			$show_option_none = apply_filters( 'list_cats', $r['show_option_none'] );
			$selected = selected( $option_none_value, $r['selected'], false );
			$output .= "\t<option value='" . esc_attr( $option_none_value ) . "'$selected>$show_option_none</option>\n";
		}

		if ( $r['hierarchical'] ) {
			$depth = $r['depth'];  // Walk the full depth.
		} else {
			$depth = -1; // Flat.
		}
		$output .= walk_category_dropdown_tree( $categories, $depth, $r );
	}

	if ( ! $r['hide_if_empty'] || ! empty( $categories ) ) {
		$output .= "</select>\n";
	}
	/**
	 * Filter the taxonomy drop-down output.
	 *
	 * @since 2.1.0
	 *
	 * @param string $output HTML output.
	 * @param array  $r      Arguments used to build the drop-down.
	 */
	$output = apply_filters( 'wp_dropdown_cats', $output, $r );

	if ( $r['echo'] ) {
		echo $output;
	}
	return $output;
}

/**
 * Display or retrieve the HTML list of categories.
 *
 * The list of arguments is below:
 *     'show_option_all' (string) - Text to display for showing all categories.
 *     'orderby' (string) default is 'ID' - What column to use for ordering the
 * categories.
 *     'order' (string) default is 'ASC' - What direction to order categories.
 *     'show_count' (bool|int) default is 0 - Whether to show how many posts are
 * in the category.
 *     'hide_empty' (bool|int) default is 1 - Whether to hide categories that
 * don't have any posts attached to them.
 *     'use_desc_for_title' (bool|int) default is 1 - Whether to use the
 * category description as the title attribute.
 *     'feed' - See {@link get_categories()}.
 *     'feed_type' - See {@link get_categories()}.
 *     'feed_image' - See {@link get_categories()}.
 *     'child_of' (int) default is 0 - See {@link get_categories()}.
 *     'exclude' (string) - See {@link get_categories()}.
 *     'exclude_tree' (string) - See {@link get_categories()}.
 *     'echo' (bool|int) default is 1 - Whether to display or retrieve content.
 *     'current_category' (int) - See {@link get_categories()}.
 *     'hierarchical' (bool) - See {@link get_categories()}.
 *     'title_li' (string) - See {@link get_categories()}.
 *     'depth' (int) - The max depth.
 *
 * @since 2.1.0
 *
 * @param string|array $args Optional. Override default arguments.
 * @return false|null|string HTML content only if 'echo' argument is 0.
 */
function wp_list_categories( $args = '' ) {
	$defaults = array(
		'show_option_all' => '', 'show_option_none' => __('No categories'),
		'orderby' => 'name', 'order' => 'ASC',
		'style' => 'list',
		'show_count' => 0, 'hide_empty' => 1,
		'use_desc_for_title' => 1, 'child_of' => 0,
		'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '',
		'exclude_tree' => '', 'current_category' => 0,
		'hierarchical' => true, 'title_li' => __( 'Categories' ),
		'echo' => 1, 'depth' => 0,
		'taxonomy' => 'category'
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] )
		$r['pad_counts'] = true;

	if ( true == $r['hierarchical'] ) {
		$r['exclude_tree'] = $r['exclude'];
		$r['exclude'] = '';
	}

	if ( ! isset( $r['class'] ) )
		$r['class'] = ( 'category' == $r['taxonomy'] ) ? 'categories' : $r['taxonomy'];

	if ( ! taxonomy_exists( $r['taxonomy'] ) ) {
		return false;
	}

	$show_option_all = $r['show_option_all'];
	$show_option_none = $r['show_option_none'];

	$categories = get_categories( $r );

	$output = '';
	if ( $r['title_li'] && 'list' == $r['style'] ) {
		$output = '<li class="' . esc_attr( $r['class'] ) . '">' . $r['title_li'] . '<ul>';
	}
	if ( empty( $categories ) ) {
		if ( ! empty( $show_option_none ) ) {
			if ( 'list' == $r['style'] ) {
				$output .= '<li class="cat-item-none">' . $show_option_none . '</li>';
			} else {
				$output .= $show_option_none;
			}
		}
	} else {
		if ( ! empty( $show_option_all ) ) {
			$posts_page = ( 'page' == get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/' );
			$posts_page = esc_url( $posts_page );
			if ( 'list' == $r['style'] ) {
				$output .= "<a class='cat-item-all' href='$posts_page'>$show_option_all</a>";
			} else {
				$output .= "<a href='$posts_page'>$show_option_all</a>";
			}
		}

		if ( empty( $r['current_category'] ) && ( is_category() || is_tax() || is_tag() ) ) {
			$current_term_object = get_queried_object();
			if ( $current_term_object && $r['taxonomy'] === $current_term_object->taxonomy ) {
				$r['current_category'] = get_queried_object_id();
			}
		}

		if ( $r['hierarchical'] ) {
			$depth = $r['depth'];
		} else {
			$depth = -1; // Flat.
		}
		$output .= walk_category_tree( $categories, $depth, $r );
	}

	if ( $r['title_li'] && 'list' == $r['style'] )
		$output .= '</ul></li>';

	/**
	 * Filter the HTML output of a taxonomy list.
	 *
	 * @since 2.1.0
	 *
	 * @param string $output HTML output.
	 * @param array  $args   An array of taxonomy-listing arguments.
	 */
	$html = apply_filters( 'wp_list_categories', $output, $args );

	if ( $r['echo'] ) {
		echo $html;
	} else {
		return $html;
	}
}

/**
 * Display tag cloud.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the top 45 tags in the tag cloud list.
 *
 * The 'topic_count_text' argument is a nooped plural from _n_noop() to generate the
 * text for the tooltip of the tag link.
 *
 * The 'topic_count_text_callback' argument is a function, which given the count
 * of the posts with that tag returns a text for the tooltip of the tag link.
 *
 * The 'post_type' argument is used only when 'link' is set to 'edit'. It determines the post_type
 * passed to edit.php for the popular tags edit links.
 *
 * The 'exclude' and 'include' arguments are used for the {@link get_tags()}
 * function. Only one should be used, because only one will be used and the
 * other ignored, if they are both set.
 *
 * @since 2.3.0
 *
 * @param array|string|null $args Optional. Override default arguments.
 * @return null|false Generated tag cloud, only if no failures and 'array' is set for the 'format' argument.
 */
function wp_tag_cloud( $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'post_type' => '', 'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags

	if ( empty( $tags ) || is_wp_error( $tags ) )
		return;

	foreach ( $tags as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_term_link( $tag->term_id, $tag->taxonomy, $args['post_type'] );
		else
			$link = get_term_link( intval($tag->term_id), $tag->taxonomy );
		if ( is_wp_error( $link ) )
			return false;

		$tags[ $key ]->link = $link;
		$tags[ $key ]->id = $tag->term_id;
	}

	$return = wp_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args

	/**
	 * Filter the tag cloud output.
	 *
	 * @since 2.3.0
	 *
	 * @param string $return HTML output of the tag cloud.
	 * @param array  $args   An array of tag cloud arguments.
	 */
	$return = apply_filters( 'wp_tag_cloud', $return, $args );

	if ( 'array' == $args['format'] || empty($args['echo']) )
		return $return;

	echo $return;
}

/**
 * Default topic count scaling for tag links
 *
 * @param integer $count number of posts with that tag
 * @return integer scaled count
 */
function default_topic_count_scale( $count ) {
	return round(log10($count + 1) * 100);
}

/**
 * Generates a tag cloud (heatmap) from provided data.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'tag_cloud_sort' filter allows you to override the sorting.
 * Passed to the filter: $tags array and $args array, has to return the $tags array
 * after sorting it.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC' or
 * 'RAND'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the entire tag cloud list.
 *
 * The 'topic_count_text' argument is a nooped plural from _n_noop() to generate the
 * text for the tooltip of the tag link.
 *
 * The 'topic_count_text_callback' argument is a function, which given the count
 * of the posts with that tag returns a text for the tooltip of the tag link.
 *
 * @todo Complete functionality.
 * @since 2.3.0
 *
 * @param array $tags List of tags.
 * @param string|array $args Optional, override default arguments.
 * @return string|array Tag cloud as a string or an array, depending on 'format' argument.
 */
function wp_generate_tag_cloud( $tags, $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 0,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'topic_count_text' => null, 'topic_count_text_callback' => null,
		'topic_count_scale_callback' => 'default_topic_count_scale', 'filter' => 1,
	);

	$args = wp_parse_args( $args, $defaults );

	$return = ( 'array' === $args['format'] ) ? array() : '';

	if ( empty( $tags ) ) {
		return $return;
	}

	// Juggle topic count tooltips:
	if ( isset( $args['topic_count_text'] ) ) {
		// First look for nooped plural support via topic_count_text.
		$translate_nooped_plural = $args['topic_count_text'];
	} elseif ( ! empty( $args['topic_count_text_callback'] ) ) {
		// Look for the alternative callback style. Ignore the previous default.
		if ( $args['topic_count_text_callback'] === 'default_topic_count_text' ) {
			$translate_nooped_plural = _n_noop( '%s topic', '%s topics' );
		} else {
			$translate_nooped_plural = false;
		}
	} elseif ( isset( $args['single_text'] ) && isset( $args['multiple_text'] ) ) {
		// If no callback exists, look for the old-style single_text and multiple_text arguments.
		$translate_nooped_plural = _n_noop( $args['single_text'], $args['multiple_text'] );
	} else {
		// This is the default for when no callback, plural, or argument is passed in.
		$translate_nooped_plural = _n_noop( '%s topic', '%s topics' );
	}

	/**
	 * Filter how the items in a tag cloud are sorted.
	 *
	 * @since 2.8.0
	 *
	 * @param array $tags Ordered array of terms.
	 * @param array $args An array of tag cloud arguments.
	 */
	$tags_sorted = apply_filters( 'tag_cloud_sort', $tags, $args );
	if ( empty( $tags_sorted ) ) {
		return $return;
	}

	if ( $tags_sorted !== $tags ) {
		$tags = $tags_sorted;
		unset( $tags_sorted );
	} else {
		if ( 'RAND' === $args['order'] ) {
			shuffle( $tags );
		} else {
			// SQL cannot save you; this is a second (potentially different) sort on a subset of data.
			if ( 'name' === $args['orderby'] ) {
				uasort( $tags, '_wp_object_name_sort_cb' );
			} else {
				uasort( $tags, '_wp_object_count_sort_cb' );
			}

			if ( 'DESC' === $args['order'] ) {
				$tags = array_reverse( $tags, true );
			}
		}
	}

	if ( $args['number'] > 0 )
		$tags = array_slice( $tags, 0, $args['number'] );

	$counts = array();
	$real_counts = array(); // For the alt tag
	foreach ( (array) $tags as $key => $tag ) {
		$real_counts[ $key ] = $tag->count;
		$counts[ $key ] = call_user_func( $args['topic_count_scale_callback'], $tag->count );
	}

	$min_count = min( $counts );
	$spread = max( $counts ) - $min_count;
	if ( $spread <= 0 )
		$spread = 1;
	$font_spread = $args['largest'] - $args['smallest'];
	if ( $font_spread < 0 )
		$font_spread = 1;
	$font_step = $font_spread / $spread;

	$a = array();

	foreach ( $tags as $key => $tag ) {
		$count = $counts[ $key ];
		$real_count = $real_counts[ $key ];
		$tag_link = '#' != $tag->link ? esc_url( $tag->link ) : '#';
		$tag_id = isset($tags[ $key ]->id) ? $tags[ $key ]->id : $key;
		$tag_name = $tags[ $key ]->name;

		if ( $translate_nooped_plural ) {
			$title_attribute = sprintf( translate_nooped_plural( $translate_nooped_plural, $real_count ), number_format_i18n( $real_count ) );
		} else {
			$title_attribute = call_user_func( $args['topic_count_text_callback'], $real_count, $tag, $args );
		}

		$a[] = "<a href='$tag_link' class='tag-link-$tag_id' title='" . esc_attr( $title_attribute ) . "' style='font-size: " .
			str_replace( ',', '.', ( $args['smallest'] + ( ( $count - $min_count ) * $font_step ) ) )
			. $args['unit'] . ";'>$tag_name</a>";
	}

	switch ( $args['format'] ) {
		case 'array' :
			$return =& $a;
			break;
		case 'list' :
			$return = "<ul class='wp-tag-cloud'>\n\t<li>";
			$return .= join( "</li>\n\t<li>", $a );
			$return .= "</li>\n</ul>\n";
			break;
		default :
			$return = join( $args['separator'], $a );
			break;
	}

	if ( $args['filter'] ) {
		/**
		 * Filter the generated output of a tag cloud.
		 *
		 * The filter is only evaluated if a true value is passed
		 * to the $filter argument in wp_generate_tag_cloud().
		 *
		 * @since 2.3.0
		 *
		 * @see wp_generate_tag_cloud()
		 *
		 * @param array|string $return String containing the generated HTML tag cloud output
		 *                             or an array of tag links if the 'format' argument
		 *                             equals 'array'.
		 * @param array        $tags   An array of terms used in the tag cloud.
		 * @param array        $args   An array of wp_generate_tag_cloud() arguments.
		 */
		return apply_filters( 'wp_generate_tag_cloud', $return, $tags, $args );
	}

	else
		return $return;
}

/**
 * Callback for comparing objects based on name
 *
 * @since 3.1.0
 * @access private
 */
function _wp_object_name_sort_cb( $a, $b ) {
	return strnatcasecmp( $a->name, $b->name );
}

/**
 * Callback for comparing objects based on count
 *
 * @since 3.1.0
 * @access private
 */
function _wp_object_count_sort_cb( $a, $b ) {
	return ( $a->count > $b->count );
}

//
// Helper functions
//

/**
 * Retrieve HTML list content for category list.
 *
 * @uses Walker_Category to create HTML list content.
 * @since 2.1.0
 * @see Walker_Category::walk() for parameters and return description.
 */
function walk_category_tree() {
	$args = func_get_args();
	// the user's options are the third parameter
	if ( empty($args[2]['walker']) || !is_a($args[2]['walker'], 'Walker') )
		$walker = new Walker_Category;
	else
		$walker = $args[2]['walker'];

	return call_user_func_array(array( &$walker, 'walk' ), $args );
}

/**
 * Retrieve HTML dropdown (select) content for category list.
 *
 * @uses Walker_CategoryDropdown to create HTML dropdown content.
 * @since 2.1.0
 * @see Walker_CategoryDropdown::walk() for parameters and return description.
 */
function walk_category_dropdown_tree() {
	$args = func_get_args();
	// the user's options are the third parameter
	if ( empty($args[2]['walker']) || !is_a($args[2]['walker'], 'Walker') )
		$walker = new Walker_CategoryDropdown;
	else
		$walker = $args[2]['walker'];

	return call_user_func_array(array( &$walker, 'walk' ), $args );
}

/**
 * Create HTML list of categories.
 *
 * @package WordPress
 * @since 2.1.0
 * @uses Walker
 */
class Walker_Category extends Walker {
	/**
	 * What the class handles.
	 *
	 * @see Walker::$tree_type
	 * @since 2.1.0
	 * @var string
	 */
	public $tree_type = 'category';

	/**
	 * Database fields to use.
	 *
	 * @see Walker::$db_fields
	 * @since 2.1.0
	 * @todo Decouple this
	 * @var array
	 */
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	/**
	 * Starts the list before the elements are added.
	 *
	 * @see Walker::start_lvl()
	 *
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of category. Used for tab indentation.
	 * @param array  $args   An array of arguments. Will only append content if style argument value is 'list'.
	 *                       @see wp_list_categories()
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'>\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of category. Used for tab indentation.
	 * @param array  $args   An array of arguments. Will only append content if style argument value is 'list'.
	 *                       @wsee wp_list_categories()
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 2.1.0
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category Category data object.
	 * @param int    $depth    Depth of category in reference to parents. Default 0.
	 * @param array  $args     An array of arguments. @see wp_list_categories()
	 * @param int    $id       ID of the current category.
	 */
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		$link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
		if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
			/**
			 * Filter the category description for display.
			 *
			 * @since 1.2.0
			 *
			 * @param string $description Category description.
			 * @param object $category    Category object.
			 */
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link .= '>';
		$link .= $cat_name . '</a>';

		if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$alt = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
			}
			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( ! empty( $args['show_count'] ) ) {
			$link .= ' (' . number_format_i18n( $category->count ) . ')';
		}
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'cat-item cat-item-' . $category->term_id;
			if ( ! empty( $args['current_category'] ) ) {
				$_current_category = get_term( $args['current_category'], $category->taxonomy );
				if ( $category->term_id == $args['current_category'] ) {
					$class .=  ' current-cat';
				} elseif ( $category->term_id == $_current_category->parent ) {
					$class .=  ' current-cat-parent';
				}
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see Walker::end_el()
	 *
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $page   Not used.
	 * @param int    $depth  Depth of category. Not used.
	 * @param array  $args   An array of arguments. Only uses 'list' for whether should append to output. @see wp_list_categories()
	 */
	public function end_el( &$output, $page, $depth = 0, $args = array() ) {
		if ( 'list' != $args['style'] )
			return;

		$output .= "</li>\n";
	}

}

/**
 * Create HTML dropdown list of Categories.
 *
 * @package WordPress
 * @since 2.1.0
 * @uses Walker
 */
class Walker_CategoryDropdown extends Walker {
	/**
	 * @see Walker::$tree_type
	 * @since 2.1.0
	 * @var string
	 */
	public $tree_type = 'category';

	/**
	 * @see Walker::$db_fields
	 * @since 2.1.0
	 * @todo Decouple this
	 * @var array
	 */
	public $db_fields = array ('parent' => 'parent', 'id' => 'term_id');

	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 * @since 2.1.0
	 *
	 * @param string $output   Passed by reference. Used to append additional content.
	 * @param object $category Category data object.
	 * @param int    $depth    Depth of category. Used for padding.
	 * @param array  $args     Uses 'selected' and 'show_count' keys, if they exist. @see wp_dropdown_categories()
	 */
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		$pad = str_repeat('&nbsp;', $depth * 3);

		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters( 'list_cats', $category->name, $category );

		$output .= "\t<option class=\"level-$depth\" value=\"".$category->term_id."\"";
		if ( $category->term_id == $args['selected'] )
			$output .= ' selected="selected"';
		$output .= '>';
		$output .= $pad.$cat_name;
		if ( $args['show_count'] )
			$output .= '&nbsp;&nbsp;('. number_format_i18n( $category->count ) .')';
		$output .= "</option>\n";
	}
}

//
// Tags
//

/**
 * Retrieve the link to the tag.
 *
 * @since 2.3.0
 * @see get_term_link()
 *
 * @param int|object $tag Tag ID or object.
 * @return string Link on success, empty string if tag does not exist.
 */
function get_tag_link( $tag ) {
	if ( ! is_object( $tag ) )
		$tag = (int) $tag;

	$tag = get_term_link( $tag, 'post_tag' );

	if ( is_wp_error( $tag ) )
		return '';

	return $tag;
}

/**
 * Retrieve the tags for a post.
 *
 * @since 2.3.0
 *
 * @param int $id Post ID.
 * @return array|bool Array of tag objects on success, false on failure.
 */
function get_the_tags( $id = 0 ) {

	/**
	 * Filter the array of tags for the given post.
	 *
	 * @since 2.3.0
	 *
	 * @see get_the_terms()
	 *
	 * @param array $terms An array of tags for the given post.
	 */
	return apply_filters( 'get_the_tags', get_the_terms( $id, 'post_tag' ) );
}

/**
 * Retrieve the tags for a post formatted as a string.
 *
 * @since 2.3.0
 *
 * @param string $before Optional. Before tags.
 * @param string $sep Optional. Between tags.
 * @param string $after Optional. After tags.
 * @param int $id Optional. Post ID. Defaults to the current post.
 * @return string|bool|WP_Error A list of tags on success, false if there are no terms, WP_Error on failure.
 */
function get_the_tag_list( $before = '', $sep = '', $after = '', $id = 0 ) {

	/**
	 * Filter the tags list for a given post.
	 *
	 * @since 2.3.0
	 *
	 * @param string $tag_list List of tags.
	 * @param string $before   String to use before tags.
	 * @param string $sep      String to use between the tags.
	 * @param string $after    String to use after tags.
	 * @param int    $id       Post ID.
	 */
	return apply_filters( 'the_tags', get_the_term_list( $id, 'post_tag', $before, $sep, $after ), $before, $sep, $after, $id );
}

/**
 * Retrieve the tags for a post.
 *
 * @since 2.3.0
 *
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 */
function the_tags( $before = null, $sep = ', ', $after = '' ) {
	if ( null === $before )
		$before = __('Tags: ');
	echo get_the_tag_list($before, $sep, $after);
}

/**
 * Retrieve tag description.
 *
 * @since 2.8.0
 *
 * @param int $tag Optional. Tag ID. Will use global tag ID by default.
 * @return string Tag description, available.
 */
function tag_description( $tag = 0 ) {
	return term_description( $tag );
}

/**
 * Retrieve term description.
 *
 * @since 2.8.0
 *
 * @param int $term Optional. Term ID. Will use global term ID by default.
 * @param string $taxonomy Optional taxonomy name. Defaults to 'post_tag'.
 * @return string Term description, available.
 */
function term_description( $term = 0, $taxonomy = 'post_tag' ) {
	if ( ! $term && ( is_tax() || is_tag() || is_category() ) ) {
		$term = get_queried_object();
		if ( $term ) {
			$taxonomy = $term->taxonomy;
			$term = $term->term_id;
		}
	}
	$description = get_term_field( 'description', $term, $taxonomy );
	return is_wp_error( $description ) ? '' : $description;
}

/**
 * Retrieve the terms of the taxonomy that are attached to the post.
 *
 * @since 2.5.0
 *
 * @param int|object $post Post ID or object.
 * @param string $taxonomy Taxonomy name.
 * @return array|bool|WP_Error Array of term objects on success, false if there are no terms
 *                             or the post does not exist, WP_Error on failure.
 */
function get_the_terms( $post, $taxonomy ) {
	if ( ! $post = get_post( $post ) )
		return false;

	$terms = get_object_term_cache( $post->ID, $taxonomy );
	if ( false === $terms ) {
		$terms = wp_get_object_terms( $post->ID, $taxonomy );
		wp_cache_add($post->ID, $terms, $taxonomy . '_relationships');
	}

	/**
	 * Filter the list of terms attached to the given post.
	 *
	 * @since 3.1.0
	 *
	 * @param array|WP_Error $terms    List of attached terms, or WP_Error on failure.
	 * @param int            $post_id  Post ID.
	 * @param string         $taxonomy Name of the taxonomy.
	 */
	$terms = apply_filters( 'get_the_terms', $terms, $post->ID, $taxonomy );

	if ( empty( $terms ) )
		return false;

	return $terms;
}

/**
 * Retrieve a post's terms as a list with specified format.
 *
 * @since 2.5.0
 *
 * @param int $id Post ID.
 * @param string $taxonomy Taxonomy name.
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return string|bool|WP_Error A list of terms on success, false if there are no terms, WP_Error on failure.
 */
function get_the_term_list( $id, $taxonomy, $before = '', $sep = '', $after = '' ) {
	$terms = get_the_terms( $id, $taxonomy );

	if ( is_wp_error( $terms ) )
		return $terms;

	if ( empty( $terms ) )
		return false;

	foreach ( $terms as $term ) {
		$link = get_term_link( $term, $taxonomy );
		if ( is_wp_error( $link ) )
			return $link;
		$term_links[] = '<a href="' . esc_url( $link ) . '" rel="tag">' . $term->name . '</a>';
	}

	/**
	 * Filter the term links for a given taxonomy.
	 *
	 * The dynamic portion of the filter name, `$taxonomy`, refers
	 * to the taxonomy slug.
	 *
	 * @since 2.5.0
	 *
	 * @param array $term_links An array of term links.
	 */
	$term_links = apply_filters( "term_links-$taxonomy", $term_links );

	return $before . join( $sep, $term_links ) . $after;
}

/**
 * Display the terms in a list.
 *
 * @since 2.5.0
 *
 * @param int $id Post ID.
 * @param string $taxonomy Taxonomy name.
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return false|null False on WordPress error. Returns null when displaying.
 */
function the_terms( $id, $taxonomy, $before = '', $sep = ', ', $after = '' ) {
	$term_list = get_the_term_list( $id, $taxonomy, $before, $sep, $after );

	if ( is_wp_error( $term_list ) )
		return false;

	/**
	 * Filter the list of terms to display.
	 *
	 * @since 2.9.0
	 *
	 * @param array  $term_list List of terms to display.
	 * @param string $taxonomy  The taxonomy name.
	 * @param string $before    String to use before the terms.
	 * @param string $sep       String to use between the terms.
	 * @param string $after     String to use after the terms.
	 */
	echo apply_filters( 'the_terms', $term_list, $taxonomy, $before, $sep, $after );
}

/**
 * Check if the current post has any of given category.
 *
 * @since 3.1.0
 *
 * @param string|int|array $category Optional. The category name/term_id/slug or array of them to check for.
 * @param int|object $post Optional. Post to check instead of the current post.
 * @return bool True if the current post has any of the given categories (or any category, if no category specified).
 */
function has_category( $category = '', $post = null ) {
	return has_term( $category, 'category', $post );
}

/**
 * Check if the current post has any of given tags.
 *
 * The given tags are checked against the post's tags' term_ids, names and slugs.
 * Tags given as integers will only be checked against the post's tags' term_ids.
 * If no tags are given, determines if post has any tags.
 *
 * Prior to v2.7 of WordPress, tags given as integers would also be checked against the post's tags' names and slugs (in addition to term_ids)
 * Prior to v2.7, this function could only be used in the WordPress Loop.
 * As of 2.7, the function can be used anywhere if it is provided a post ID or post object.
 *
 * @since 2.6.0
 *
 * @param string|int|array $tag Optional. The tag name/term_id/slug or array of them to check for.
 * @param int|object $post Optional. Post to check instead of the current post. (since 2.7.0)
 * @return bool True if the current post has any of the given tags (or any tag, if no tag specified).
 */
function has_tag( $tag = '', $post = null ) {
	return has_term( $tag, 'post_tag', $post );
}

/**
 * Check if the current post has any of given terms.
 *
 * The given terms are checked against the post's terms' term_ids, names and slugs.
 * Terms given as integers will only be checked against the post's terms' term_ids.
 * If no terms are given, determines if post has any terms.
 *
 * @since 3.1.0
 *
 * @param string|int|array $term Optional. The term name/term_id/slug or array of them to check for.
 * @param string $taxonomy Taxonomy name
 * @param int|object $post Optional. Post to check instead of the current post.
 * @return bool True if the current post has any of the given tags (or any tag, if no tag specified).
 */
function has_term( $term = '', $taxonomy = '', $post = null ) {
	$post = get_post($post);

	if ( !$post )
		return false;

	$r = is_object_in_term( $post->ID, $taxonomy, $term );
	if ( is_wp_error( $r ) )
		return false;

	return $r;
}
