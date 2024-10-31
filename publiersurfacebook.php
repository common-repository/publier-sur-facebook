<?php
/*
Plugin Name: Publier sur Facebook
Plugin URI: http://www.dada87.fr/projets/plugin-theme/
Description: Creer un booutton dans l'interface admin pour pouvoir publier vos posts dŽs que vous les avez crŽŽs.
Version: 1.0
Author: David Dattee
Author URI: http://www.dada87.fr/
License: GPL 2
*/

/*  Copyright 2010  DATTEE David  (email : dada87@live.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

load_plugin_textdomain('psb-translate','/wp-content/plugins/publier-sur-facebook/languages/');

function fbp_meta_box() {

	if(get_post_status() == 'publish'){
		
	$permalink = get_permalink();
	$shareonfb = "http://www.facebook.com/share.php?u=";

	echo "<input type='button' id='pfb_new_window' name='pfb_new_window' value='".__("Send to my wall","psb-translate")."' onClick='window.open(\"".$shareonfb.$permalink."\");' />";
	
	}else{
	
	echo _e("The post has to be published before being shared on facebook.","psb-translate");
	
	}
}

function fbp_add_meta_box() {
	add_meta_box('publish_to_wall', __('Publish on Facebook',"psb-translate"), 'fbp_meta_box', 'post', 'side');
}

add_action('admin_init', 'fbp_add_meta_box');

?>