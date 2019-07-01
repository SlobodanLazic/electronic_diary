<?php
    class User  
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        // Insert User
        public function insert($data)
        {
            $this->db->query('INSERT INTO users(username, password, email, id_user_role) VALUES (:name, :password, :email, :id_user_role)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':id_user_role', $data['user_role']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
            
        }

        // Login User
        public function login($email,$password)
        {
            $this->db->query('SELECT u.id_user,
                            u.username,
                            u.password,
                            u.email,
                            u.id_user_role 
                            FROM users AS u 
                            WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            }else {
                return false;
            }
        }

        // Find user by email
        public function findUserByEmail($email)
        {
            $this->db->query('SELECT u.id_user,
                              u.username,
                              u.password,
                              u.email,
                              u.id_user_role 
                              FROM users AS u
                              WHERE email = :email');
            // Bind value
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // Check row
            if ($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        // Get User by ID
        public function getUserById($id)
        {
            $this->db->query('SELECT u.id_user,
                              u.username,
                              u.password,
                              u.email,
                              u.id_user_role
                              FROM users AS u
                              WHERE id_user = :id');
            // Bind value
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        // Edit(update) user
        public function updateUser($data)
        {var_dump($data);
            $this->db->query('UPDATE users 
                              SET   username = :username, 
                                    email = :email, 
                                    id_user_role = :id_user_role
                              WHERE id_user = :id'
                            );
                            
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':id_user_role', $data['id_user_role']);
            $this->db->bind(':id', $data['id_user']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Delete user
        public function deleteUser($id)
        {
            $this->db->query('DELETE FROM users WHERE id_user = :id_user');

            $this->db->bind(':id_user', $id);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Retrieve all user roles from database
        public function GetAllUserRoles()
        {
            $this->db->query('SELECT ur.id_user_role,
                              ur.name,
                              ur.description 
                              FROM user_roles AS ur');

            $allUserRoles = $this->db->resultSet();
            
            return $allUserRoles;
        }

        // Retrieve all users from database and their user roles
        public function GetUsersByRoles($id_user_role)
        {
            $this->db->query('  SELECT u.id_user,
                                u.username,
                                u.email,
                                ur.id_user_role,
                                ur.name
                                FROM users AS u 
                                    JOIN user_roles AS ur ON u.id_user_role = ur.id_user_role
                                WHERE ur.id_user_role = :id_user_role
                                ORDER BY ur.name;
                            ');
                        $this->db->bind(':id_user_role', $id_user_role);
                        
            $allUsers = $this->db->resultSet();

            return $allUsers;
        }

    }
    
?>