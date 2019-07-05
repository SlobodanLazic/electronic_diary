SELECT students.id_student,
                                 students.first_name,
                                 students.last_name
                            FROM students 
                                JOIN users ON users.teacher_class_id = students.id_school_class WHERE users.id_user = 2;