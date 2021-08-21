<div class="container div1">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đăng nhập</div>
                <div class="card-body">
                    <form method="POST" action="<?php echo BASE_URL; ?>login/authenticate">
                        <?php
                            if (isset($data['Err'])) {
                                echo  "<div class='alert alert-danger' role='alert'>".$data['Err']."</div>";
                            }
                        ?>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="emaillogin" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="login">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>