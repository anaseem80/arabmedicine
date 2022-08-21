<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManageCoursesController extends Controller
{
    //
    public function index()
    {
        $data = Courses::all();
        return view('dashboard.courses-page', ['courses' => $data]);
    }

    public function editCourse($course_id)
    {
        Courses::findOrFail($course_id);

        $courseId = Courses::find($course_id);
        return view('dashboard.manage-courses', compact('courseId'));
    }

    public function update(Request $request, $course_id)
    {


//        return $request->free;

//        Start validation
        $price_free = 'required';
        if ($request->has('free')) {
            $price_free = '';
        }
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'price' => $price_free,

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        //    =====================================================

//      Check the course

        $courses = Courses::findOrFail($course_id);

        $courseId = Courses::find($course_id);
        //    =====================================================

//        Update the course data
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/courses';
        $request->image->move($path, $file_name);

        $price = null;
        if (!$request->has('free')) {
            $price = $request->price;

        }
        $courseId->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name,
            'price' => $price,
            'free' => $request->has('free'),
        ]);
        return redirect()->back()->with(['success' => 'The Course updated successfully']);

    }


    public function createSections(Request $request)
    {
        $rules = [
            'section_name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
//        ======================== Create Section=====================
        $data = $request->all();
        Section::create($data);
        return redirect()->back();
//        ======================== End Create Section=====================
    }

    public function createLessons(Request $request)
    {
        $rules = [
            'lesson_name' => 'required',
            'url' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }


        $data = $request->all();
        Lesson::create($data);


        return redirect()->back();
    }

//    Start delete and update section

    public function deleteSection($id)
    {
//        Lesson::where('course_id', $id)->delete();
        Section::find($id)->delete();
        return redirect()->back();
    }

    public function updateSection(Request $request, $id)
    {
        $section_id = Section::find($id);
        $section_id->update([
            'section_name' => $request->section_name,

        ]);
        return redirect()->back();
    }
//    End delete and update section

//    Start delete and update lesson

    public function deleteLesson($id)
    {

        Lesson::find($id)->delete();
        return redirect()->back();
    }

    public function updateLesson(Request $request, $id)
    {
        $section_name = Section::all();
        $lesson_id = Lesson::find($id);

        $lesson_id->update([
            'lesson_name' => $request->lesson_name,
            'section_id' => $request->section_id
//            'section_id' => $request->section_id,

        ]);
//        $section_name->update([
//            'section_name'=>$request->section_name
//        ]);

        return redirect()->back();
    }

//    End delete and update lesson

}
