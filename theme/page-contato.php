<?php
/*
Template Name: Página Contato
*/
?>

<?php get_header(); ?>

<main class="container" role="main">
    <section id="row-full">

        <article id="col-left">

            <section id="row-maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.078515451394!2d-44.13337885269538!3d-22.72532288944793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1bc3693a838a2137!2sHotel+M%C3%BCller!5e0!3m2!1spt-BR!2s!4v1394558288922" width="100%" height="200" frameborder="0" style="border:0" scrolling="no"></iframe>
            </section>

            <?php while ( have_posts() ) : the_post(); ?>

                <header class="title-simple">
                    <h1><?php the_title(); ?></h1>
                    <span></span>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <div class="row">
                    <div class="col-md-7">

                    	<?php
                    	$contactForm = get_field('contact_form');
                    	if ($contactForm) {
                    		echo do_shortcode( '[contact-form-7 id="'. $contactForm .'" html_id="form-contato" html_class="form form-validate"]' );
                    	}
                    	?>

                    </div>
                    <div class="col-md-5">
                        <header class="title-simple">
                            <h3>Informações Úteis</h3>
                            <span></span>
                        </header>
                        <ul class="list-contact">
                            <li>Rua Prefeito Mozart Cesar Valle, 271<br>
                            Centro - Rio Claro - RJ<br>
                            CEP: 27460-000</li>

                            <li>Telefone: (24) 3332-1173<br>
                            Celular: (24) 98152-7864</li>

                            <li>E-Mail: contato@hotelmuller.com.br</li>
                        </ul>
                    </div>
                </div>

            <?php endwhile; ?>
        </article>
        <aside id="col-right">
            <div class="widget-social-network">
                <div class="box-dark">
                    <header class="title-dark">
                        <h3>Redes Sociais</h3>
                    </header>
                    <div class="row-fluid">
                        <ul class="social-icons animated-list">
                            <li><a href="https://www.facebook.com/HotelMuller" target="_blank"><span class="sprites-icon-facebook"></span></a></li>
                            <li><a href="https://plus.google.com/+HotelMüllerRioClaro" rel="publisher" target="_blank"><span class="sprites-icon-google"></span></a></li>
                            <li><a href="/"><span class="sprites-icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php dynamic_sidebar('sidebar-blog'); ?>
        </aside>

    </section>
</main>

<?php get_footer(); ?>
