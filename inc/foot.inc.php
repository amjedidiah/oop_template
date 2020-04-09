<!-- ?Footer -->
<footer class="bg-light py-4">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-md-4 mb-3 mb-lg-0 pt-5">
                <h4 class="text-uppercase">Company</h4>
                <div><a href="./about">About Us</a></div>
                <div><a href="./contact">Contact</a></div>
            </div>
            <div class="col-12 col-md-4 mb-3 mb-lg-0 pt-5">
                <h4 class="text-uppercase">Opportunities</h4>
                <div><a href="./opportunities?category=agriculture">Agriculture</a></div>
                <div><a href="./opportunities?category=real_estate">Real Estate</a></div>
                <div><a href="./opportunities?category=transportation">Transportation</a></div>
                <hr />
                <div><a href="./opportunities?duration=short">Short-term</a></div>
                <div><a href="./opportunities?duration=long">Long-term</a></div>
            </div>
            <div class="col-12 col-md-4 text-white pt-5 px-3 px-sm-0">
                <div class=" bg-success shadow p-4 rounded">
                    <?php
                    if (isset($_SESSION['id'])) {
                        $title = "Welcome Back";
                        $text = "Check on your investment opportunities";
                        $direction = "Dashboard";
                        $link = "user";
                    } else {
                        $title = "Get Started";
                        $text = "Register to get started on WeekVest";
                        $direction = "Register";
                        $link = "auth";
                    }
                    ?>
                    <h4 class=""><?php echo $title; ?></h4>
                    <p><?php echo $text; ?></p>
                    <a href="./<?php echo $link; ?>" class="btn btn-white">
                        <i class="fas fa-user mr-2"></i> <?php echo $direction; ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex pt-5 px-2 px-sm-0">
            <div>
                <a class="navbar-brand  flex-grow-1" href="./">
                    <img src="./img/logo.png" width="150" alt="" />
                </a>
            </div>
            <div class="flex-grow-1 text-right pt-4">
                &copy; Copyright 2019. WeekVest
            </div>
        </div>
    </div>
</footer>