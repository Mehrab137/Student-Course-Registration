<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\AssignmentController;


Route::get('/', function () {
    return view('front_page');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'undergraduate', 'namespace' => 'App\Http\Controllers'], function(){

    Route::get('add-programs', 'UndergraduateController@addUndergradView')->name('add.undergrad.view');

    Route::post('submit-programs', 'UndergraduateController@addUndergradSubmit')->name('add.undergrad.submit');

    Route::get('/view-programs', 'UndergraduateController@viewUndergradList')->name('view.undergrad.list');

    Route::get('edit-programs/{undergrad_id}', 'UndergraduateController@editUndergradView')->name('edit.undergrad.view');

    Route::post('edit-programs/{undergrad_id}', 'UndergraduateController@editUndergradSubmit')->name('edit.undergrad.submit');

    Route::post('delete-programs', 'UndergraduateController@deleteUndergrad')->name('delete.undergrad');


    Route::get('add-department', 'UndergraduateController@addDepartmentView')->name('add.dept.view');

    Route::post('add-department', 'UndergraduateController@addDepartmentSubmit')->name('add.dept.submit');

    Route::get('view-departments', 'UndergraduateController@viewDepartmentList')->name('view.department.list');

    Route::get('edit-department/{department_id}', 'UndergraduateController@editDepartmentView')->name('edit.department.view');

    Route::post('edit-department/{department_id}', 'UndergraduateController@editDepartmentSubmit')->name('edit.department.submit');

    Route::post('delete-department', 'UndergraduateController@deleteDepartment')->name('delete.department');


    Route::get('add-course', 'UndergraduateController@addCourseView')->name('add.course.view');

    Route::post('add-course', 'UndergraduateController@addCourseSubmit')->name('add.course.submit');

    Route::get('view-courses', 'UndergraduateController@viewCourseList')->name('view.course.list');

    Route::get('edit-courses/{course_id}', 'UndergraduateController@editCourseView')->name('edit.course.view');

    Route::post('edit-courses/{course_id}', 'UndergraduateController@editCourseSubmit')->name('edit.course.submit');

    Route::post('delete-course', 'UndergraduateController@deleteCourse')->name('delete.course');


    Route::get('add-section', 'UndergraduateController@addSectionView')->name('add.section.view');

    Route::post('add-section', 'UndergraduateController@addSectionSubmit')->name('add.section.submit');

    Route::get('view-sections', 'UndergraduateController@viewSectionList')->name('view.section.list');

    Route::get('edit-sections/{section_id}', 'UndergraduateController@editSectionView')->name('edit.section.view');

    Route::post('edit-sections/{section_id}', 'UndergraduateController@editSectionSubmit')->name('edit.section.submit');

    Route::post('delete-section', 'UndergraduateController@deleteSection')->name('delete.section');


    Route::get('add-students', 'UndergraduateController@addStudentView')->name('add.student.view');

    Route::post('add-students', 'UndergraduateController@addStudentSubmit')->name('add.student.submit');

    Route::get('view-students', 'UndergraduateController@viewStudentList')->name('view.student.list');

    Route::get('edit-students/{program_id}', 'UndergraduateController@editStudentView')->name('edit.student.view');

    Route::post('edit-students/{program_id}', 'UndergraduateController@editStudentSubmit')->name('edit.student.submit');
    
    Route::post('delete-student', 'UndergraduateController@deleteStudent')->name('delete.student');


    Route::get('add-faculties', 'UndergraduateController@addFacultyView')->name('add.faculty.view');

    Route::post('add-faculties','UndergraduateController@addFacultySubmit')->name('add.faculty.submit');

});

    Route::get('view-sections/excel','App\Http\Controllers\ExportController@exportSection')->name('export.section.excel');
    Route::get('view-students/excel', 'App\Http\Controllers\ExportController@exportStudent')->name('export.student.excel');

    Route::get('add-department/excel', 'App\Http\Controllers\ImportController@importDepartmentView')->name('view.import.department');
    Route::post('add-department/excel', 'App\Http\Controllers\ImportController@importDepartmentSubmit')->name('submit.import.department');

    Route::get('add-course/excel', 'App\Http\Controllers\ImportController@importCourseView')->name('view.import.course');
    Route::post('add-course/excel', 'App\Http\Controllers\ImportController@importCourseSubmit')->name('submit.import.course');

    Route::get('assign-faculty', 'App\Http\Controllers\AssignmentController@assignFacultyView')->name('assign.faculty.view');
    Route::post('find-course','App\Http\Controllers\AssignmentController@assignFacultySubmit')->name('assign.faculty.submit');
