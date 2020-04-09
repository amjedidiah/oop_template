<?php
$header_list = ["home", "about", "opportunities", "reviews", "contact"];
$header_list_items = "";
$link = $_SERVER['REQUEST_URI'];

foreach ($header_list as $key => $value) {

  $active =  strpos($link, $value) !== false ? "active" : "";
  $value = $value === "reviews" ? "#reviews" : $value;
  $text = str_replace("#", "", $value);
  $value = str_replace("home", "", $value);

  $header_list_items .= '<li class="nav-item ' . $active . '">
                            <a class="nav-link" href="./' . $value . '">' . $text . '</a>
                        </li>';
}

?>
<!-- ?Header -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="header">
    <div class="container d-flex">
        <button class="navbar-toggler py-2 px-3" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-stream"></i>
        </button>

        <a class="navbar-brand  flex-grow-1" href="./">
            <img src="./img/logo.png" width="150" alt="" />
        </a>

        <div class="collapse navbar-collapse px-3 " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-capitalize">
                <?php echo $header_list_items; ?>
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li> -->

                <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Dashboard</a>
                <a class="dropdown-item" href="#">Personal Details</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Referrals</a>
              </div>
            </li> -->

            </ul>
            <?php include isset($_SESSION['id']) ? "./views/header_user.view.php" : "./views/header_auth.view.php"; ?>

        </div>

        <!-- <button class="btn btn-white ml-3 d-lg-none">
          <i class="fas fa-play" aria-hidden="true"></i>
        </button> -->
    </div>
</nav>