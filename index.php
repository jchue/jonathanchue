<!DOCTYPE html>

<html>
    <head>
        <title>Jonathan Chue</title>
        <meta name="description" content="Consultant, front-end web developer, amateur photographer.">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed|Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <?php
        $bg = '';
        $n = rand( 1, 6 );
        switch( $n ) {
            case 1:
                $bg = 'DSC_0082-0084_pano';
                break;
            case 2:
                $bg = 'DSC_0085';
                break;
            case 3:
                $bg = 'DSC_0092-0093_pano';
                break;
            case 4:
                $bg = 'DSC_0093';
                break;
            case 5:
                $bg = 'DSC_0101';
                break;
            case 6:
                $bg = 'DSC_0244';
                break;
        }

        echo '<style>
            html {
                background-attachment: fixed;
                background-image: url(images/' . $bg . '.jpg);
                background-repeat: no-repeat;
                background-size: cover !important;
            }
        </style>';
        ?>

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

        <div class="container">
            <h1>Jonathan Chue</h1>

            <ul class="roles">
                <li>Senior Analyst at Accenture</li>
                <li>Front-end Web Developer</li>
                <li>Amateur Photographer</li>
            </ul>

            <div class="hr"></div>

            <ul class="links">
                <li><a href="http://www.aptribute.com" target="_blank"><i class="fa fa-laptop"></i><span>Web Dev Portfolio</span></a></li>
                <li><a href="http://www.jonathanchue.com/blog/" target="_blank"><i class="fa fa-wordpress"></i><span>Blog</span></a></li>
                <li><a href="https://www.flickr.com/photos/96956660@N06/" target="_blank"><i class="fa fa-flickr"></i><span>Flickr</span></a></li>
                <li><a href="https://www.instagram.com/jonathanchue/" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
                <li><a href="https://www.linkedin.com/in/jonathan-chue-2b83b233" target="_blank"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a></li>
                <li><a href="https://twitter.com/jonathanchue" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
                <li><a href="https://500px.com/jonathanchue" target="_blank"><i class="fa fa-500px"></i><span>500px</span></a></li>
            </ul>
        </div>

        <footer class="site-footer">
            Copyright &copy; 2016 Jonathan Chue
        </footer>
    </body>
</html>
