<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Create Contact &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('contacts'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Contact</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Buat Kontak Baru</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('contacts'); ?>" method="POST" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="nama_contact">Nama Kontak *</label>
                        <input type="text" name="name_contact" id="nama_contact" class="form-control" autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="info_contact">Info contact</label>
                        <textarea name=" info_contact" id="info_contact" class="form-control"></textarea>
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