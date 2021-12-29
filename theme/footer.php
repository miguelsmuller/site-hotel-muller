        <div id="wrap-content"></div>
    </div>

    <div id="footer-page">
        <div class="container">
            <div class="col-md-3">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-hotel-footer.png">
            </div>
            <div class="col-md-3">
                <div class="footer-endereco">
                    <ul>
                        <li>Rua Prefeito Mozart Cesar Valle, 271</li>
                        <li>Centro - Rio Claro - Rio de Janeiro</li>
                        <li>CEP: 27460-000</li>
                    </ul>
                    <ul>
                        <li>Email: contato@hotelmuller.com.br</li>
                        <li>Telefone: (24) 3332-1173<br>Celular: (24) 98152-7864</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-menu">
                    <?php
                    $menuOptions = array(
                        'theme_location'    => 'menu-rodape',
                        'container'         => false
                    );
                    wp_nav_menu($menuOptions);
                    ?>

                </div>
            </div>
            <div class="col-md-2">
                <a href="http://www.devim.com.br" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/assets/images/logo-devim.png" class="pull-right"></a>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');

	fbq('init', '863561743755563');
	fbq('track', "PageView");</script>
	<noscript>
	<img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=863561743755563&ev=PageView&noscript=1"
	/>
	</noscript>
	<!-- End Facebook Pixel Code -->

	<?php if ( empty(get_option('disableChatWidget')) ) : ?>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5752033aa17a859d168b989c/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
	<?php endif; ?>

</body>
</html>
