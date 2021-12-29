/*global site_parameters:false*/

$(document).ready(function() {

  /***************** LOAD MORE ******************/
  var paged = 2;
  $( '#load-more' ).click(function() {
    var template       = $(this).attr('data-template');
    var post_type      = $(this).attr('data-post-type');
    var posts_per_page = $(this).attr('data-posts-per-page');
    var data_max_page  = $(this).attr('data-max-page');

    if (paged > data_max_page){
      return false;
    }else{
      loadArticle(template, post_type, posts_per_page, paged);
    }
    paged++;
  });

  function loadArticle(template, post_type, posts_per_page, paged) {
    $( '#load-more' ).button('loading');
    $.ajax({
      url: site_parameters.site_url + '/wp-admin/admin-ajax.php',
      type:'POST',
      data: 'action=infinite_scroll&template='+ template + '&post_type='+ post_type + '&posts_per_page=' + posts_per_page +'&paged='+ paged,
      success: function(html){
        $( '#article-list').append(html);
        $( '#load-more' ).button('reset');
      }
    });
    return false;
  }


  /***************** TOOL TIP ******************/
  if ($('[data-toggle=tooltip]').length) {
    $('[data-toggle=tooltip]').tooltip({
      delay: { show: 800, hide: 0 }
    });
  }


  /***************** DATEPICKER ******************/
  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }

  if ($('.datepicker').length) {
    var dateFormat = 'dd/mm/yy',
    from = $( '.datepicker-from' )
      .datepicker({
        defaultDate: '+1w',
        changeMonth: true,
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        numberOfMonths: 1
      })
      .on( 'change', function() {
        to.datepicker( 'option', 'minDate', getDate( this ) );
      }),

    to = $( '.datepicker-to' )
      .datepicker({
        defaultDate: '+1w',
        changeMonth: true,
        minDate: 1,
        dateFormat: 'dd/mm/yy',
        numberOfMonths: 2
      })

      .on( 'change', function() {
        from.datepicker( 'option', 'maxDate', getDate( this ) );
      });
    }


  /***************** FORM VALIDATE ******************/
  if ($('.form-validate').length) {
    $('.form-validate').validationEngine('attach', {scroll: false});
  }
});
