<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                                </div>
                                <?= $this->session->flashdata("message");
                                ?>
                                <form class="user" method="post" action="<?= base_url('Auth/login'); ?>">
                                    <div class="form-group">
                                        <input type="text" required class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" required class="form-control form-control-user" id="password" placeholder="Password" name="password">
                                    </div>
                                    <Button type="submit" class="btn btn-success btn-user btn-block">
                                        Login
                                    </Button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/register'); ?>">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>