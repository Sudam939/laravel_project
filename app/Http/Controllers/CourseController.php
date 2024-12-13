<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course()
    {
        $courses = Course::all();
        return view('course', compact('courses'));
    }

    public function store_course(Request $request) {

        $course = new Course();
        $course->name = $request->name;
        $course->price = $request->price;
        $course->duration = $request->duration;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $course->image = 'images/' . $fileName;
        }

        $course->save();

        return " Course Saved";
    }
}
