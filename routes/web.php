<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'undergraduate', 'namespace' => 'App\Http\Controllers'], function(){

    Route::get('programs', 'UndergraduateController@addUndergradView')->name('add.undergrad.view');

    Route::post('submit-programs', 'UndergraduateController@addUndergradSubmit')->name('add.undergrad.submit');


    Route::get('add-department', 'UndergraduateController@addDepartmentView')->name('add.dept.view');

    Route::post('add-department', 'UndergraduateController@addDepartmentSubmit')->name('add.dept.submit');

    Route::get('view-departments', 'UndergraduateController@viewDepartmentList')->name('view.department.list');

    Route::get('edit-department/{department_id}', 'UndergraduateController@editDepartmentView')->name('edit.department.view');

    Route::post('edit-department/{department_id}', 'UndergraduateController@editDepartmentSubmit')->name('edit.department.submit');


    Route::get('add-course', 'UndergraduateController@addCourseView')->name('add.course.view');

    Route::post('add-course', 'UndergraduateController@addCourseSubmit')->name('add.course.submit');

    Route::get('add-section', 'UndergraduateController@addSectionView')->name('add.section.view');

    Route::post('add-section', 'UndergraduateController@addSectionSubmit')->name('add.section.submit');

    Route::get('add-students', 'UndergraduateController@addStudentView')->name('add.student.view');

    Route::post('add-students', 'UndergraduateController@addStudentSubmit')->name('add.student.submit');

    Route::get('view-programs', 'UndergraduateController@viewUndergradList')->name('view.undergrad.list');
    
    Route::get('view-courses', 'UndergraduateController@viewCourseList')->name('view.course.list');

    Route::get('view-sections', 'UndergraduateController@viewSectionList')->name('view.section.list');
    
    Route::get('view-students', 'UndergraduateController@viewStudentList')->name('view.student.list');

    Route::get('update-students/{id}', 'UndergraduateController@updateStudentView')->name('update.student.view');

    Route::post('update-students', 'UndergraduateController@updateStudentSubmit')->name('update.student.submit');
    

});
