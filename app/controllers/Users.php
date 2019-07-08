<?php
class Users extends Controller
{
    public function __construct()
    {

        $this->userModel = $this->model('User');

        $this->studentModel = $this->model('Student');

        $this->classModel = $this->model('School_class');

        $this->User_Student = $this->model('User_Student');

        $this->gradeModel = $this->model('Grade');

        $this->subjectModel = $this->model('Subject');
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
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'id_school_class' => trim($_POST['id_school_class']),
                'teacher_class_id' => (int) trim($_POST['teacher_class_id']),

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => '',
                'id_teacher_class_err' => ''

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
            if ($data['user_role'] == 4) {
                // Validate first name
                if (empty($data['first_name'])) {

                    $data['first_name_err'] = 'Please enter Student first name';
                }

                // Validate last name
                if (empty($data['last_name'])) {
                    $data['last_name_err'] = 'Please enter Student last name';
                }

                // Validate class 

                if (empty($data['id_school_class'])) {
                    $data['id_school_class_err'] = 'Please select Student class';
                }
            }

            // if user role is teacher

            if ($data['user_role'] == 3) {
                // Validate teacher class
                if (empty($data['teacher_class_id'])) {

                    $data['id_teacher_class_err'] = 'Please select Teacher Class';
                }
            }


            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['id_school_class_err']) && empty($data['id_teacher_class_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Add User
                if ($this->userModel->insert($data)) {

                    // Add Student

                    if (!empty($data['first_name'] && !empty($data['last_name']) && !empty($data['id_school_class']))) {

                        if ($this->studentModel->insertStudent($data)) {

                            if ($this->User_Student->insertInUserStudentTable()) {

                                flash('student_message', 'Student Added');
                                redirect('/students');
                            }
                        } else {
                            die('Something went wrong');
                        }
                    }


                    flash('register_success', 'You have added a user');
                    redirect('/users/insert');
                } else {
                    die('Something went wrong');
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
                'teacher_class_id' => '',

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'user_role_err' => '',
                'first_name_err' => '',
                'last_name_err' => '',
                'id_school_class_err' => '',
                'id_teacher_class_err' => ''
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

    public function edit($id)
    {
        $user = $this->userModel->getUserById($id);

        $data = [
            'user' => $user
        ];

        $this->view("users/edit", $data);
    }

    public function update()
    {
        //die("It is in here");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'id_user_role' => trim($_POST['id_user_role']),
                'id_user' => trim($_POST['id_user']),

                'username_err' => '',
                'email_err' => '',
                'id_user_role_err' => '',
            ];

            // Validate Name
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate User Role
            if (empty($data['id_user_role'])) {
                $data['id_user_role_err'] = 'Please select user role';
            } else {
                /* this 2nd condition checks out that value sent from dropdown menu(users/insert.php) matches
                id_user_roles in values database
             */
                if (is_numeric($data['id_user_role']) && in_array($data['id_user_role'], range(1, 4, 1), true)) {
                    $data['id_user_role_err'] = 'User role does not exist';
                }
            }

            // Make sure there are no errors
            if (empty($data['username_err']) && empty($data['email_err'])) {
                // Validation passed
                //Execute
                if ($this->userModel->updateUser($data)) {
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

                'username' => '',
                'email' => '',
                'id_user' => '',
                'id_user_role' => '',
                'username_err' => '',
                'email_err' => '',
                'id_user_role_err' => '',
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
                    if (isset($_SESSION['id_user_role']) && $this->isLoggedIn()) {
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
                        redirect('users/login');
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
        $_SESSION['teacher_class_id'] = $user->teacher_class_id;
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
            if ($_SESSION['id_user_role'] == 1) {
                $this->view('admin/index');
            } else {
                $this->logout();
            }
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
        if (isset($_SESSION['id_user'])) {
            return true;
        } else {
            return false;
        }
    }

    /* TEACHER PART */

    public function teacher()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $this->view('teacher/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }
    /* this method is enabling teacher/t_student/index page to show all students 
    from teacher's grade by using method contained in Student model*/
    public function t_students()
    {
        $students = $this->studentModel->showStudentsToTeacher();

        $data = [

            'students' => $students

        ];

        $this->view('teacher/t_students/index', $data);
    }
    public function grades()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $this->view('teacher/grades/index');
            } else {
                $this->logout();
            }
        } else {
            $this->view('users/login');
        }
    }
    public function insertg($id)
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 3) {
                $grades = $this->gradeModel->showallgrades();
                $grade = $this->gradeModel->getGradeIdbyStudent($id);
                $subjects = $this->subjectModel->showAllSubjects();
                $allsubjects = $this->gradeModel->showgrade($id);
                $students = $this->studentModel->getStudentById($id);
                $data = [
                    'allsubjects' => $allsubjects,
                    'grades' => $grades,
                    'grade' => $grade,
                    'subjects' => $subjects,
                    'student' => $students,
                ];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                    $data2 = [
                        'grades' => $_POST['grades'],
                        'grade_status' => $_POST['grade_status'],
                        'school_class_id' => $_POST['school_class_id'],
                        'id_subject' => $_POST['id_subject'],
                        'id_student' => $_POST['id_student'],
                    ];
                    if (isset($_POST['submit'])) {
                        if ($this->gradeModel->insertGrade($data2)) {
                            flash('grades_message', 'grade added');
                        } else {
                            die('problemmmm');
                        }
                    }
                }

                $this->view('teacher/grades/insertg', $data);
            } else {
                $this->logout();
            }
        } else {
            $this->view('users/login');
        }
    }
    /* TEACHER PART END */

    public function index()
    {
        if ($this->isLoggedIn()) {
            if ($_SESSION['id_user_role'] == 1) {
                $this->view('users/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }


    /* PARENT PART */
    public function parent()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 4) {
                $this->view('parent/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }

    /* DIRECTOR PART */

    public function director()
    {
        if (isset($_SESSION['id_user'])) {
            if ($_SESSION['id_user_role'] == 2) {
                $this->view('director/index');
            } else {
                $this->logout();
            }
        } else {
            redirect('users/login');
        }
    }

    public function class_statistic()
    {
        $this->view('director/statistic/class_statistic');
    }

    public function school_statistic()
    {
        $this->view('director/statistic/school_statistic');
    }

    /* DIRECTOR PART END */

    /* ASSIGN USER */

    public function assign()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [

                'first_name_a' => trim($_POST['first_name_a']),
                'last_name_a' => trim($_POST['last_name_a']),
                'id_school_class_a' => trim($_POST['id_school_class_a']),
                'email_p' => trim($_POST['email_p']),

                'first_name_a_err' => '',
                'last_name_a_err' => '',
                'id_school_class_a_err' => '',
                'email_p_err' => ''

            ];


            // Validate first name
            if (empty($data['first_name_a'])) {
                $data['first_name_a_err'] = 'Please enter first name';
            }

            // Validate last first name
            if (empty($data['last_name_a'])) {
                $data['last_name_a_err'] = 'Please last enter name';
            }

            // Validate email 

            if (empty($data['email_p'])) {
                $data['email_p_err'] = 'Please enter parent email';
            }

            // Validate class 

            if (empty($data['id_school_class_a'])) {
                $data['id_school_class_a_err'] = 'Please select Student class';
            }


            // Make sure there are no errors
            if (empty($data['first_name_a_err']) && empty($data['last_name_a_err']) && empty($data['id_school_class_a_err']) && empty($data['email_p_err'])) {
                // Validation passed
                //Execute
                if ($this->studentModel->assignStudent($data) && $this->studentModel->assignStudent2($data)) {
                    // Redirect to login
                    flash('assign_message', 'Student Assigned to parent');
                    redirect('/students');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $classes = $this->classModel->showAllClasses();

                $data['classes'] = $classes;

                $this->view('admin/students/assign_student', $data);
            }
        } else {
            $data = [

                'first_name_a' => '',
                'last_name_a' => '',
                'id_school_class_a' => '',
                'email_p' => '',

                'first_name_a_err' => '',
                'last_name_a_err' => '',
                'id_school_class_a_err' => '',
                'email_p_err' => ''

            ];

            $classes = $this->classModel->showAllClasses();

            $data['classes'] = $classes;

            $this->view('admin/students/assign_student', $data);
        }
    }
}
