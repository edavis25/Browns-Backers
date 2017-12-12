<?php include 'includes/header.php' ?>

<!-- Background image -->
<div id="bg-image"><img src='img/crowell-2500.jpg' class='img img-responsive' /></div>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color: #eb3300; font-size: 1.2em">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <img id='nav-img' src='img/dog-transp.png' class='img img-responsive hidden-xs' />
            <h3 id='nav-text'>BREWERY DISTRICT<br><span id='nav-text-strong'>BROWNS BACKERS</span></h3>
            <!--a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!--a class="page-scroll" href="#about">About</a-->
                </li>
                <li>
                    <a class="page-scroll" href="#events">Events</a>
                </li>
                <li>
                    <a class="page-scroll" href="#club-info-anchor-link">Club Info</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <!--div class="header-content">
        <div class="header-content-inner">
            <h1 id="homeHeading">Your Favorite Source of Free Bootstrap Themes</h1>
            <hr>
            <p>Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
        </div>
    </div-->
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">
                    Join us every Sunday at <b><a href='http://jimmyvspub.com'>Jimmy V's Grill &amp; Pub</a></b> in German Village!
                </h2>
                Door Prizes &bull; 50/50 Raffles &bull; Food &amp; Drink Specials
            </div>
        </div>
    </div>
</section>

<section id="events">
    <div class="container">
        <div class="row">
            <img src="<?= base_url('img/browns-week14promo.jpg') ?>" class="img 
img-responsive center-block" alt="Upcoming Event" style="max-height: 500px; margin-bottom: 70px;" />
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading"><b>Upcoming Events</b></h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class='container'>
            <h3 class='orange'><b>Sunday December 31st:</b></h3>
                <p>
                    <b>Cleveland Browns vs. Pittsburgh Steelers Pool</b><br>
                    The Brewery District Browns Backers will be holding a <em>$2000 total payout</em> football pool for the final game of the season against the Pittsburgh Steelers! Each participant will be assigned 1 number for each team and the individual whose numbers match the last number of the score for each team following the end of each quarter will be crowned winners. The pool will also feature a reverse payout system where the participant whose numbers match the end of quarter scores for the opposite team will also win.
                </p>
                <p>
                    For example, if at the end of the 1st quarter the score is: Browns 14 and Steelers 7, the participant with 4 for the Browns and 7 for the Steelers will win the primary payout while the participant with 4 for the Steelers and 7 for the Browns will win the reverse payout.
                </p>
                <h3><b>$20 per square</b></h3>
                <p>
                    <b>Payouts:</b><br>
                    &bull; 1st Quarter: $400 primary - $100 reverse<br>
                    &bull; 2nd Quarter: $400 primary - $100 reverse<br>
                    &bull; 3rd Quarter: $400 primary - $100 reverse<br>
                    &bull; Final Score: $400 primary - $100 reverse<br>
                    <small><em>Payouts determined by scores at the end of quarters 1-3 and final score</em></small>
                </p>
               
                <p>
                <b>Payment Information:</b><br>
                    &bull; All payments must be made up front<br>
                    &bull; Square purchases made at Jimmy V's bar<br>
                    &bull; Numbers for squares will be released prior to kickoff<br>
                    &bull; For more details, contact club president <a href='mailto:brian@brownsbackerscolumbus.com' class='orange'>Brian "Mez"</a>
                </p>
            </div>
        </div>

        <div class="row">
            <img src="<?= base_url('img/browns-steelers-promo.jpg') ?>" class="img img-responsive center-block" alt="Football pool promo image" style="max-height: 600px; margin-bottom: 70px; margin-top: 25px;" />
        </div>
    </div>
</section>

<section class="no-padding" id="portfolio">
    <div class="">
        <div class='row-fluid' id='taylor-img'>
            <span id='club-info-anchor-link'></span>
            <img src='img/taylor2.jpeg' class='img img-responsive' id='img-tay' />
        </div>  
    </div>
</section>

<section id='club-info'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-4 center-block'>
                <i class="fa fa-info-circle fa-5x orange" aria-hidden="true"></i>
                <h3 class='orange'>About Our Chapter</h3>
                <p>
                    For nearly 10 years, our chapter has been supporting the Cleveland Browns as the only official Brewery District backers.
                    <br>
                    <b class='align-left'>President: Brian "Mez"</b>
                </p>
            </div>
            <div class='col-lg-4'>
                <i class="fa fa-user-plus fa-5x orange" aria-hidden="true"></i>
                <h3 class='orange'>Join Our Ranks</h3>
                <p>
                    Anyone interested in joining should visit our chapter's profile at the <a href='http://fans.clevelandbrowns.com/backer-tracker/clubs/brewery-district-' class='orange'>Cleveland Browns website</a> to register as an official member.
                </p>
            </div>
            <div class='col-lg-4'>
                <i class="fa fa-map-marker fa-5x orange" aria-hidden="true"></i>
                <h3 class='orange'>Where We Meet</h3>
                <p>
                    We meet every Sunday at <a href='http://jimmyvspub.com' class='orange'>Jimmy V's Grill &amp; Pub</a> in German Village (912 S. High St.). Join us for
                    weekly door prizes, raffles, and food + drink specials before and during each game!
                </p>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div>
        <img src="<?= base_url('img/schedule.png') ?>" class="img img-responsive center-block" id='schedule' />
    </div>
</section>

<?php include 'includes/footer.php' ?>
