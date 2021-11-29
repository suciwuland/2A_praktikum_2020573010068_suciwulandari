<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:lightsteelblue;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:black">S!PBAR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <!-- Dropdown Menu Header -->
      <div class="dropdown ms-5 me-5 pe-2">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/SuciRizkia.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?= $_SESSION['username'];?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="proses/logout.php">Sign out</a></li>
      </ul>
    </div>
    <!-- Akhir Dropdown -->
    </div>
    </div>
</nav>
<!-- Akhir Header -->