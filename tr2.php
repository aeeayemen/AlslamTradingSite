<?php
/**
 * Transfer (Export) Files Server to Server using PHP FTP
 * @link https://shellcreeper.com/?p=1249
 */
 


/* Remote File Name and Path */
$remote_file = 'homedir.tar.gz';
 
/* FTP Account (Remote Server) */
$ftp_host = '208.109.70.186'; /* host */
$ftp_user_name = 'issam@alsalamest.com'; /* username */
$ftp_user_pass = 'NjkB4!Xtu=pV'; /* password */
 
 
/* File and path to send to remote FTP server */
$local_file = '/home/alsalamest/public_html/homedir.tar.gz';
 
/* Connect using basic FTP */
$connect_it = ftp_connect( $ftp_host );
 
/* Login to FTP */
$login_result = ftp_login( $connect_it, $ftp_user_name, $ftp_user_pass );
 
// turn passive mode on
ftp_pasv($connect_it, true);

/* Send $local_file to FTP */
if ( ftp_put( $connect_it, $remote_file, $local_file, FTP_BINARY ) ) {
    echo "WOOT! Successfully transfer $local_file\n";
}
else {
    echo "Doh! There was a problem\n";
}
 
/* Close the connection */
ftp_close( $connect_it );
?>