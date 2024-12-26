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

    public function assignStudent(Request $request, $courseId)
    {
        // Busca el curso por su ID
        $course = Course::find($courseId);
        // Obtiene el ID del estudiante desde la solicitud
        $studentId = $request->student_id;

        // Verifica si el curso y el estudiante existen
        if ($course && Student::find($studentId)) {
            // Asigna el estudiante al curso utilizando la relación muchos a muchos
            $course->students()->attach($studentId);
            // Retorna una respuesta JSON indicando éxito
            return response()->json(['message' => 'Estudiante asignado al curso', 200]);
        } else {
            // Retorna una respuesta JSON indicando que el curso o el estudiante no fueron encontrados
            return response()->json(['message' => 'Curso o estudiante no encontrado', 404]);
        }
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
