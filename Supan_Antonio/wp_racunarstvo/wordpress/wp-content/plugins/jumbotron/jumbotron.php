<?php
/*
Plugin Name: Jumbotron dodatak
Plugin URI: https://vsmti.hr
Description: Dodatak za dodavanje jumbotrona preko Shortcode-a
Version: 1.0
Author: Antonio Šarabok
Author URI: https://vsmti.hr
Text Domain: vsmti

*/
function kreiraj_jumbotron_shortcode($atts, $content = NULL)
{
$naslov = $atts['naslov'];
$gumb_tekst = $atts['gumb_tekst'];
$gumb_url = $atts['gumb_url'];
$sHtml = '
<div class="jumbotron">
 <h1 class="display-4">'.$naslov.'</h1>
 <p class="lead">'.$content.'</p>
 <hr class="my-4">
 <p class="lead">
 <a class="btn btn-primary btn-lg" href="'.$gumb_url.'" role="button"
target="_blank">'.$gumb_tekst.'</a>
 </p>
</div>
';
return $sHtml;
}
add_shortcode( 'jumbotron', 'kreiraj_jumbotron_shortcode' );
