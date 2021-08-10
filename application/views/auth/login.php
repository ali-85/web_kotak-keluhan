<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg my-5">
                <div class="text-center">
                    <div class="p-5">
                        <?= $this->session->flashdata('message')?>
                        <h4 class="card-title">Login !</h4>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="uname" id="Uname" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="Password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>