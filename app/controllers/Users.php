<?php
class Users extends Controller
{
    public function __construct()
    {

        $this->userModel = $this->model('User');

        $this->studentModel = $this->model('Student');

        $this->classModel = $this->model('School_class');

        $this->User_Student = $this->model('User_Student');
    }



    public function insert()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form 
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name' => htmlspecialchars(trim($_POST['name'])),
                'email' => htmlspecialchars(trim($_POST['email'])),
                'password' => htmlspecialchars(trim($_POST['password'])),
                'confirm_password' => htmlspecialchars(trim($_POST['confirm_password'])),
                'user_role' => htmlspecialchars(trim($_POST['user_role'])),
                'first_name' => trim($_POST['name']),
                'last_name' => trim($_POST['last_name']),
                'id_school_class' => trim($_POST['id_school_class']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => ''
            ];
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters.';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Validate User Role
            if (empty($data['user_role'])) {
                $data['user_role_err'] = 'Please select user role';
            } else {
                /* this 2nd condition checks out that value sent from dropdown menu(users/insert.php) matches
                    id_user_roles in values database
                 */
                if (is_numeric($data['user_role']) && in_array($data['user_role'], range(1, 4, 1), true)) {
                    $data['user_role_err'] = 'User role does not exist';
                }
            }

            // If user role is parent
            if ($data['user_role'] === 4) {
                // Validate first name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter first name';
                }

                // Validate last name
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter last name';
                }

                // Validate class 

                if (empty($data['id_school_class'])) {
                    $data['id_school_class_err'] = 'Please select class';
                }
            }


            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['name_err']) && empty($data['last_name_err']) && empty($data['id_school_class_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Add User
                if ($this->userModel->insert($data)) {
                    flash('register_success', 'You have added a user');
                    redirect('/users/insert');
                } else {
                    die('Something went wrong');
                }


                if (!empty($data['name'] && !empty($data['last_name']) && !empty($data['id_school_class']))) {
                    if ($this->studentModel->insertStudent($data)) {

                        if ($this->User_Student->insertInUserStudentTable()) {

                            flash('student_message', 'Student Added');
                            redirect('/students');
                        }
                    } else {
                        die('Something went wrong');
                    }
                }
            } else {
                // Load view with errors
                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;

                $this->view('users/insert', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'user_role' => '',
                'first_name' => '',
                'last_name' => '',
                'id_school_class' => '',

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => ''
            ];

            $classes = $this->classModel->showAllClasses();

            $data['classes'] = $classes;

            // Load view
            $this->view('users/insert', $data);
        }
    }

    public function delete()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["id_user"])) {

            $id = $_POST['id_user'];

            if ($this->userModel->deleteUser($id)) {

                flash('user_deleted_msg', 'User Deleted');
                $this->view('users/delete');
            } else {

                die('Something went wrong');
            }
        } else {
            $this->view('users/delete');
        }
    }

    public function update($id = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'user_role' => trim($_POST['user_role']),

                'name_err' => '',
                'email_err' => '',
                'user_role_err' => '',
            ];

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate User Role
            if (empty($data['user_role'])) {
                $data['user_role_err'] = 'Please select user role';
            } else {
                /* this 2nd condition checks out that value sent from dropdown menu(users/insert.php) matches
                id_user_roles in values database
             */
                if (is_numeric($data['user_role']) && in_array($data['user_role'], range(1, 4, 1), true)) {
                    $data['user_role_err'] = 'User role does not exist';
                }
            }

            // Make sure there are no errors
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['id_school_class_err'])) {
                // Validation passed
                //Execute
                if ($this->userModel->update($data)) {
                    // Redirect to login
                    flash('user_updated', 'User Updated');
                    redirect('users');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors

                $this->view('users/update', $data);
            }
        } else {
            $data = [

                'name' => '',
                'email' => '',
                'user_role' => '',
                'name_err' => '',
                'email_err' => '',
                'user_role_err' => '',
            ];

            $this->view('users/update', $data);
        }
    }
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [

                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }


            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);

                    /* id_user_role 1 is administrator,id_user role 2 is director,id_user_role 3 is teacher,
                        id_user_role 4 is parent so it will redirect it to proper page dependent of role */

                    switch ($_SESSION['id_user_role']) {
                        case 1:
                            redirect('users/admin');
                            break;
                        case 2:
                            redirect('users/director');
                            break;
                        case 3:
                            redirect('users/teacher');
                            break;
                        case 4:
                            redirect('users/parent');
                            break;
                        default:
                            redirect('users/login');
                            break;
                    }
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [

                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['id_user_role'] = $user->id_user_role;
    }

    public function logout()
    {
        unset($_SESSION['id_user']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['id_user_role']);
        session_destroy();
        redirect('users/login');
    }

    public function admin()
    {
        if (isset($_SESSION['id_user'])) {
            $this->view('admin/index');
        } else {
            redirect('users/login');
        }
    }

    public function GetUserRoles()
    {
        $roles = $this->userModel->GetAllUserRoles();

        foreach ($roles as $key => $value) {
            $user_roles[$roles[$key]->id_user_role] = $roles[$key]->name;
        }

        return $user_roles;
    }

    /*  this function gets all data for user including username, email and user role from 
        User model sorted by role or empty array if user role is not selected
    */
    public function GetUsersByUserRole($id_user_role)
    {
        if ($id_user_role !== '') {
            $usersFromModel = $this->userModel->GetUsersByRoles($id_user_role);

            foreach ($usersFromModel as $key => $value) {
                $users[$key] = $value;
            }

            return $users;
        } else {
            return [];
        }
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
                        
    
    
    
    
    
    
                /* TEACHER PART */

    public function teacher() {
        $this->view('teacher/index');
        
    }
    public function classes(){
        $this->view('teacher/classes/index');
    }
                /* TEACHER PART END */







    public function index()
    {
        $this->view('users/index');
    }
}
