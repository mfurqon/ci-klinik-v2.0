<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('menu/ubahSubmenu/' . $submenu['id']); ?>
            <input type="hidden" name="id" value="<?= $submenu['id']; ?>">

            <div class="form-group row">
                <label for="judul" class="col-sm-2 col-form-label">Judul Submenu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $submenu['judul']; ?>">
                    <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                    <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label">Ikon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                    <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="menu_id" class="col-sm-2 col-form-label">Menu</label>
                <div class="col-sm-10">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Pilih Menu</option>
                        <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('menu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="is_active">Active?</label>
                <div class="col-sm-10">
                    <input class="form-check" type="checkbox" value="1" id="is_active" name="is_active" checked>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <button class="btn btn-dark" onclick="window.history.go(-1)">Kembali</button>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->