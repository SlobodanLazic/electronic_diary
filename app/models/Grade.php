<?php
class Grade
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function insertGrade($data2)
    {
        $this->db->query('INSERT INTO students_subjects (grades, grade_status, school_class_id, id_student, id_subject) VALUES (:grades, :grade_status, :school_class_id, :id_student, :id_subject)');

        $this->db->bind(':grades', $data2['grades']);
        $this->db->bind(':grade_status', $data2['grade_status']);
        $this->db->bind(':school_class_id', $data2['school_class_id']);
        $this->db->bind(':id_student', $data2['id_student']);
        $this->db->bind(':id_subject', $data2['id_subject']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showallSubjects()
    {
        $this->db->query('SELECT id_subject, name FROM subjects');

        $subjects = $this->db->resultSet();

        return $subjects;
    }
    public function editGrade()
    {
        $this->db->query('UPDATE students_subjects SET grades = :grades, grade_status = :grade_status');
    }
    public function getSubjectId($id)
    {

        // removed *

        $this->db->query('SELECT subjects.id_subject, subjects.name FROM subjects WHERE id_subject = :id_subject');

        $this->db->bind(':id_subject', $id);

        $row = $this->db->single();

        return $row;
    }

    // modified added id_student_subject 
    // Showing all grades for specific student

    public function showgrade($id)
    {
        $this->db->query('SELECT students_subjects.id_student_subject, students_subjects.grades, subjects.name, students_subjects.id_student, students_subjects.grade_status FROM students_subjects JOIN subjects ON subjects.id_subject = students_subjects.id_subject WHERE students_subjects.id_student = :id_student');

        $this->db->bind(':id_student', $id);
        $row = $this->db->resultSet();

        return $row;
    }

    // Showing grades by students_subjects id
    // This is used for displaying grade in edit form

    public function showGradeByIdStudentSubject($id)
    {

        $this->db->query('SELECT students_subjects.grades FROM students_subjects WHERE students_subjects.id_student_subject = :id_student_subject');

        $this->db->bind(':id_student_subject', $id);

        $row = $this->db->single();

        return $row;
    }

    // update grade 
    // updates specific student grade

    public function updateGrade($data)
    {

        $this->db->query('UPDATE students_subjects SET grades = :grade WHERE id_student_subject = :id_student_subject');

        $this->db->bind(':grade', $data['grade']);
        $this->db->bind(':id_student_subject', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function showallgrades()
    {
        $this->db->query('SELECT grades, grade_status, school_class_id, id_student, id_subject FROM students_subjects');

        $grades = $this->db->resultSet();

        return $grades;
    }
    public function getGradeIdbyStudent($id)
    {
        $this->db->query('SELECT id_student FROM students_subjects WHERE id_student = :id_student');

        $this->db->bind(':id_student', $id);

        $row = $this->db->single();
        return $row;
    }

    public function deleteSubject($id)
    {
        $this->db->query('DELETE FROM subjects WHERE id_subject = :id_subject');
        $this->db->bind(':id_subject', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function update($data)
    {
        $this->db->query('UPDATE subjects SET name = :name WHERE id_subject = :id_subject');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id_subject', $data['id_subject']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
