<?php
/**
 * Plugin Name:         DKI Wiki Blocks
 * Plugin URI:          https://hub.diekommunikatoere.de
 * Description:         Custom Gutenberg Blocks for DKI Wiki
 * Requires at least:   6.5
 * Requires PHP:        7.0
 * Version:             0.2.0
 * Author:              Steven Sullivan, Jörg Hegner
 * License:             GPL-2.0-or-later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         dki-wiki-blocks
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



// START ----- Search all folders in the 'blocks' directory for block.json files and register them
//

function dki_wiki_blocks_register_blocks() {
    $blocks_dir = __DIR__ . '/blocks';
    $block_folders = scandir($blocks_dir);
    foreach ($block_folders as $block_folder) {
        if ($block_folder === '.' || $block_folder === '..') {
            continue;
        }
        $block_json = $blocks_dir . '/' . $block_folder . '/build/block.json';
        if (file_exists($block_json)) {
            register_block_type( $blocks_dir . '/' . $block_folder . '/build' );
        }
    }
}

add_action('init', 'dki_wiki_blocks_register_blocks');

// END ----- Search all folders in the 'blocks' directory for block.json files and register them
 
 
// START ----- Set allowed blocks for users in group "team"
// https://developer.wordpress.org/reference/hooks/allowed_block_types_all/

function example_filter_allowed_block_types_when_post_provided( $allowed_block_types, $editor_context ) {
	$user = wp_get_current_user();
	$allowed_role = array( 'team', 'um_team' );
	if ( array_intersect( $allowed_role, $user->roles ) ) {
		if ( ! empty( $editor_context->post ) ) {
			return array( 
				'core/audio',
				'core/button',
				'core/buttons',
				'core/code',
				'core/column',
				'core/columns',
				'core/cover',
				'core/details',
				'core/embed',
				'core/file',
				'core/footnotes',
				'core/form',
				'core/form-input',
				'core/form-submission-notification',
				'core/form-submit-button',
				'core/gallery',
				'core/group',
				'core/heading',
				'core/image',
				'core/list',
				'core/list-item',
				'core/media-text',
				'core/navigation-link',
				'core/paragraph',
				'core/preformatted',
				'core/pullquote',
				'core/quote',
				'core/separator',
				'core/social-link',
				'core/social-links',
				'core/spacer',
				'core/table',
				'core/verse',
				'core/video'
			);
		}
		return $allowed_block_types;
	}
}
add_filter( 'allowed_block_types_all', 'example_filter_allowed_block_types_when_post_provided', 10, 2 );

// END ----- Set allowed blocks for users in group "team"

