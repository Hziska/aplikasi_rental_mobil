<!-- navigasi -->
<nav class="p-3 position-sticky top-0 bg-white shadow" style="z-index:999;">
        <div class="container">
            <div class="nav d-flex justify-content-between align-items-center">

                <!-- nama company -->
                 <div class="company_name">
                    <a href="#" class="fw-bold fs-3 text-decoration-none">
                        Rental <span class="text-emerald">Mobil</span>
                    </a>
                 </div>

                 <!-- nav item -->
                    <ul class="navigasi-menu menu-hide list-unstyled  gap-2 m-0">
                        <li><a href="#" class="text-decoration-none fw-semibold fs-6">Home</a></li>
                        <li><a href="#about" class="text-decoration-none fw-semibold fs-6">About</a></li>
                        <li><a href="#mobil" class="text-decoration-none fw-semibold fs-6">Mobil</a></li>
                    </ul>

                 <!-- burger nav -->
                 <div class="burger align-content-end">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>


                  <!-- cek apakah sudah login atau belum -->
                   <?php
                   
                  if(!isset($_SESSION["login"])):
                   ?>
                  <!-- login -->
                   <a href="loginpage/login.php" class="before_login border border-2 border-primary d-block fw-semibold rounded-5 text-decoration-none ">Login</a>

                   <?php
                    else:
                   ?>

                    <!-- setelah login -->
                   <div class="after_login dropdown d-flex">
                    <button class="border-0 bg-transparent p-0 ms-1 mt-2 h-25" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <div class="box-img">
                        <img src="images/user.png" alt="">
                       </div>
                      </button>
                      <ul class="dropdown-menu mt-1 border-2">
                        <li><button class="dropdown-item fw-semibold" data-bs-toggle="modal" data-bs-target="#logoutdialog">Logout</button></li>
                      </ul>
                   </div>
                    <?php
                    endif;
                    ?>
            </div>
        </div>
     </nav>
    <!-- navigasi end -->