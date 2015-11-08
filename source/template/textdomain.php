<?php
/*
Plugin Name: @@name
Plugin URI: @@homepage
Description: @@description
Version: @@version
Author: @@author
Author URI: @@author_url
License: @@license @@license_version
License URI: @@license_url
*/

// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


/**
 * Returns string with ASCII convertet characters
 *
 * @since 0.2.1
 * @access private
 *
 * @param string $str
 * @return string
 */
function @@textdomain_convert_to_ascii( $str ) {

    $pieces = str_split( trim( $str ) );
    $new_str = '';

    foreach( $pieces as $val ) {
        $new_str .= '&#' . ord( $val ) . ';';
    }

    return $new_str;

}


/**
 * Convert Email-addresses into ASCII strings to optimistically protect them from spambots
 *
 * Usage:
 * [email=mail@example.com/] | [email]mail@example.com[/email] | [email mailto=mail@example.com]Linktitle[/email]
 *
 * Output:
 * <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#109;&#97;&#105;&#108;&#64;&#101;&#120;&#97;&#109;&#112;&#108;&#101;&#46;&#99;&#111;&#109;">&#76;&#105;&#110;&#107;&#116;&#105;&#116;&#108;&#101;</a>
 *
 * @since 0.2.1
 * @access public
 *
 * @param array $atts
 * @param string $content
 * @return void
 */
function @@textdomain_email_func( $atts, $content = false ) {

    extract( shortcode_atts( array(
        "mailto" => false,
    ), $atts ) );

    if ( ! $mailto && ! $content ) {

        if ( ! empty( $atts[0] ) ) {
            $mailto = str_replace( '=', '', str_replace( '"', '', $atts[0] ) );
            $content = $mailto;
        } else {
            return 'EMAIL MISSING';
        }

    }

    if ( ! $mailto ) {
        $mailto = $content;
    }
    if ( ! $content ) {
        $content = $mailto;
    }

    $out = sprintf(
        '<a href="%s">%s</a>',
        @@textdomain_convert_to_ascii( 'mailto:' . $mailto ),
        @@textdomain_convert_to_ascii( $content )
    );

    return $out;

}
add_shortcode( 'email', '@@textdomain_email_func' );


/**
 * Build internal links by post/page/attachment ID
 *
 * Usage:
 * [int id=12] | [int id=12 name="Linktitle"] | [int id=12 name="Linktitle" class="clasname"]
 *
 * Output:
 * <a href="http://url../" id="int-12" class="int-link type-page page-about classname" title="about" data-slug="about">Linktitle</a>
 *
 * @since 0.2.1
 * @access public
 *
 * @param array $atts
 * @return void
 */
function @@textdomain_internallink_func( $atts ) {

	extract( shortcode_atts( array(
		'id'      => false,
		'name'    => false,
		'class'   => '',
	), $atts ) );

	$out = '<strong>Missing Reference</strong>';

	if ( $id ) {

		$page_data         = get_page( $id );
		$slug              = $page_data->post_name;

		if( isset( $slug ) ) {

			$title         = $page_data->post_title;
			$type          = $page_data->post_type;

            if ( $name ) {
                $name_attr = esc_attr( $name );
            } else {
                $name_attr = esc_attr( $title );
            }

            if ( 'post' == $type ) {
                $href_attr = esc_attr( get_permalink( $id ) );
            } elseif ( 'attachment' == $type ) {
                $href_attr = esc_attr( wp_get_attachment_url( $id ) );
            } else {
                $href_attr = esc_attr( get_page_link( $id ) );
            }

			$id_attr       = esc_attr( 'int-link-' . $id );
			$class_attr    = esc_attr( 'int-link type-' . $type . ' ' . $type . '-' . $slug . ' ' . $class );
			$title_attr    = esc_attr( $title );

            $out = sprintf(
                '<a href="%s" id="%s" class="%s" title="%s" data-slug="%s">%s</a>',
                $href_attr,
                $id_attr,
                $class_attr,
                $title_attr,
                $slug,
                $name_attr
            );

		}

	}

	return $out;

}
add_shortcode( 'int', '@@textdomain_internallink_func' );