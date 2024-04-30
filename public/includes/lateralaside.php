<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="../../public/imgs/logo.JPG" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">INFO<b>APS</b></span>
</a>

<div class="sidebar ">

  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../../public/imgs/Photo.jpg" class="img-circle elevation-2" alt="Usuario">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?= $_SESSION['name']?></a>
    </div>
  </div>

  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="index.php" class="nav-link">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            INICIO
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="create_products.php" class="nav-link">
          <i class="nav-icon fas fa-hamburger"></i>
          <p>
            PRODUCTOS
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="users.php" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
          <p>
            USUARIOS
          </p>
        </a>
      </li>
    </ul>
  </nav>
</div>