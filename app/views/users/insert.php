    <div class="row">
       <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Insert User</h2>
                <p>Please fill out this form to insert user</p>
                <form action="<?php echo URLROOT; ?>/users/insert" method="post">
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
                        <select name="user_role" id="user_role_dropdown_menu" class="form-control form-control-lg <?php echo(!empty($data['user_role_err'])) ? 'is-invalid' : '' ?>">
                            <option value='' selected>.....Select a role.....</option>
                            <?php 
                                $users= new Users();
                                foreach($users->GetUserRoles() as $id_user_role=>$name) : 
                            ?>
                                <option value='<?php echo $id_user_role; ?>'><?php print($name); ?></option>
                            <?php endforeach ; ?>
                        </select>
                        <span class="invalid-feedback"><?php echo $data['user_role_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Insert" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
       </div> 
    </div>
