<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/templates/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

//La siguiente sentencia dice lo siguiente
//Saca 4 post del ctp productos por pagina, y en el loop que yo haga lo llamo con el nombre latest
$args= array(
    'posts_per_page' => 4,
    'post_type' => 'productos',
    'order' => 'DESC'
);

$query= new WP_Query($args);
$context['latest'] = Timber::get_posts($query);
wp_reset_query();

//AQUI ME LLEVO TODOS LOS POST

//Con esta consulta query saco los post y evito introducir el parametro en la funcion get_posts
$args = array(
    'post_type' => 'productos'
);

$query= new WP_Query($args);
$context['allposts'] = Timber::get_posts($query);
wp_reset_query();

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );

