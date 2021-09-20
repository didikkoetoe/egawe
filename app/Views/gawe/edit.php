<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Update Gawe &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('gawe'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Gawe</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Gawe / Acara</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('gawe/' . $gawe->id_gawe); ?>" method="POST" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="nama_gawe">Nama Gawe / Acara</label>
                        <input type="text" name="name_gawe" id="nama_gawe" class="form-control" value="<?= $gawe->name_gawe; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="date_gawe">Tanggal Gawe / Acara</label>
                        <input type="date" name="date_gawe" id="tanggal_gawe" class="form-control" value="<?= $gawe->date_gawe; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="info_gawe">Info Gawe / Acara</label>
                        <textarea name=" info_gawe" id="info_gawe" class="form-control"><?= $gawe->info_gawe; ?></textarea>
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