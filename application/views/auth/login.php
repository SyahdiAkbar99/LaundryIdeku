<div class="container-fluid px-2 px-md-4 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-5">
                <div class="card1 pb-5">
                    <div class="row px-3">
                        <h5 class="logo">Kuy Laundry</h5>
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" id="li1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1" id="li2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" id="li3" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3" id="li4"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="4" id="li5"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item card border-0 card-0">
                                    <div class="text-center"> <img src="<?= base_url('assets/images/default.png'); ?>" class="img-fluid profile-pic"> </div>
                                    <h6 class="font-weight-bold mt-5">--- Mba Laura---</h6> <small class="mb-2">Outlet Laundry Hayam W</small>
                                    <hr width="100%">
                                    <p class="content mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="carousel-item card border-0 card-0">
                                    <div class="text-center"> <img src="<?= base_url('assets/images/default.png'); ?>" class="img-fluid profile-pic"> </div>
                                    <h6 class="font-weight-bold mt-5">--- Mba Laura---</h6> <small class="mb-2">Outlet Laundry Hayam W</small>
                                    <hr width="100%">
                                    <p class="content mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="carousel-item active card border-0 card-0">
                                    <div class="text-center"> <img src="<?= base_url('assets/images/default.png'); ?>" class="img-fluid profile-pic"> </div>
                                    <h6 class="font-weight-bold mt-5">--- Mba Laura---</h6> <small class="mb-2">Outlet Laundry Hayam W</small>
                                    <hr width="100%">
                                    <p class="content mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="carousel-item card border-0 card-0">
                                    <div class="text-center"> <img src="<?= base_url('assets/images/default.png'); ?>" class="img-fluid profile-pic"> </div>
                                    <h6 class="font-weight-bold mt-5">--- Mba Laura---</h6> <small class="mb-2">Outlet Laundry Hayam W</small>
                                    <hr width="100%">
                                    <p class="content mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                                <div class="carousel-item card border-0 card-0">
                                    <div class="text-center"> <img src="<?= base_url('assets/images/default.png'); ?>" class="img-fluid profile-pic"> </div>
                                    <h6 class="font-weight-bold mt-5">--- Mba Laura---</h6> <small class="mb-2">Outlet Laundry Hayam W</small>
                                    <hr width="100%">
                                    <p class="content mt-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod incididunt ut labore et dolore magna aliqua.<br>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3 text-center justify-content-center mb-0 social"> <span class="fa fa-facebook-square mx-2"></span> <span class="fa fa-twitter mx-2"></span> <span class="fa fa-instagram mx-2"></span> <span class="fa fa-youtube-play mx-2"></span> </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card2 card border-0 px-4 px-sm-5 py-5">
                    <small class="text-right mb-3">
                        <a href="<?= base_url('auth/registration'); ?>">
                            <u>Belum punya akun ? Daftar sini !</u>
                        </a>
                    </small>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('auth'); ?>" method="POST">
                        <h3 class="mb-1">Masuk Kuy</h3>
                        <div class="row mt-3">
                            <div class="col-md-12"> <label class="mb-0">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label>
                                <input type="email" name="email" id=email placeholder="Enter Email Address . . ." value="<?= set_value('email'); ?>">
                                <small class=" text-danger"><?= form_error('email') ?></small>
                            </div>
                        </div>
                        <div class="row px-3"> <label class="mb-0">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-login"></span>
                            <input type="password" name="password" id="password-login" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                            <small class=" text-danger"><?= form_error('password') ?></small>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info text-center mb-1 py-2"> Masuk </button>
                            </div>
                        </div>
                    </form>
                    <small class="text-right mb-3">
                        <a href="<?= base_url('auth/forgotPassword'); ?>">
                            <u>Lupa Password?</u>
                        </a>
                    </small>
                </div>

                <!-- <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="text-muted or text-center">OR</small>
                        <div class="line"></div>
                    </div> -->

                <!-- <div class="row text-center">
                        <div class="col-sm-6">
                            <p class="social-connect"><span class="fa fa-facebook-square"></span><small class="pl-3 pr-1">Sign up with facebook</small></p>
                        </div>
                        <div class="col-sm-6">
                            <p class="social-connect"><span class="fa fa-google-plus"></span><small class="pl-3 pr-1">Sign up with google+</small></p>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
</div>
</div>