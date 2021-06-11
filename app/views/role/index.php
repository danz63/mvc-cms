<?= $this->view('template/header', ['title' => $data['title'], 'sidebar' => $data['sidebar']]) ?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Role</h4>
            <a href="#" class="ml-auto btn btn-sm btn-primary btn-add" data-toggle="modal" data-target="#modal-form">
              <i class="fa fa-fw fa-plus"></i>
              Tambah Role
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
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['role'] as $r) : ?>
                        <tr>
                          <th scope="row"><?= array_search($r, $data['role']) + 1 ?></th>
                          <td><?= $r['role']; ?></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-success btn-edit" data-id="<?= $r['id']; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
                            <a href="#" class="btn btn-sm btn-info btn-access" data-id="<?= $r['id']; ?>"><i class="fa fa-fw fa-tasks"></i>Access</a>
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
        <h5 class="modal-title" id="header-h5">Tambah Role</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="<?= url('role/add') ?>" id="form-modal" method="POST">
          <div class="form-group">
            <label>Role</label>
            <input type="text" class="form-control" name="role" id="role" placeholder="Nama User ...">
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-access" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="header-h5">Tambah Role</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="<?= url('role/addrole') ?>" method="POST">
          <div class="form-group">
            <label class="d-block">Menu</label>
            <?php foreach ($data['menu'] as $m) : ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="menu[]" value="<?= $m['id']; ?>" id="menu<?= $m['id']; ?>">
                <label class="form-check-label" for="menu<?= $m['id']; ?>">
                  <?= $m['menu']; ?>
                </label>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="form-group">
            <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  var baseUrl = `<?= url('role') ?>`;
</script>
<i id="pageRole"></i>
<?= $this->view('template/footer') ?>