<?php
$lib = require(dirname(__DIR__) . '/config/init.php');

// sample video.
$file_name = dirname(__DIR__) . '/videos/sample.mp4';

// from POST values
$name = $_POST['name'];
$description = $_POST['description'];
if (empty($_POST['password'])) {
    $password = 'password';
} else {
    $password = $_POST['password'];
}

try {
    //  Send this to the API library.
    $uri = $lib->upload($file_name);
    // Set name, description, password, ...
    $lib->request($uri,
        array(
            'name'=>$name,
            'description'=>$description,
            'privacy' => array('view' => 'password'),
            'password' => $password, 'review_link'=>0
        ), 'PATCH');

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
    header('HTTP/1.1 500 Internal Server Error');
    // print 'Error uploading ' . $file_name . "\n";
    // print 'Server reported: ' . $e->getMessage() . "\n";
    exit();
}

echo json_encode(array(
    'uri' => $uri,
    'link' => $link,
    'password' => $password,
));