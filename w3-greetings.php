<?php
/*
Plugin Name: W3 Greetings
Description: Show Greetings to Users
Plugin URI: https://github.com/w3programmers/w3-greetings
Version: 1.0.0
Author: Masud Alam
Author URI: http://w3programmers.com
Text Domain: w3-greetings
*/

function w3greetings() {
     /* This sets the $time variable to the current hour in the 24 hour clock format */
     add_option('greeting');

     $time = date("H");
     /* Set the $timezone variable to become the current timezone */
     $timezone = date("e");
     /* If the time is less than 1200 hours, show good morning */
     if ($time < "12") {
         update_option("greeting","Good morning");
     } else
     /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
     if ($time >= "12" && $time < "17") {
        update_option("greeting","Good afternoon");
     } else
     /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
     if ($time >= "17" && $time < "19") {
        update_option("greeting","Good evening");
     } else
     /* Finally, show good night if the time is greater than or equal to 1900 hours */
     if ($time >= "19") {
        update_option("greeting","Good night");
     }
}
add_action( 'init', 'w3greetings' );

function w3_show_greeting(){
    echo get_option("greeting");
}
add_action("wp_head","w3_show_greeting");
