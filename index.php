<!DOCTYPE html>

<html ng-app="myApp">
    <head>
        <title>Jonathan Chue</title>
        <meta name="description" content="Consultant, front-end web developer, amateur photographer.">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed|Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <?php
            // create a new cURL resource
            $ch = curl_init();

            // set URL and other appropriate options
            curl_setopt( $ch, CURLOPT_URL, "https://www.jonathanchue.com/photos.json" );
            // Will return the response, if false it print the response
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt( $ch, CURLOPT_HEADER, 0 );

            // grab URL and pass it to the browser
            $result = curl_exec( $ch );

            // close cURL resource, and free up system resources
            curl_close( $ch );

            $bg = json_decode( $result, true );
            $n = rand( 1, 19 );
            $n--;


        echo '<style>
            html {
                background-attachment: fixed;
                background-image: url(images/' . $bg[$n]["file"] . '.jpg);
                background-repeat: no-repeat;
                background-size: cover !important;
            }
        </style>';

         ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script src="http://angular-ui.github.io/ui-router/release/angular-ui-router.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.js"></script>
        <script src="js/script.js"></script>

    </head>
    <body>
        <script>
            ( function( i, s, o, g, r, a ,m ) { i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function() {
                ( i[r].q = i[r].q || [] ).push( arguments )}, i[r].l = 1 * new Date(); a = s.createElement( o ),
                m = s.getElementsByTagName( o )[0]; a.async = 1; a.src = g; m.parentNode.insertBefore( a, m )
            })( window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga' );

            ga( 'create', 'UA-34369086-2', 'auto' );
            ga( 'send', 'pageview' );
        </script>

        <?php
            if ( ! empty( $bg[$n]["title"] ) && ! empty( $bg[$n]["url"] )) {
                echo '<div class="caption"><a href="' . $bg[$n]["url"] . '" target="_blank" class="full-link"></a>' . $bg[$n]["title"] . '</div>';
            } else if ( ! empty( $bg[$n]["title"] )) {
                echo '<div class="caption">' . $bg[$n]["title"] . '</div>';
            }
        ?>

        <div class="main">
            <div class="container" ng-controller="myController">
                <h1><a href="https://www.jonathanchue.com">Jonathan Chue</a></h1>

                <ul class="roles">
                    <li>Consultant at Accenture</li>
                    <li>Front-end Web Developer</li>
                    <li>Amateur Photographer</li>
                </ul>

                <div class="hr"></div>

                <ul class="links">
                    <li><a href="http://www.aptribute.com" target="_blank"><i class="fa fa-laptop"></i><span>Web Dev Portfolio</span></a></li>
                    <li><a href="https://www.flickr.com/photos/96956660@N06/" target="_blank"><i class="fa fa-flickr"></i><span>Flickr</span></a></li>
                    <li><a href="https://www.instagram.com/jonathanchue/" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
                    <li><a href="https://www.linkedin.com/in/jonathan-chue-2b83b233" target="_blank"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
                    <li><a href="https://twitter.com/jonathanchue" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                    <li><a href="https://500px.com/jonathanchue" target="_blank"><i class="fa fa-500px"></i><span>500px</span></a></li>
                </ul>

                <a href="https://shop.jonathanchue.com" target="_blank" class="button wide-button">Photo Prints</a>

                <ui-view></ui-view>
            </div>
        </div>

        <footer class="site-footer">
            Copyright &copy; <?php echo date("Y"); ?> Jonathan Chue
        </footer>


    </body>
</html>
