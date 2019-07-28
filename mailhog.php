<?php
function mailhog_phpmailer_smtp( $phpmailer ) {
	$phpmailer->Host = 'smtp'; # Docker service name
    $phpmailer->Port = 1025; # Docker service port
    $phpmailer->IsSMTP();
}
add_action( 'phpmailer_init', 'mailhog_phpmailer_smtp' );