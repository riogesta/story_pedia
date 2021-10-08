<header class="p-3 mb-3 border-bottom bg-white fixed-top">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <i class="bi bi-journal-text is"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <!-- <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li> -->
                <li><a href="#" class="nav-link px-2 link-dark">Bacaan</a></li>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://img.i-scmp.com/cdn-cgi/image/fit=contain,width=425,format=auto/sites/default/files/styles/768x768/public/d8/images/canvas/2021/09/06/5bc22ec2-5e3b-406d-96b5-6716fb086feb_76b69227.jpg?itok=6GneRujl&v=1630918168"
                        alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-macos text-small"
                    aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="<?= base_url('ceritaku') ?>">Ceritaku</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="<?= base_url('signout');?>">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>