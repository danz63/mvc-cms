<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">MVC | CMS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">M|c</a>
        </div>
        <ul class="sidebar-menu">
            <?php foreach ($data as $s) : ?>
                <li class="menu-header"><?= $s['menu']; ?></li>
                <?php foreach ($s['submenu'] as $sm) : ?>
                    <li class="nav-item">
                        <a href="<?= url($sm['url']) ?>" class="nav-link">
                            <i class="<?= $sm['icon'] ?>"></i>
                            <span><?= $sm['title'] ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endforeach; ?>
            <li class="nav-item">
                <a href="<?= url('auth/logout') ?>" class="nav-link">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>