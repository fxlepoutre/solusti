jQuery(function($) {

  //Preloader
  var preloader = $('.preloader');
  $(window).load(function(){
    preloader.remove();
  });

  //#main-slider
  var slideHeight = $(window).height();
  $('#home-slider .item').css('height',slideHeight);

  $(window).resize(function(){'use strict',
    $('#home-slider .item').css('height',slideHeight);
  });
  
  //Scroll Menu
  $(window).on('scroll', function(){
    if( $(window).scrollTop()>slideHeight ){
      $('.main-nav').addClass('navbar-fixed-top');
    } else {
      $('.main-nav').removeClass('navbar-fixed-top');
    }
  });
  
  // Navigation Scroll
  $(window).scroll(function(event) {
    Scroll();
  });

  $('.navbar-collapse ul li a').on('click', function() {  
    $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
    return false;
  });

  // User define function
  function Scroll() {
    var contentTop    =   [];
    var contentBottom   =   [];
    var winTop    =   $(window).scrollTop();
    var rangeTop  =   200;
    $('.navbar-collapse').find('.scroll a').each(function(){
      contentTop.push( $( $(this).attr('href') ).offset().top);
      contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
    });
    $.each( contentTop, function(i){
      if ( winTop > contentTop[i] - rangeTop ){
        $('.navbar-collapse li.scroll')
        .removeClass('active')
        .eq(i).addClass('active');			
      }
    });
  }

  $('#tohash').on('click', function(){
    $('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
    return false;
  });
  
  //Initiat WOW JS
  new WOW().init();
  //smoothScroll
  smoothScroll.init();
  
  // Progress Bar
  $('#about-us').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
    if (visible) {
      $.each($('div.progress-bar'),function(){
        $(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');
      });
      $(this).unbind('inview');
    }
  });

  //Countdown
  $('#features').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
    if (visible) {
      $(this).find('.timer').each(function () {
        var $this = $(this);
        $({ Counter: 0 }).animate({ Counter: $this.text() }, {
          duration: 2000,
          easing: 'swing',
          step: function () {
            $this.text(Math.ceil(this.Counter));
          }
        });
      });
      $(this).unbind('inview');
    }
  });

  // Portfolio Single View
  $('#portfolio').on('click','.folio-read-more',function(event){
    event.preventDefault();
    var link = $(this).data('single_url');
    var full_url = '#portfolio-single-wrap',
    parts = full_url.split("#"),
    trgt = parts[1],
    target_top = $("#"+trgt).offset().top;

    $('html, body').animate({scrollTop:target_top}, 600);
    $('#portfolio-single').slideUp(500, function(){
      $(this).load(link,function(){
        $(this).slideDown(500);
      });
    });
  });

  // Close Portfolio Single View
  $('#portfolio-single-wrap').on('click', '.close-folio-item',function(event) {
    event.preventDefault();
    var full_url = '#portfolio',
    parts = full_url.split("#"),
    trgt = parts[1],
    target_offset = $("#"+trgt).offset(),
    target_top = target_offset.top;
    $('html, body').animate({scrollTop:target_top}, 600);
    $("#portfolio-single").slideUp(500);
  });

  // Contact form
  var form = $('#main-contact-form');
  form.submit(function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    var formDataArr = formData?JSON.parse('{"' + formData.replace(/&/g, '","').replace(/=/g,'":"').replace(/\+/g, ' ') + '"}',
                 function(key, value) { return key===""?value:decodeURIComponent(value) }):{};
    $.ajax({
      url: $(this).attr('action'),
      type: 'POST',
      data: formData,
      beforeSend: function(){
        form.find('.form_status_wip').fadeIn();
      },
      success: function(data, textStatus, jqXHR){
        if(data['status'] == 'OK') {
          form.find('.form_status_success').delay(400).fadeIn();
        } else {
          document.location.href = "mailto:contact@solusti.com?Subject="+formDataArr["subject"]+"&Body="+encodeURIComponent(formDataArr["message"])+"%0D%0A%0D%0A"+formDataArr["name"]+"%0D%0A"+formDataArr["email"];
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        document.location.href = "mailto:contact@solusti.com?Subject="+formDataArr["subject"]+"&Body="+encodeURIComponent(formDataArr["message"])+"%0D%0A%0D%0A"+formDataArr["name"]+"%0D%0A"+formDataArr["email"];
      },
      complete: function(jqXHR, textStatus ) {
        form.find('.form_status_wip').fadeOut();
        form.find('p').delay(5000).fadeOut();
      }
    });
  });

  //Google Map
  /* global google */
  var latitude = $('#google-map').data('latitude');
  var longitude = $('#google-map').data('longitude');
  function initialize_map() {
    var myLatLng = new google.maps.LatLng(latitude,longitude);
    var mapOptions = {
      zoom: 14,
      scrollwheel: false,
      center: myLatLng
    };
    var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
    var infowindow = new google.maps.InfoWindow({
      content: '<div class="map-content"><ul class="address">' + $('.address').html() + '</ul></div>'
    });
    var marker = new google.maps.Marker({
      map: map,
      position: myLatLng
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize_map);
  
});

