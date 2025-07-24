<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Models\Course;

trait CourseFilterTrait
{
    public function filterCourses(Request $request , $baseQuery = null)
    {
        $query = $baseQuery ?? Course::query();

        $query = Course::with(['coursePrice','category','subcategory'])->where('public_status', 1);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('course_name', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_title', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_des', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_language', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_type', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_lable', "LIKE", '%'.$request->search . '%')
                  ->orWhere('course_time', "LIKE", '%'.$request->search . '%')
                  ->orWhere('label', "LIKE", '%'.$request->search . '%')
                  ->orWhere('sell', "LIKE", '%'.$request->search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('course_category_id', $request->category);
        }
        if ($request->filled('subcategory')) {
            $query->where('course_subcategory_id', $request->subcategory);
        }

        if ($request->filled('level')) {
            $query->where('course_lable', $request->level);
        }

        if ($request->filled('language')) {
            $query->where('course_language', $request->language);
        }

        if ($request->filled('duration')) {
            $query->where('course_time', $request->duration);
        }

        if ($request->filled('price')) {
            $query->where('course_type', $request->price);
        }

        return $query;
    }
}
