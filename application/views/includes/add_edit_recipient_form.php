<form method="POST" action="<?= base_url('recipient/add_or_update') ?>">
    <div class="form-group col-sm-6">
        <label for="first-name">First Name:</label>
        <input type="text" id="first-name" name="first_name" class="form-control" value="<?= isset($recipient) ? $recipient->getFirstName() : '' ?>" required />
    </div>
    <div class="form-group col-sm-6">
        <label for="last-name">Last Name:</label>
        <input type="text" id="last-name" name="last_name" class="form-control" value="<?= isset($recipient) ? $recipient->getLastName() : '' ?>" required />
    </div>
    <div class="form-group col-sm-12">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" class="form-control" value="<?= isset($recipient) ? $recipient->getEmail() : '' ?>" required />
    </div>
    <div class="form-group col-sm-12">
        <input type="hidden" id="recipient-id" name="id" value="<?= isset($recipient) ? $recipient->getId() : '' ?>" />
        <input type="submit" id="submit" class="btn btn-success" value="Submit" />
        <input type="reset" id="reset" class="btn btn-warning" value="Cancel" />
    </div>
</form>