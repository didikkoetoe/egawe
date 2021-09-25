<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Update Group &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-button">
            <a href="<?= site_url('groups'); ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Group</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Group</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="<?= site_url('groups/update/' . $group->id_group); ?>" method="POST" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="name_group">Nama Gawe / Acara</label>
                        <input type="text" name="name_group" id="name_group" class="form-control" value="<?= $group->name_group; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="info_group">Info Group</label>
                        <textarea name="info_group" id="info_group" class="form-control"><?= $group->info_group; ?></textarea>
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