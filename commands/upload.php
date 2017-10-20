<?php
$lib = require(dirname(__DIR__) . '/config/init.php');


$file_name = dirname(__DIR__) . '/videos/sample.mp4';
$password  = '1234abcd';



try {
    //  Send this to the API library.
    $uri = $lib->upload($file_name);
    $lib->request($uri,
        array('name'=>'サンプルビデオ', 'description'=>"サンプルビデオ\n\nhttps://github.com/ryowo/vimeo-sample", 'privacy' => array('view' => 'password'), 'password' => $password, 'review_link'=>0),
    'PATCH');

    //  Now that we know where it is in the API, let's get the info about it so we can find the link.
    $video_data = $lib->request($uri);

    //  Pull the link out of successful data responses.
    $link = '';
    if($video_data['status'] == 200) {
        $link = $video_data['body']['link'];
    }
}
catch (VimeoUploadException $e) {
    //  We may have had an error.  We can't resolve it here necessarily, so report it to the user.
    print 'Error uploading ' . $file_name . "\n";
    print 'Server reported: ' . $e->getMessage() . "\n";
    exit();
}



?>
<html><body>
<ul>
    <li>URI: <?php echo $uri; ?></li>
    <li>LINK: <?php echo $link; ?></li>
    <li>PASS: <?php echo $password; ?></li>
</ul>
</body></html>