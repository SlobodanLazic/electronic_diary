<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row justify-content-center">
       <div class="col-xl-6 col-lg-6 con-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="row">
                    <div class="col">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 mb-4">
                                <?php flash('register_success'); ?>
                                    Login Page
                                </h1>
                            </div>
                        
                

                <form class="user" action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user <?php echo(!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email'];?>" placeholder="Email">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user <?php echo(!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password'];?>" placeholder="Password">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                        </div>
                    </div>
                </form>
                </div>
                    </div>
                </div>
            </div>
       </div> 
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>