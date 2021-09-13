<?= $this->extend('layout/default'); ?>
<?= $this->section('title'); ?>
<title>Gawe/Acara &mdash; yukNikah</title>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Gawe / Acara</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data Gawe / Acara</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Nama Gawe</th>
                                <th>Tanggal Gawe</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($gawe as $g => $value): ?>
                            <tr>
                                <td>
                                    <?= $g + 1; ?>
                                </td>
                                <td>
                                    <?= $value->name_gawe; ?>
                                </td>
                                <td>
                                    <?= $value->date_gawe; ?>
                                </td>
                                <td>
                                    <?= $value->info_gawe; ?>
                                </td>
                                <td class="text-center" style="width: 15%;">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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