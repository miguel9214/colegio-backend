<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        $students = Student::all();

        response()->json($students, ['Lista de estudiantes', 200]);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json($student, ['Estudiante encontrado', 200]);
        } else {
            return response()->json(['Estudiante no encontrado', 404]);
        }
    }


    public function store(Request $request)
    {
        $student = new Student();
        $student->identification = $request->identification;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->photo = $request->photo;
        $student->save();

        return response()->json($student, ['Estudiante creado', 201]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->identification = $request->identification;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->photo = $request->photo;
            $student->save();

            return response()->json($student, ['Estudiante actualizado', 200]);
        } else {
            return response()->json(['Estudiante no encontrado', 404]);
        }
    }


    public function delete($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            return response()->json(['Estudiante eliminado', 200]);
        } else {
            return response()->json(['Estudiante no encontrado', 404]);
        }
    }
}
