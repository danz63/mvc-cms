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
              Tambah Menu
            </a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['menu'] as $m) : ?>
                        <tr>
                          <th scope="row"><?= array_search($m, $data['menu']) + 1 ?></th>
                          <td><?= $m['menu']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-success btn-edit" data-id="<?= $m['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" data-id="<?= $m['id']; ?>" onclick="modalConfirm(this);"><i class="fa fa-edit"></i>Hapus</a>
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
        <h5 class="modal-title" id="header-h5">Tambah Menu</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="<?= url('menu/add') ?>" id="form-modal" method="POST">
          <div class="form-group">
            <label>Menu</label>
            <input type="text" class="form-control" name="menu" id="menu" placeholder="Nama Menu ...">
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
        <h5 class="modal-title">Konfirmasi Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <p>Apa Anda Yakin Menghapus Menu Ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" class="btn btn-primary" id="btnConfirm">Ya</a>
      </div>
    </div>
  </div>
</div>
<script>
  var baseUrl = `<?= url('menu') ?>`;
</script>
<i id="pageMenu"></i>
<?= $this->view('template/footer') ?>