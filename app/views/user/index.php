<?= $this->view('template/header', ['title' => $data['title'], 'sidebar' => $data['sidebar']]) ?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>User</h4>
            <a href="#" class="ml-auto btn btn-sm btn-primary btn-add" data-toggle="modal" data-target="#modal-form">
              <i class="fa fa-fw fa-plus"></i>
              Tambah User
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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['user'] as $u) : ?>
                        <tr>
                          <th scope="row"><?= array_search($u, $data['user']) + 1 ?></th>
                          <td><?= $u['name']; ?></td>
                          <td><?= $u['email']; ?></td>
                          <td><?= $u['role_id']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-success btn-edit" data-id="<?= $u['id']; ?>"><i class="fa fa-edit"></i>Edit</a>
                            <?php if ($u['role_id'] != 1) : ?>
                              <a href="#" class="btn btn-sm btn-danger" data-id="<?= $u['id']; ?>" onclick="modalConfirm(this);"><i class="fa fa-edit"></i>Hapus</a>
                            <?php endif; ?>
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
        <form action="<?= url('user/add') ?>" id="form-modal" method="POST">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nama User ...">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email ...">
          </div>
          <div class="form-group">
            <label>Role</label>
            <select class="form-control" id="role" name="role_id">
              <option disabled selected value="none">Pilih Role</option>
              <?php foreach ($data['role'] as $r) : ?>
                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password ...">
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Ulangi Password ...">
          </div>
          <input type="hidden" name="date_created" value="<?= time() ?>">
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
        <p>Apa Anda Yakin Menghapus User Ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" class="btn btn-primary" id="btnConfirm">Ya</a>
      </div>
    </div>
  </div>
</div>
<script>
  var baseUrl = `<?= url('user') ?>`;
</script>
<i id="pageUser"></i>
<?= $this->view('template/footer') ?>