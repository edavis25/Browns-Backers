<?php include 'includes/header.php' ?>

    <h1>Compose an email!</h1>

    <form method="POST" action="<?= base_url('email/save')  ?>">
        <textarea id="mytextarea" name="tinymce">Hello, World!</textarea>

        <input type="submit" />
    </form>



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

    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: "textcolor link autolink preview lists hr image  m  m",
            toolbar: "styleselect | bold italic | forecolor, backcolor | alignleft aligncenter alignright alignjustify | " +
                     "numlist bullist | link image | preview"
        });
    </script>


</body>

</html>

