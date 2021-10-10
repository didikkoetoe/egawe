<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Update Contact &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('contacts'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Contact</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Contact</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('contacts/update/'); ?>" method="POST" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="name_contact">Nama Gawe / Acara</label>
                        <input type="text" name="name_contact" id="name_contact" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="info_contact">Info contact</label>
                        <textarea name="info_contact" id="info_contact" class="form-control"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>