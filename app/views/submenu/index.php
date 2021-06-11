<?= $this->view('template/header', ['title' => $data['title'], 'sidebar' => $data['sidebar']]) ?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Menu</h4>
            <a href="#" class="ml-auto btn btn-sm btn-primary btn-add" data-toggle="modal" data-target="#modal-form">
              <i class="fa fa-fw fa-plus"></i>
              Tambah Submenu
            </a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['submenu'] as $sm) : ?>
                        <tr>
                          <th scope="row"><?= array_search($sm, $data['submenu']) + 1 ?></th>
                          <td><?= $sm['title']; ?></td>
                          <td><?= $sm['menu']; ?></td>
                          <td><?= $sm['url']; ?></td>
                          <td><?= $sm['icon']; ?></td>
                          <td><?= $sm['is_active']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-success btn-edit" data-id="<?= $sm['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" data-id="<?= $sm['id']; ?>" onclick="modalConfirm(this);"><i class="fa fa-eraser"></i>Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header-h5">Tambah Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= url('submenu/add') ?>" id="form-modal" method="POST">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nama Submenu ...">
          </div>
          <div class="form-group">
            <label>Menu</label>
            <select class="form-control" id="menu" name="menu_id">
              <option disabled selected value="none">Pilih Menu</option>
              <?php foreach ($data['menu'] as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Url</label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Masukan Url ...">
          </div>
          <div class="form-group">
            <label>Icon</label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon Submenu ...">
          </div>
          <div class="form-group">
            <label>Aktif</label>
            <select class="form-control" id="is_active" name="is_active">
              <option disabled selected>Pilih Status Submenu</option>
              <option value="1">Aktif</option>
              <option value="0">Tidak</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-confirm" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Hapus Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <p>Apa Anda Yakin Menghapus Submenu Ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" class="btn btn-primary" id="btnConfirm">Ya</a>
      </div>
    </div>
  </div>
</div>
<script>
  var baseUrl = `<?= url('submenu') ?>`;
</script>
<i id="pageSubmenu"></i>
<?= $this->view('template/footer') ?>