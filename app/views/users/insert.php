    <div class="row">
       <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Insert User</h2>
                <p>Please fill out this form to insert user</p>
                <form action="<?php echo URLROOT; ?>/users/admin/insert" method="post">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg <?php echo(!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name'];?>">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo(!empty($data['email_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['email'];?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo(!empty($data['password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['password'];?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo(!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['confirm_password'];?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="user_role">User Role <sup>*</sup></label>
                        <select name="user_role" id="">
                            <option>-----------------------</option>
                            <?php foreach(Users::GetUserRoles() as $name=>$value) : ?>
                                <option value='.<?php echo $name; ?>.'><?php print($value); ?></option>
                            <?php endforeach ; ?>
                            
                        </select>
                        <?php 
                                /*$users = new Users();
                                
                                $roles =  $users->GetUserRoles();
                                //(array) $userArray;
                                print($roles[0]->name);
                                foreach ($roles as $key => $value) {
                                    print($roles[$key]->name);
                                }*/
                                
                            ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
       </div> 
    </div>
