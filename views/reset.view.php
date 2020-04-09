<nav class="navbar navbar-expand-md fixed-top py-3 m-0 border-0 sub-header shadow-sm" id="header">
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
                    <h2>Password Reset!</h2>
                    <p class="my-4">
                        Go ahead and create a new password
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md offset-md-4 bg-white" id="rightScreen">
            <div class="row align-items-center justify-content-around py-5">
                <div class="col col-md-10 offset-md-1 p-5 my-5" id="headerDet">
                    <h2 class="mt-5 mb-4">Password Reset</h2>
                    <form class="form text-left" method="post" action="password_update.action.php" direction="">
                        <div class="form-row mb-3 justify-content-between">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text-success" for="resetEmail">Email Address</label>
                                    <input type="email" class="form-control" name="name" id="resetEmail" required readonly disabled />
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-3 justify-content-between">
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class="text-success" for="profilePass">New Password</label>
                                    <input type="password" class="form-control" name="name" id="profilePass" required />
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <div class="form-group">
                                    <label class="text-success" for="profileCPass">Confirm New Password</label>
                                    <input type="password" class="form-control" name="" id="profileCPass" aria-describedby="profileCPass" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-error"></div>

                        <button class="btn btn-success mt-3" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>