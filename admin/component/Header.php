<nav class="navbar navbar-expand-lg bg-secondary-subtle">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-tabs nav-fill">
        <li class="nav-item">
          <a class="nav-link <?php echo isset($active)? $active : '' ?>" aria-current="page" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item ms-3>">
          <a class="nav-link <?php echo $active  ?>" href="index.php?type=Category">Danh mục</a>
        </li>
        <li class="nav-item ms-3>">
          <a class="nav-link <?php echo empty($active)? '' : $active ?>" href="index.php?type=Products">Hàng hóa</a>
        </li>
        <li class="nav-item ms-3>">
          <a class="nav-link <?php echo empty($active)? '' : $active ?>" href="index.php?type=Users">Khách hàng</a>
        </li>
        <li class="nav-item ms-3>">
          <a class="nav-link <?php echo empty($active)? '' : $active ?>" href="index.php?type=Comments">Bình luận</a>
        </li>
        <li class="nav-item ms-3>">
          <a class="nav-link <?php echo empty($active)? '' : $active ?>" href="index.php?type=Order">Đơn hàng</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
