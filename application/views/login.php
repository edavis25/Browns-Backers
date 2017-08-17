<?php include 'includes/header.php' ?>

    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h2>Login</h2>
            </div>
        </div>

        <div class="row">
            <?php echo validation_errors(); ?>
            <form class="form" method="POST" action="<?= base_url('auth/login') ?>">
                <div class="form-group">
                    <label>
                        Username
                    </label>
                    <input type="text" class="form-control" name="username" />
                </div>
                <div class="form-group">
                    <label>
                        Password
                    </label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-success" />
                    <input type="reset" value="Cancel" class="btn btn-danger" />
                </div>
            </form>
        </div>
    </div>

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

</body>

</html>