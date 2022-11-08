<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;


//VARIABLES IVA Y CONIVA
$context['precio'] = get_field('precio');
$context['iva'] = $context['precio'] * 0.21;
$context['coniva'] = $context['iva'] + $context['precio'];

/* SACAR POST.IVA
$context['Opost'] = array(

		"iva" => $context['iva'],
		"coniva" =>$context['coniva']

);
*/

//ASI TAMBIEN LOS SACA ASI + FACIL, LUEGO LO LLAMAS COMO OPOST.IVA
$context['Opost']['iva']=$context['iva'];
$context['Opost']['coniva']=$context['coniva'];




//BUSCAR ESTA SENTECIA

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}

/*
*$context['coniva'] = array(

	'meta_value_num' => 0.21

);

*
*/