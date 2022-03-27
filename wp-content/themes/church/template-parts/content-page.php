<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package church
 */

?>

<div class="breadcrumbs_block">
    <div class="container">
        <?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?>
    </div>
</div>
<?php
the_content();
?>