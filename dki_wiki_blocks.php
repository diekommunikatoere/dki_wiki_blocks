<?php

/*
 * Plugin Name: DKI Wiki Blocks
 * Plugin URI: https://hub.diekommunikatoere.de
 * Description: Custom Gutenberg Blocks for DKI Wiki
 * Requires at least: 6.1
 * Requires PHP: 7.0
 * Version: 0.1.0
 * Author: Steven Sullivan, Jörg Hegner
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: dki-wiki-blocks
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