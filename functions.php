<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$includes_dir = "includes";

$includes = array(
	"/functions/dequeue.php",
	"/functions/enqueue.php",
	"/functions/bootstrap-5-default.php",
	"/functions/customizer-control.php",
	"/functions/text-domain.php"
);

// Include files.
foreach ($includes as $file) {
	require_once get_theme_file_path($includes_dir . $file);
}
//