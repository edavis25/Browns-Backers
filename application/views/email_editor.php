<?php include 'includes/header.php' ?>

    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron jumbotron-primary container">
                <h2>Compose an email!</h2>
            </div>
        </div>

        <div class="row">
            <div class="container">

                <?php if ($this->session->flashdata()) : ?>
                    <div class="row">
                        <div class="alert alert-dismissible alert-<?= $this->session->flashdata('type') ?> container">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>
                                <?= $this->session->flashdata('message') ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <i>Note: emails will be sent to all recipients on the mailing list (unless sending tests)</i>
                </div>
                <br>
                <div class="row">
                    <form id="email-form" method="POST" action="<?= base_url('email/send') ?>" onsubmit="return confirm('Are you ready to send the email?')">
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" class="form-control" value="<?= isset($subject) ? $subject : '' ?>"required />
                        </div>
                        <div class="form-group">
                            <label for="body">Message Body:</label>
                            <textarea id="email-body" name="body"><?= isset($body) ? $body : '' ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"> Send Email</i></button>
                        <button class="btn btn-info" id="test-button"><i class="fa fa-paper-plane" aria-hidden="true"> Send Test Emails</i></button>
                    </form>
                </div>
            </div>
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

    <!-- Custom scripts -->
    <script src="<?= base_url('js/scripts.js') ?>"></script>

    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

    <!-- Initialize settings for TinyMCE plugin -->
    <script>
        tinymce.init({
            selector: '#email-body',
            plugins: "textcolor link autolink preview lists hr image legacyoutput",
            toolbar: "styleselect | bold italic | forecolor, backcolor | alignleft aligncenter alignright alignjustify | " +
                     "numlist bullist | link image | preview",
            height: "400px"
        });
    </script>

    <!-- Send test emails -->
    <script>
        // When send tests button clicked, change form action to "send_tests" method
        $('#test-button').on('click', function() {
           var form = document.getElementById('email-form');
           form.action = "<?= base_url('email/send_tests') ?>";
           form.submit();
        });
    </script>

</body>

</html>

