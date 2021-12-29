<?php global $ClassMaintenance; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hotel Müller - Manutenção</title>

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon-72.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/assets/images/icons/favicon-57.png">

    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
    <?php do_action('after_body'); ?>

    <div id="wrap" class="minimized">

        <div class="message-maintenance">
            <div class="container">
                <header>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-hotel.png" class="img-responsive">
                </header>
                <div class="col-sm-12 col-md-7 col-md-offset-1">
                    <header class="box-title">
                        <h1>Estamos realizando uma manutenção em nosso site.</h1>
                        <span></span>
                    </header>
                    Esse procedimento não costuma demorar e você pode tentar novamente em alguns minutos. Agradecemos a visita e pedimos desculpas pelo transtorno.

                    <form class="form-horizontal" action="http://hotelmuller.us3.list-manage.com/subscribe/post?u=a745e941b173736dce8a82e90&amp;id=96bf4ca379" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" role="form" target="_blank" >

                        <div id="mce-responses" class="form-group">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="Entre com seu endereço de email">
                                <span class="input-group-btn">
                                    <input type="submit" value="Assinar Newslleter" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default">
                                </span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-sm-12 col-md-3 col-md-offset-1">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icon-maintenance.png" class="icon-maintenance">
                </div>
            </div>
        </div>


        <div id="wrap-content"></div>
    </div>

    <div id="footer-page" class="minimized">
        <div class="container">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-hotel-footer.png">
            <a href="http://www.devim.com.br" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-devim.png" class="pull-right"></a>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>