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
    
    public function addStudent(Request $request)
{
    $student = new Student;
    $student->fname = $request->input('fname');
    $student->lname = $request->input('lname');
    $student->birthplace = $request->input('birthplace');
    $student->birthDate = $request->input('birthDate');
    $student->save();

    return redirect('/')->with('success', 'Öğrenci başarıyla eklendi!');
}

public function deleteStudent($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/')->with('success', 'Öğrenci başarıyla silindi!');
}

public function editStudent($id)
{
    $student = Student::findOrFail($id);
    return view('edit-student', compact('student'));
}
public function updateStudent(Request $request, $sid) {
    $student = Student::findOrFail($sid);
    
    $student->fname = $request->input('fname');
    $student->lname = $request->input('lname');
    $student->birthplace = $request->input('birthplace');
    $student->birthDate = $request->input('birthDate');
    
    $student->save();
    
    return redirect()->route('index')->with('success', 'Öğrenci bilgisi başarıyla güncellendi!');
}



}