<?= $this->view('template/header', ['title' => $data['title'], 'sidebar' => $data['sidebar']]) ?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Dashboard</h4>
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae nulla ipsam repudiandae recusandae nisi error eligendi, quam, vero enim eaque iure neque. Iusto expedita placeat voluptatem harum vero ullam modi.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique tempora quis quod possimus error voluptas nesciunt cum! Corrupti numquam autem dolorum, voluptatem repellendus, assumenda iure nemo repudiandae, mollitia pariatur quaerat.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, non distinctio? Quibusdam quos libero animi omnis adipisci maxime illum pariatur, ea sit recusandae laboriosam repellat, quas, reprehenderit iure debitis earum.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->view('template/footer') ?>