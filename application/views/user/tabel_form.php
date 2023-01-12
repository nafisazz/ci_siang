<table class="table table-bordered table-striped">
    <thead>
        <tr>

            <th>Tanggal</th>
            <th>Kegiatan</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <?php foreach ($kegiatan as $k) : ?>
        <?php $no = 1; ?>

        <tr>


            <td><?= $k->tanggal; ?></td>
            <td><?= $k->isi_kegiatan ?></td>
            <td>
                <a href="<?php echo base_url('kegiatan/updateKegiatan/' . $k->id) ?>" class="btn btn-icon btn-2 btn-warning btn-edit" role="button">
                    <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                </a>

                <a href="<?php echo base_url('kegiatan/deletekegiatan/' . $k->id) ?>" class="btn btn-icon btn-2 btn-danger btn-delete" role="button">
                    <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                </a>

            </td>

        </tr>

    <?php endforeach; ?>

</table>