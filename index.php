<?php
require 'assets/instagram-php/instagram.class.php';
require ('assets/codebird-php-master/src/codebird.php');

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/framework.css">
        <style>
            body {
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/app.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">#WEAREONE</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div id="main" class="container">
            <div class="row">
                <h1>#WEAREONE</h1>
                <?php


                Codebird::setConsumerKey('UqHEhnzpLXRneKlsddsaQ', 'gQBX2J5HNmtjLSqtn9pHYTyNzpPO3j92uJGOw006qs'); // static, see 'Using multiple Codebird instances'
                $cb = Codebird::getInstance();
                $tweet_query = $cb->search_tweets('q=weareone&count=100', true);



                $images = array();
                foreach($tweet_query->statuses as $tweet) {
                    if(!$tweet->entities->media) continue;
                    foreach($tweet->entities->media as $image){
                        $images[] = $image->media_url;
                    }
                }



                // Initialize class for public requests
                $instagram = new Instagram('f49e775f45b54397a446253dd3756e6a');

                // Get from tag
                $popular = $instagram->getTagMedia('esc2013');




                $patterns = array(
                    array(
                        "sizes" => array("tile double", "tile", "tile", "tile", "tile"),
                        "message" => '<article class="message"><h2>Currently</h2></article>'
                    ),
                    array(
                        "sizes" => array("tile double right", "tile medium", "tile medium", "tile right", "tile rigt"),
                        "message" => '<article class="message"><h2>Currently</h2></article>'
                    ),
                    array(
                        "sizes" => array("tile double right", "tile medium", "tile medium", "tile right", "tile rigt"),
                        "message" => '<article class="message"><h2>Currently</h2></article>'
                    ),
                );


                ?>
            </div>
            <!-- Example row of columns -->
            <div class="row tile-row">

                <?php

                // Display results
                //$images = array();
                foreach ($popular->data as $data) {
                    $images[] = $data->images->standard_resolution->url;
                }

                $i = 0;
                foreach($patterns as $pattern){
                    foreach($pattern['sizes'] as $size) {
                        $img = $images[$i];
                        echo '<div class="'. $size . '"><img src="' . $img . '"></div>';
                        $i++;
                    }
                    echo $pattern['message'];
                }
                ?>

            </div>

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'http://ssl':'http://www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
