<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontendController;
use App\Models\Admission;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/about', [FrontendController::class, 'about'])->name('about');

Route::get('/course', [CourseController::class, 'course'])->name('course');


Route::post('/save-course', [CourseController::class,'store_course'])->name('store_course');

Route::get('/edit-course/{id}', function ($id) {
    $course = Course::find($id);
    return view('course_edit', compact('course'));
})->name('edit_course');


Route::put('/update-course/{id}', function (Request $request, $id) {
    $course = Course::find($id);
    $course->name = $request->name;
    $course->price = $request->price;
    $course->duration = $request->duration;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images', $fileName);
        $course->image = 'images/' . $fileName;
    }

    $course->update();

    return redirect()->back();
});

Route::delete('/course-delete/{id}', function ($id) {
    $course = Course::find($id);
    $course->delete();
    return redirect('/course');
});


Route::get('/admission', function () {
    $courses = Course::all();
    $admissions = Admission::all();

    return view('admission', compact('courses', 'admissions'));
});

Route::post('/save-admission', function (Request $request) {

    $admission = new Admission();
    $admission->name = $request->name;
    $admission->phone = $request->phone;
    $admission->course_id = $request->course;

    $admission->save();

    return redirect('/admission');
});
