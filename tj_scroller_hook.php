<?php
/**
 * Plugin Name:  TJ Scroller
 * Plugin URI:   https://github.com/TanvirAmi/TJ-Scroller
 * Description:  This plugin will add a scroll to top functionality in your website. 
 * Version:      1.0
 * Author:       Theme Junkie
 * Author URI:   http://www.theme-junkie.com/
 * Author Email: tanvir.focus@gmail.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 */

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class tj_scroller{
    //constructor method calling here
    public function __construct(){
        add_action('init', array($this, 'tj_add_latest_jquery'));
        add_action('init', array($this, 'tj_redefine'));
        add_action('init', array($this, 'tj_scroller_script'));
        add_action('init', array($this, 'tj_scroller_style'));
    }

    
    //Adding latest jQuery of wordpress
    function tj_add_latest_jquery() {
        wp_enqueue_script('jquery');
    }
    
    
    // Setting up plugin DIR & URI
    public function tj_redefine(){
        define('TJ_PLUG', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
    }
    
    
    // Adding main scrolling script
    public function tj_scroller_script(){
        //Adding ui totop
        wp_enqueue_script('tj_ui_script', TJ_PLUG.'js/jquery.ui.totop.js', array('jquery'));

        //Adding easing js file
        wp_enqueue_script('tj_easing_script', TJ_PLUG.'js/easing.js', array('jquery'));

        //Adding manual script
        wp_enqueue_script('tj_manual_script', TJ_PLUG.'js/manual.js', array('jquery'), TRUE);
    }

    
    //Adding CSS file
    public function tj_scroller_style(){
        wp_enqueue_style('tj_enqueue_plugin_css', TJ_PLUG.'css/scroller.css');
    }
}

$obj=new tj_scroller;
?>
