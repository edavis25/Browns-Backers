<?php include 'includes/header.php' ?>
    
    <div class="container-fluid">
        <div class="jumbotron jumbotron-primary container">
            <h2>Admin</h2>
        </div>

        <?php if ($this->session->flashdata()) : ?>
            <div class="alert alert-dismissible alert-<?= $this->session->flashdata('type') ?> container">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>
                    <?= $this->session->flashdata('message') ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <a href="<?= base_url('email') ?>" class="btn btn-success btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Send an Email</a>
            </div>
            <br>
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add New Recipient</h3>
                    </div>
                    <div class="panel-body">
                        <?php include 'includes/add_edit_recipient_form.php' ?>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="panel panel-danger" id="recipients-table">
                    <div class="panel-heading">
                        <h3 class="panel-title">Manage Recipients</h3>
                    </div>
                    <div class="panel-body">
                        <?= $paginationLinks ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-font-small">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($recipients as $recipient) : ?>
                                        <tr>
                                            <td><?= $recipient->getFirstName() ?></td>
                                            <td><?= $recipient->getLastName() ?></td>
                                            <td><?= $recipient->getEmail() ?></td>
                                            <td>
                                                <form class="inline edit-recipient" method="GET" action="<?= base_url('recipient/edit') ?>">
                                                    <input type="hidden" name="recipient-id" value="<?= $recipient->getId() ?>" />
                                                    <input type="submit" class="btn btn-warning btn-smallest" value="Edit" data-toggle="modal" data-target="#edit-recipient" />
                                                </form>

                                                <div class="delete-wrapper">
                                                    <button class="btn btn-danger delete-button btn-smallest">Delete</button>
                                                    <div class="confirm-delete" style="display: none;">
                                                        <form action="<?= base_url('recipient/delete') ?>" method="POST" class="inline">
                                                            <input type="submit" class="btn delete-button" value="yes" />
                                                            <input type="hidden" name='delete-id' value="<?= $recipient->getId() ?>" />
                                                        </form>
                                                        /<a href="##" class="delete-button btn">no</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> <!-- /Recipients table -->
                        <?= $paginationLinks ?>
                    </div> <!-- /Panel body -->
                </div> <!-- /Panel -->
            </div>
        </div>
    </div>

    <!-- Edit Recipient Modal -->
    <div id="edit-recipient" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div id="edit-recipient-modal-content"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

</body>

</html>