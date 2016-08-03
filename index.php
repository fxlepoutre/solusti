<?php require 'localization.php' ; ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= _('Solusti | Your partner to successful WMS') ?></title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/solusti-colors.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/slider-bg.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><?= _('JDA / RedPrairie WMS solutions for your') ?> <span><?= _('warehouse') ?></span></h1>
            <p class="animated fadeInRightBig"><?= _('Need training, customized reports, troubleshooting or integration?') ?></p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#contact"><?= _('Contact us now') ?></a>
          </div>
        </div>
      </div>
      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>
    </div><!--/#home-slider-->

    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">
            <h1><img class="img-responsive" src="images/logo2_sm.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home"><?= _('Home') ?></a></li>
            <li class="scroll"><a href="#services"><?= _('Services') ?></a></li>
            <li class="scroll"><a href="#contact"><?= _('Contact') ?></a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="150ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2><?= _('Our Services') ?></h2>
            <p><?= _('Here\'s what we offer. Contact us for more details.') ?></p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="150ms">
            <div class="service-icon one">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <div class="service-info">
              <h3><?= _('Trainings') ?></h3>
              <p><?= _('Go through a discovery session of JDA and/or train functional and technical teams on how to use and configure JDA.') ?></p>
              <p><a data-scroll class="btn" href="#contact"><?= _('Schedule your training now!') ?></a></p>
            </div>
          </div>
          <div class="col-sm-3 wow fadeInDown" data-wow-duration="500ms" data-wow-delay="250ms">
            <div class="service-icon two">
              <i class="fa fa-line-chart"></i>
            </div>
            <div class="service-info">
              <h3><?= _('Reports') ?></h3>
              <p><?= _('Develop and customize business reports: create documents for daily usage or extract data for business analysis.') ?></p>
              <p><a data-scroll class="btn" href="#contact"><?= _('Get your reports now!') ?></a></p>
            </div>
          </div>
          <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="350ms">
            <div class="service-icon three">
              <i class="fa fa-search"></i>
            </div>
            <div class="service-info">
              <h3><?= _('Troubleshooting') ?></h3>
              <p><?= _('Diagnose technical and functional issues on your system and processes.') ?></p>
              <p><a data-scroll class="btn" href="#contact"><?= _('Get assistance now!') ?></a></p>
            </div>
          </div>
          <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="450ms">
            <div class="service-icon four">
              <i class="fa fa-connectdevelop"></i>
            </div>
            <div class="service-info">
              <h3><?= _('Integration') ?></h3>
              <p><?= _('Build integration with external systems, connect your ERP with the WMS (orders, shipments, inventory).') ?></p>
              <p><a data-scroll class="btn" href="#contact"><?= _('Start your integration now!') ?></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->

  <section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="48.8380243" data-longitude="2.3905071" data-wow-duration="500ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="150ms">
            <h2><?= _('Contact Us') ?></h2>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                <div class="row  wow fadeInUp" data-wow-duration="500ms" data-wow-delay="150ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="<?= _('Name') ?>" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="<?= _('Email Address') ?>" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="<?= _('Subject') ?>" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="<?= _('Enter your message') ?>" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit"><?= _('Send Now') ?></button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="500ms" data-wow-delay="150ms">
                <p></p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span>solusti</span> - 223 rue de Charenton - 75012 Paris - FRANCE</li>
                  <li><i class="fa fa-map-signs"></i> <a href='https://maps.google.com/maps?ll=48.83815,2.390798&z=16&t=m&hl=fr&gl=US&mapclient=embed&daddr=223%20Rue%20de%20Charenton%2075012%20Paris%20France@48.8381501,2.3907978'><?= _('Get directions...') ?></a> </li>
                  <li><i class="fa fa-phone"></i> <span> <?= _('Phone') ?>:</span> +33 (0)6 68 76 86 00</li>
                  <li><i class="fa fa-envelope"></i> <span> <?= _('Email') ?>:</span><a href="mailto:contact@solusti.com"> contact@solusti.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> <?= _('Website') ?>:</span> <a href="#">www.solusti.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="500ms" data-wow-delay="150ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href=""><img class="img-responsive" src="images/logo2_sm.png" alt=""></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      
    </div>
  </footer>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVl8u5JOgrFhwneD1TFmdzZizn-gmMadI"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-81709228-1', 'auto');
    ga('send', 'pageview');
  
  </script>
  
</body>
</html>