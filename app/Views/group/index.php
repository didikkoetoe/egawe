<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Data Groups &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Groups</h1>
        <div class="section-header-button">
            <a href="<?= site_url('groups/new'); ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <!-- Alert -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
    <?php endif ?>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Group Kontak</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama Groups</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($groups as $group => $value) : ?>
                                <tr>
                                    <td>
                                        <?= $group + 1; ?>
                                    </td>
                                    <td>
                                        <?= $value->name_group; ?>
                                    </td>
                                    <td>
                                        <?= $value->info_group; ?>
                                    </td>
                                    <td class="text-center" style="width: 15%;">
                                        <a href="<?= site_url('groups/edit/' . $value->id_group); ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="<?= site_url('groups/delete/' . $value->id_group); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ?')" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>