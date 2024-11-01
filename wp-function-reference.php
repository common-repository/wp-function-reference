<?php
/*
Plugin Name: WP Function Reference
Plugin URI: http://www.desynes.com/portfolio/web-development-projects/wordpress/wp-function-reference
Description: Provides a box on the dashboard with a list of the functions that are available for you to use in your Wordpress installation, should you wish to do any development, coding, etc. Each function is linked to the WP Codex development/wiki page (if any) which contains more in-depth information about the function.
Version: 1.1
Author: JerDiggity
Author URI: http://www.jerdiggity.com/
*/
?>
<?php
/*  Copyright 2010 JerDiggity (email : wp@jerdiggity.com)

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
?>
<?php
// Long? Yes. But it should make itself pretty self-explanatory...???
// Plus, the code itself is only a few lines and I need to feel like I did SOMETHING.  :)
function show_me_which_functions_are_available() {
// Assign get_defined_functions() to the variable $funx
$funx = get_defined_functions();
// Print an unordered list and limit the height to 400px (otherwise it would be a mile long).
echo '<ul style="overflow: auto; height: 400px; width: auto; text-indent: 10px; list-style-type: square;">';
natcasesort($funx["user"]);
	// All we want are the "user" defined functions
	foreach ($funx["user"] as $function_name) {
	// The following creates: <li><a href="http://codex.wordpress.org/Function_Reference/
	echo '<li><a href="http://codex.wordpress.org/Function_Reference/';
	// Tack on the $function_name to our link, leaving us with: <li><a href="http://codex.wordpress.org/Function_Reference/$function_name
	echo $function_name;
	// Tell it to open in a new window and complete the opening HTML <a> tag...
	// ... which will update our list item to: <li><a href="http://codex.wordpress.org/Function_Reference/$function_name" target="_blank">
	echo '" target="_blank">';
	// Print the $function_name and add () to the end to make it pretty, then close the </a> and </li>.
	// After the next line: <li><a href="http://codex.wordpress.org/Function_Reference/$function_name" target="_blank">$function_name()</a></li>
	echo "$function_name" . "()</a></li>";
	// "foreach" == Do it over and over until there are no more left.
	}
// No more?  OK, close the unordered list:
echo '</ul>';
// "Thanks!"
}

// Whoa. A 63-character function.
function show_me_which_functions_are_available_dashboard_widget_function() {
show_me_which_functions_are_available();
}

// Create the widget that will show up on the dashboard...
function show_me_which_functions_are_available_add_dashboard_widgets() {
	wp_add_dashboard_widget('show_me_which_functions_are_available_dashboard_widget', 'WP Function Reference', 'show_me_which_functions_are_available_dashboard_widget_function');	
}

// ... and now tell Wordpress, "Make this thing show up on the dashboard."
add_action('wp_dashboard_setup', 'show_me_which_functions_are_available_add_dashboard_widgets');

?>
