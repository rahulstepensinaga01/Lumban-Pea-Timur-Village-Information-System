<?php foreach ($editsubmenu as $sm) : ?>
<?php endforeach; ?>
<form method="post" action="<?= base_url('Menu/updatesubmenu/') ?>">
    <div class="modal-body">
        <input type="text" class="form-control" id="id_submenu" name="id_submenu" value="<?= $sm['id_submenu'] ?>" hidden>
        <div class="form-group">
            <label>subMenu</label>
            <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?= $sm['nama_menu'] ?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Pilih Menu</label>
            <select name="id_menu" id="id_menu" class="form-control form-group">
                <option>
                    Pilih Menu...
                </option>
                <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Url</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
        </div>
        <div class="form-group">
            <label>Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                <label class="form-check-label" for="is_active">
                    Active?
                </label>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <a href="<?= base_url('Menu/submenu'); ?>"><button type="button" class="btn btn-secondary">Tutup</button></a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>