<?php
require 'assets/instagram-php/instagram.class.php';
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

        <nav id="menu" class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">#WEAREONE</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li><a href="#">Tävlingsregler</a></li>
                            <li><a href="#about">svt.se/eurovision</a></li>
                            <li><a href="#contact">Svt.se</a></li>
                        </ul>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </nav>

        <div id="main" class="container">
            <div class="row">
                <?php

                $images = array();
                // Initialize class for public requests
                $instagram = new Instagram('f49e775f45b54397a446253dd3756e6a');

                // Get from tag
                $popular = $instagram->getTagMedia('swedish');



                $patterns = array(
                    array(
                        "sizes" => array(
                            "span4",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2"
                        ),
                        "message" => "Test"
                    ),

                    array(
                        "sizes" => array(
                            array(
                                "span2",
                                "span2",
                                "span2",
                                "span2"
                            ),
                            "span4",
                            "span2 right",
                            "span2 right"
                        ),
                        "message" => ""
                    ),

                    array(
                        "sizes" => array(
                            "span4 right",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2"
                        )
                    ),

                    array(
                        "sizes" => array(
                            "span4",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2",
                            "span2"
                        )
                    )
                );


                ?>
            </div>
            <!-- Example row of columns -->
            <div id="feed" class="row fluid tile-row">
                <div id="message">
                    <h1>WE<br />ARE<br />ONE</h1>
                    <p>
                        Vinn biljetter<br />till semifinalerna<br />och finalen!
                    </p>
                    <p>
                        Dela din<br />fjärilsbild<br />på Instagram,<br />använd<br />#WEAREONE2013
                    </p>
                    <p>
                        <a href="#" alt="" title="">Så här fungerar det</a>
                    </p>
                </div>
                <?php

                    // Display results
                    //$images = array();
                    foreach ($popular->data as $data) {
                        $images[] = $data->images->standard_resolution->url;
                    }
                    foreach ($popular->data as $data) {
                        $images[] = $data->images->standard_resolution->url;
                    }


                    $i = 0;
                    foreach($patterns as $pattern){
                        echo '<div class="span2 empty"></div>';
                        foreach($pattern['sizes'] as $size) {
                                if(is_array($size)) {
                                    echo '<div class="span4 grid"><div class="row">';
                                    foreach($size as $span2) {
                                        $img = $images[$i];
                                        echo '<div class="'. $span2 . '"><img src="' . $img . '"></div>';
                                        $i++;
                                    }
                                    echo "</div></div>";
                                } else {
                                    $img = $images[$i];
                                    echo '<div class="'. $size . '"><img src="' . $img . '"></div>';
                                    $i++;
                                }
                        }
                    }
                ?>

            </div>

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->


        <img src="images/head.png" id="head" class="hidden-phone" alt="">

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
