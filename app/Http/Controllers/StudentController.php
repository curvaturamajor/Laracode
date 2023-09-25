<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $order_by = $request->get('order_by', 'sid');
        $direction = $request->get('direction', 'asc'); // Varsayılan olarak 'asc'
        // 5 öğrenciyi sayfalayarak alıyoruz
        $students = Student::orderBy($order_by, $direction)->paginate(5);
    
        return view('welcome', compact('students', 'order_by', 'direction'));
    }
    
}