<?php
/**
 * @package Motivational_Phrases
 * @version 1.0.0
 */
/*
Plugin Name: Motivational Phrases
Description: This plugin displays motivational phrases to make your day happier and more productive.
Author: Márcio Barcellos
Version: 1.0.0
Author URI: https://github.com/marsilba
*/

function motivational() {
	/** Motivational Phrases */
	$phrases = "Success is not final; failure is not fatal: It is the courage to continue that counts. — Winston S. Churchill
    It is better to fail in originality than to succeed in imitation. — Herman Melville
    The road to success and the road to failure are almost exactly the same. — Colin R. Davis
    Success usually comes to those who are too busy looking for it. — Henry David Thoreau
    Develop success from failures. Discouragement and failure are two of the surest stepping stones to success. —Dale Carnegie
    There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind. —Mister Rogers
    Success is peace of mind, which is a direct result of self-satisfaction in knowing you made the effort to become the best of which you are capable. —John Wooden
    I never dreamed about success. I worked for it. —Estée Lauder
    Success is getting what you want, happiness is wanting what you get. ―W. P. Kinsella
    If you are working on something that you really care about, you don’t have to be pushed. The vision pulls you. — Steve Jobs";

	// Here we split it into lines.
	$phrases = explode( "\n", $phrases );

	// And then randomly choose a line.
	return wptexturize( $phrases[ mt_rand( 0, count( $phrases ) - 1 ) ] );
}

function hi_motivational() {
	$chosen = motivational();	

	printf('<p id="motivational"><span>%s</span></p>', $chosen);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hi_motivational' );

// We need some CSS to position the paragraph.
function motivational_css() {
	echo "
	<style type='text/css'>
	#motivational {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
    color: red;
    animation: animate 2s linear 3;
	}
    
    @keyframes animate{
        0%{
          opacity: 0;
        }
        50%{
          opacity: 0.7;
        }
        100%{
          opacity: 0;
        }
      }
	</style>
	";
}

add_action( 'admin_head', 'motivational_css' );

function ip_address() {
  printf('<p id="ip">Your ip is <span>%s</span></p>', $_SERVER['REMOTE_ADDR']);
}

add_filter('admin_footer_text', 'ip_address');
