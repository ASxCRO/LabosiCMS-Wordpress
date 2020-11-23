<?php
/*
Plugin Name: Dodatak - status predmeta
Plugin URI: https://vsmti.hr
Description: Dodatak za dodavanje mogućnosti odabira statusa predmeta
Version: 1.0
Author: Antonio Šarabok
Author URI: https://vsmti.hr
Text Domain: vsmti
*/
function obrisi_post_meta_status_predmeta()
{
    delete_post_meta_by_key('status_predmeta');
}
register_deactivation_hook(__FILE__, 'obrisi_post_meta_status_predmeta');

function add_meta_box_status_predmeta()
{
    add_meta_box(
        'vsmti_predmet_status',
        'Status predmeta',
        'html_meta_box_status_predmeta',
        'predmet'
    );
}

function html_meta_box_status_predmeta($post)
{
    wp_nonce_field('spremi_status_predmeta', 'status_predmeta_nonce');
    //dohvaćanje meta vrijednosti
    $status_predmeta = get_post_meta($post->ID, 'status_predmeta', true);
    echo '
<div>
<label for="status_predmeta">Odaberite status predmeta</label>
<select id="status_predmeta" name="status_predmeta">
<option value="obavezan" ' . (($status_predmeta == 'obavezan' ||
        $status_predmeta == '') ? 'selected' : '') . '>Obavezan</option>
<option value="izborni" ' . (($status_predmeta == 'izborni') ?
        'selected' : '') . '>Izborni</option>
</select>
</div>';
}

function spremi_status_predmeta($post_id)
{
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce_status_predmeta = (isset($_POST['status_predmeta_nonce']) &&
        wp_verify_nonce($_POST['status_predmeta_nonce'], basename(__FILE__))) ? 'true' : 'false';
    if ($is_autosave || $is_revision || !$is_valid_nonce_status_predmeta) {
        return;
    }
    if (!empty($_POST['status_predmeta'])) {
        update_post_meta($post_id, 'status_predmeta', $_POST['status_predmeta']);
    } else {
        delete_post_meta($post_id, 'status_predmeta');
    }
}
add_action('add_meta_boxes', 'add_meta_box_status_predmeta');
add_action('save_post', 'spremi_status_predmeta');
