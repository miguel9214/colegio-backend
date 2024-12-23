<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return response()->json($courses, ['Lista de cursos',200]);
    }

    public function show($id)
    {
        $course = Course::find($id);

        if ($course) {
            return response()->json($course, ['Curso encontrado',200]);
        } else {
            return response()->json(['Curso no encontrado',404]);
        }
    }

    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->hours = $request->hours;
        $course->grade = $request->grade;
        $course->save();

        return response()->json($course, ['Curso creado',201]);
    }


    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        if ($course) {
            $course->name = $request->name;
            $course->hours = $request->hours;
            $course->grade = $request->grade;
            $course->save();

            return response()->json($course, ['Curso actualizado',200]);
        } else {
            return response()->json(['Curso no encontrado',404]);
        }
    }


    public function delete($id)
    {
        $course = Course::find($id);

        if ($course) {
            $course->delete();
            return response()->json(['Curso eliminado',200]);
        } else {
            return response()->json(['Curso no encontrado',404]);
        }
    }   
}
