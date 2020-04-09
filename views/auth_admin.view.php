<nav class="navbar navbar-expand-md fixed-top py-3 m-0 border-0 sub-header" id="header">
    <div class="container">
        <a class="navbar-brand flex-grow-1" href="./">
            <img src="./img/logo.png" class="d-md-none" width="150" alt="" />
            <img src="./img/logo_white.png" class="d-none d-md-block" width="150" alt="" />
        </a>
    </div>
</nav>

<div class="container-fluid h-100">
    <div class="row h-100 text-center">
        <div class="col-12 col-md-4 position-fixed d-none d-md-block h-100 bg-success" id="leftScreen">
            <div class="row h-100 align-items-center" id="leftScreenRow">
                <div class="col p-5 text-white">
                    <h2>Welcome Back!</h2>
                    <p class="my-4">
                        Login as admin
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md offset-md-4 h-100 bg-white" id="rightScreen">
            <div class="row h-100 align-items-center justify-content-around">
                <div class="col col-md-10 col-lg-8 p-5" id="headerDet">
                    <h2 class="mt-5 mb-4">Welcome Back</h2>
                    <form class="form text-left" method="post" action="admin/login.action.php" direction="./admin">
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="loginID">ID</label>
                                    <input type="text" id="loginID" class="form-control" placeholder="ID" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="loginPass">Password</label>
                                    <input type="password" id="loginPass" class="form-control" placeholder="Password" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-error"></div>
                        <button type="submit" class="btn btn-md-lg mt-3 px-5 py-2 border border-white text-white rounded-pill btn-success text-uppercase">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>