<html>
    <head>
        <title><?php echo $title; ?></title>
        <!--<link rel="stylesheet" href="https://unpkg.com/picnic">-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <?php echo link_tag('css/bootstrap.min.css')?>
        <?php echo link_tag('css/gre.css')?>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.gre.js"></script>
        <style>
            body {
                opacity: 1;
                transition: 0.9s opacity;
            }

            body.fade {
                opacity: 0;
                transition: none;
            }

            #demo{
                margin-botton: 50px;
            }
            #container{
                margin-left:auto;
                margin-right:auto;
                margin-top:40px;
                width: 80%;
            }
            .form{
                margin-left:auto;
            }
            #progress{
                background-color: #ddd;
            }
            #score{
                width: 0%;
                height: 30px;
                background-color: #4CAF50;
                text-align: center;
                line-height: 30px;
                color: white;
            }
            .alert {
                opacity: 1;
                transition: 0.8s opacity;
            }
            .login-page {
                margin-left:auto;
                margin-right:auto;
                width:40%;
            }
            #container {
                opacity: 1;
                transition: 0.8s opacity;
            }
            .table td {
                padding:1.2rem;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                z-index: 1;
            }

            .dropdown:hover .dropdown-content {
                display: block;
            }

            h2, .h2 {
                font-size: 1rem;
            }

            body {
                -webkit-animation: fadein 1s; /* Safari, Chrome and Opera > 12.1 */
                -moz-animation: fadein 1s; /* Firefox < 16 */
                -ms-animation: fadein 1s; /* Internet Explorer */
                -o-animation: fadein 1s; /* Opera < 12.1 */
                animation: fadein 1s;
            }

            @keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Firefox < 16 */
            @-moz-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Safari, Chrome and Opera > 12.1 */
            @-webkit-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Internet Explorer */
            @-ms-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Opera < 12.1 */
            @-o-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }
        </style>
        <script>
            function render(val) {
                var elem = document.getElementById("score");   
                var width = 0;
                var id = setInterval(frame, 0);
                function frame() {
                    if (width >= val) {
                        clearInterval(id);
                        console.log("ano");
                    } else {
                        width++; 
                        elem.style.width = width + '%';
                        console.log("ne");
                    }
                }
                console.log("spustil se");
            }
        </script>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo site_url('home'); ?>">App</a>
    <?php if(isset($this->session->id)): ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown show">
                    <a class="dropdown nav-link dropdown-toggle" data-toggle="dropdown" href="<?php echo site_url('film/index'); ?>" role="button">Films</a>
                    <div class="dropdown-menu dropdown-content" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">                        
                        <a class="dropdown-item" href="<?php echo site_url('film/getWishes'); ?>">My wishlist</a>
                        <a class="dropdown-item" href="<?php echo site_url('film/create'); ?>">Add film</a>                        
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('todo/index'); ?>">Todos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('recipt/index'); ?>">Recipts</a>
                </li>
            </ul>
            <div class=" my-2 my-lg-0">
                <a class="nav-link" href="<?php echo site_url('user/logout'); ?>">Logout</a>
            </div>
        </div>
        <?php endif; ?>
    </nav>
    <div id="container">
    
        

    