    <footer id='contact'>
        <div class='container'>
            <div class='row' id='footer-content'>
                <div class='container col-sm-6'>
                    <h3 class='orange'>Info &amp; Contact</h3>
                    <p>
                        <b>Brewery District Browns Backers</b><br><br>
                        Officially Licensed Members of the <a href='http://fans.clevelandbrowns.com/' class='orange'>Browns Backers Worldwide</a><br>
                        Chapter #194<br>
                        President: Brian "Mez" Miecznikowski<br>
                        <a href='mailto:brian@brownsbackerscolumbus.com' class='orange'>brian@brownsbackerscolumbus.com</a>
                    </p>
                </div>
                <div class='container col-sm-6'>
                    <h3 class='orange'>Meeting Place</h3>
                    <p>
                        Every game, all season long<br><br>
                        <b><a href='http://jimmyvspub.com' class='orange'>Jimmy V's Grill &amp; Pub</a></b><br>
                        912 S. High St. Columbus, OH 43206<br>
                        <a href='tel:16144459090' class='orange'>(614)445-9090</a>
                    </p>
                </div>
            </div>
            <div class='row'>
                <div class='container'>
                    <p class='small'>
                        All team logos and photographs are  property of the NFL and the Cleveland Browns
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?= base_url('vendor/scrollreveal/scrollreveal.min.js') ?>"></script>
    <script src="<?= base_url('vendor/magnific-popup/jquery.magnific-popup.min.js') ?>"></script>

    <!-- Theme JavaScript -->
    <script src="<?= base_url('js/creative.min.js') ?>"></script>

    <!-- Custom scripts -->
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>


    <!-- Temporary notice overlay & associated JavaScript -->
    <div id="overlay-container" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
            <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  Notice</h1>
            <p>
                Due to a recent issue with club registration, all existing members will need to re-register on the <a href='http://fans.clevelandbrowns.com/backer-tracker/clubs/brewery-district-' class='orange'>Cleveland Browns Website.</a>
                <br><br>
                If you have any questions or experience any issues during the registration process, please contact club president Brian "Mez"<br>
                <a href='mailto:brian@brownsbackerscolumbus.com' class='orange'>brian@brownsbackerscolumbus.com</a>
            </p>
            <h3><a href="javascript:void(0)" onclick="closeNav()">[Close this window]</a></h3>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("overlay-container").style.height = "100%";
        }
        function closeNav() {
            document.getElementById("overlay-container").style.height = "0%";
        }
        
        $(document).ready(function() {
            openNav();
        });
    </script>

</body>

</html>