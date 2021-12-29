<footer>
  <div class="container">
    <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-rodape',
        'container'      => true,
      ));
    ?>
    <p>Todos os direitos reservados. Proibida a reprodução sem prévia autorização.</p>
    <small>Um site desenvolvido por <strong><a href="http://www.devim.com.br" target="_blank">DEVIM</a></strong></small>
  </div>
</footer>

<button class="btn btn-primary-v2 btn-float" data-toggle="modal" data-target="#modalReservation"><i class="far fa-calendar-plus"></i></button>

<div class="modal fade" id="modalReservation" tabindex="-1" role="dialog" aria-labelledby="modalReservation" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Verificar Disponibilidade</h5>
      </div>

      <div class="modal-body">
        <?php
        $reservationForm = get_field('reserva_formulario');

        if (is_object($reservationForm) && property_exists($reservationForm, 'ID')) {
          echo do_shortcode( '[contact-form-7 id="'. $reservationForm->ID .'" html_id="form-reserva" html_class="form form-validate"]' );
        }
        ?>
      </div>

    </div>
  </div>
</div>