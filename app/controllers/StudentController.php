<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed!');

class StudentController extends Controller
{
    public function index()
    {
        $student = [
            'student_id' => 'MCC2024-00247',
            'name' => 'Reign M. Manalo',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => '3-F5',
            'email' => 'reignmanalo03@gmail.com'
        ];
        $this->call->view('student_home', $student);
    }

    public function profile()
    {
        $student = [
            'student_id' => 'MCC2024-00247',
            'name' => 'Reign M. Manalo',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => '3-F5',
            'email' => 'reignmanalo03@gmail.com',
            'address' => 'Sta. Rita, Calapan City',
            'contact' => '09817237315',
            'hobbies' => 'Painting, Drawing'
        ];
        $this->call->view('student_profile', $student);
    }
}

?>