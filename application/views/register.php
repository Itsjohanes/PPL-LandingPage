<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 margin mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?= $this->session->flashdata("message");
                        ?>
                        <form class="user" method="post" action="<?= base_url('Auth/registration') ?>">

                            <div class=" form-group">
                                <input type="text" required class="form-control form-control-user" id="email" placeholder="Email Address" name="email">
                            </div>
                            <div class=" form-group">
                                <input type="text" required class="form-control form-control-user" id="nama" placeholder="Nama" name="nama">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" required class="form-control form-control-user" id="password1" placeholder="Password" name="password1">

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" required class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                            </div>
                            <Button type="submit" class="btn btn-success btn-user btn-block">
                                Register Account
                            </Button>

                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>