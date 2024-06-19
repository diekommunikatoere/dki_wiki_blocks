<?php
if ( $attributes['isButton'] ) {
    $button_class = 'class="primary-button"';
} else {
    $button_class = '';
}

$link = get_edit_post_link( get_the_ID() );

?>

<p <?php echo get_block_wrapper_attributes(); ?>>
    <a <?php echo $button_class ?> href="<?php echo $link; ?>">
        Diesen Artikel bearbeiten
    </a>
</p>