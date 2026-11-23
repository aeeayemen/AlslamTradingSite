<?php
$host = "208.109.70.186";
$port = 21;
$timeout = 600;
$user = "issam@alsalamest.com";
$pass = 'NjkB4!Xtu=pV';
$source_file = "/home/alsalamest/public_html/homedir.tar.gz";
set_time_limit(0);
$dest_file= "homedir.tar.gz";

$ftp = ftp_connect($host, $port, $timeout) or die("Could not connect to $ftp");
ftp_login($ftp, $user, $pass);

// turn passive mode on
ftp_pasv($ftp, true);
ftp_set_option ($ftp, FTP_AUTOSEEK, TRUE);
$ret = ftp_nb_put($ftp, $dest_file, $source_file, FTP_BINARY, FTP_AUTORESUME);

while (FTP_MOREDATA == $ret)
    {
        // display progress bar, or something
        $ret = ftp_nb_continue($ftp);
    }
 
// all done :-)
?>