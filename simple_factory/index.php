<?php

require 'facebook.php';

$fb =  new Facebook();

$post = $fb->createPost();
$post->setAuthor("Asafe");
$post->setMessage("Test Author Message");

echo "Author".$post->getAuthor();
echo "Message".$post->getMessage();