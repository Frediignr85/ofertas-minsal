<?php
header("Access-Control-Allow-Origin: *");
$session = session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&display=swap" rel="stylesheet" />

    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />


    <!-- Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css
">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/styles.css") ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'>
    <title>PROMOCIONES - MINSAL</title>
</head>

<body>

    <!-- Header -->
    <header id="header" class="header">
        <div class="navigation">
            <div class="container">
                <nav class="nav">
                    <div class="nav__hamburger">
                        <svg>
                            <use xlink:href="<?php echo base_url("images/sprite.svg#icon-arrow-up"); ?>"></use>
                        </svg>
                    </div>

                    <div class="nav__logo">
                        <a href="/" class="scroll-link">
                            <img src="<?php echo base_url("/assets/images/header-minsal.png") ?>" alt="logo-minsal" style="width:125px;left:0;" >
                        </a>
                    </div>

                    <div class="nav__menu">
                        <div class="menu__top">
                            <span class="nav__category">SIS</span>
                            <a href="#" class="close__toggle">
                                <svg>
                                    <use xlink:href="<?php echo base_url("assets/images/sprite.svg#icon-cross"); ?>">
                                    </use>
                                </svg>
                            </a>
                        </div>
                        <ul class="nav__list">
                        <li class="nav__item">
                                <a href="<?php echo base_url("/inicio/"); ?>" class="nav__link">Promociones</a>
                            </li>
                            <li class="nav__item">
                                <a href="<?php echo base_url("/inicio/categorias"); ?>" class="nav__link ">Categorias</a>
                            </li>
                            <li class="nav__item">
                                <a href="#" class="nav__link">Establecimientos</a>
                            </li>
                            <li class="nav__item">
                                <a href="<?php echo base_url("/inicio/minsal_informa"); ?>" class="nav__link"  style="width:200%;">MINSAL informa</a>
                            </li>
                            <li class="nav__item">
                                <img src="<?php echo base_url("/assets/images/SIS.png") ?>" alt="logo-SIS" style="width:125px;margin-left: 200px;" >
                            </li>
                        </ul>
                        <ul class="">
                        </ul>
                    </div>
                    

                </nav>
            </div>
        </div>

        <!-- Hero -->
        
    </header>
    <!-- End Header -->

    <!-- Main -->
    <main id="main">
        <div class="container">
            

            <section class="category__section section" id="category">
                <div class="tab__list">
                    <div class="title__container tabs">
                        <div class="section__titles category__titles ">
                            <div class="section__title filter-btn active" data-id="All Products">
                                <span class="dot"></span>
                                <h1 class="primary__title">Establecimientos</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category__container" data-aos="fade-up" data-aos-duration="1200">
                    <div class="category__center">
                    <?php
                        echo $result;
                    ?>
                    </div>
                </div>
        
            </section>

        </div>



    </main>

    <!-- End Main -->

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer-top__box">
                    <h3>MINISTERIO DE SALUD</h3>
                    <div>
                        <span>
                            <svg>
                                <use xlink:href="<?php echo base_url("assets/images/sprite.svg#icon-location"); ?>">
                                </use>
                            </svg>
                        </span>
                        Calle Arce No.827, San Salvador
                    </div>
                    <div>
                        <span>
                            <svg>
                                <use xlink:href="<?php echo base_url("assets/images/sprite.svg#icon-paperplane"); ?>">
                                </use>
                            </svg>
                        </span>
                        El Salvador C.A.
                    </div>
                    <div>
                        <span>
                            <svg>
                                <use xlink:href="<?php echo base_url("assets/images/sprite.svg#icon-phone"); ?>"></use>
                            </svg>
                        </span>
                        PBX: +503 2591-7000
                    </div>
                </div>
                <div class="footer-top__box">
                    <img src="<?php echo base_url("/assets/images/header-minsal.png") ?>" alt="logo-minsal" style="width:300px;left:0;filter: brightness(5);" >

                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer-bottom__box">

            </div>
            <div class="footer-bottom__box">

            </div>
        </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- PopUp -->
   

    <!-- Go To -->

    <a href="#header" class="goto-top scroll-link">
        <svg>
            <use xlink:href="<?php echo base_url("assets/images/sprite.svg#icon-arrow-up"); ?>"></use>
        </svg>
    </a>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(""); ?>">

    <!-- Glide Carousel Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <!-- Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo base_url("assets/js/products.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/index.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/slider.js"); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <div class='modal fade' id='deleteModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg  modal-dialog-center'>
            <div class='modal-content modal-lg'>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





</body>

</html>