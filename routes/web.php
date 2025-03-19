<?php

use App\Http\Controllers\AdminAjaxDataController;
use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicAjaxDataController;
use App\Http\Controllers\TeacherAjaxDataController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TeacherQuestionController;
use App\Http\Controllers\TeacherClassController;
use App\Http\Controllers\TeacherContentController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\TeacherDashboardController;
use Illuminate\Support\Facades\Route;

// admin

//Route::get('ghfghgh', [CourseController::class, 'index'])->name('admin.course.content.index');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'admin_auth_check'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::prefix('class')->name('class.')->group(function () {
        Route::get('index', [AdminClassController::class, 'index'])->name('index');
        Route::get('create', [AdminClassController::class, 'create'])->name('create');
        Route::post('store', [AdminClassController::class, 'store'])->name('store');

        Route::get('edit/{id}', [AdminClassController::class, 'edit'])->name('edit'); // Fix: Added {id}
        Route::put('update/{id}', [AdminClassController::class, 'update'])->name('update'); // Fix: Added {id}
        Route::delete('destroy/{id}', [AdminClassController::class, 'destroy'])->name('destroy'); // Fix: Added {id}

    });
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [AdminStudentController::class, 'index'])->name('index');
        Route::get('/create', [AdminStudentController::class, 'create'])->name('create');
        Route::post('/store', [AdminStudentController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminStudentController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminStudentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminStudentController::class, 'destroy'])->name('destroy');
        Route::get('/status/approved/{id}', [AdminStudentController::class, 'statusApprove'])->name('status.approved');
        Route::get('/status/not-approved/{id}', [AdminStudentController::class, 'statusNotApprove'])->name('status.not_approved');
        Route::get('/status/toggle/{id}', [AdminStudentController::class, 'statusToggle'])->name('status.toggle');

    });

    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/', [AdminTeacherController::class, 'index'])->name('index');
        Route::get('/create', [AdminTeacherController::class, 'create'])->name('create');
        Route::post('/store', [AdminTeacherController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminTeacherController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminTeacherController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminTeacherController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/', [AdminCourseController::class, 'index'])->name('index');
        Route::get('/create', [AdminCourseController::class, 'create'])->name('create');
        Route::post('/store', [AdminCourseController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCourseController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminCourseController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AdminCourseController::class, 'destroy'])->name('destroy');     

        Route::prefix('group')->name('group.')->group(function () {
            Route::get('/{id}', [AdminContentController::class, 'groupList'])->name('list');
            Route::get('/create/{id}', [AdminContentController::class, 'groupCreate'])->name('create');
            Route::post('/store/{id}', [AdminContentController::class, 'groupStore'])->name('store');
            Route::get('/edit/{id}', [AdminContentController::class, 'groupEdit'])->name('edit');
            Route::put('/update/{id}', [AdminContentController::class, 'groupUpdate'])->name('update');
            Route::delete('/delete/{id}', [AdminContentController::class, 'groupDestroy'])->name('destroy');
        });

        Route::prefix('content')->name('content.')->group(function () {
            Route::get('/{course_id}', [AdminContentController::class, 'index'])->name('index');
            Route::get('/create/{course_id}', [AdminContentController::class, 'create'])->name('create');
            Route::post('/store/{course_id}', [AdminContentController::class, 'store'])->name('store');    
            Route::get('/download/{id}', [AdminContentController::class, 'download'])->name('download');      
            Route::delete('/destroy/{id}', [AdminContentController::class, 'destroy'])->name('destroy');
        });

    });

    Route::prefix('ajaxdata')->name('ajaxdata.')->group(function () {
        Route::post('section', [AdminAjaxDataController::class, 'section'])->name('section');
        Route::post('course', [AdminAjaxDataController::class, 'course'])->name('course');
        Route::post('file', [AdminAjaxDataController::class, 'file'])->name('file');
    });

});

// teacher

Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'verified', 'teacher_auth_check'])->group(function () {

    Route::get('dashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');
    // content

    Route::prefix('class')->name('class.')->group(function () {
        Route::get('index', [TeacherClassController::class, 'index'])->name('index');
       
    
        });
        Route::prefix('course')->name('course.')->group(function () {
            Route::get('index', [TeacherCourseController::class, 'index'])->name('index');
            Route::get('/view/{id}', [TeacherCourseController::class, 'view'])->name('view');
         
        });
   Route::prefix('content')->name('content.')->group(function () {
            Route::get('index', [TeacherContentController::class, 'index'])->name('index');
            Route::get('/create', [TeacherContentController::class, 'create'])->name('create');
            Route::post('/store', [TeacherContentController::class, 'store'])->name('store');
            Route::get('/download/{id}', [TeacherContentController::class, 'download'])->name('download');
            Route::delete('/destroy/{id}', [TeacherContentController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('group')->name('group.')->group(function () {
            Route::get('/', [TeacherContentController::class, 'groupList'])->name('list');
            Route::get('/create', [TeacherContentController::class, 'groupCreate'])->name('create');
            Route::post('/store', [TeacherContentController::class, 'groupStore'])->name('store');
            Route::get('/edit/{id}', [TeacherContentController::class, 'groupEdit'])->name('edit');
            Route::put('/update/{id}', [TeacherContentController::class, 'groupUpdate'])->name('update');
            Route::delete('/delete/{id}', [TeacherContentController::class, 'groupDestroy'])->name('destroy');
        });
        Route::prefix('exam')->name('exam.')->group(function () {
            Route::get('index', [ExamController::class, 'index'])->name('index');
            Route::get('/create', [ExamController::class, 'create'])->name('create');
            Route::post('/store', [ExamController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [ExamController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [ExamController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('question')->name('question.')->group(function () {
            Route::get('index', [TeacherQuestionController::class, 'index'])->name('index');
            Route::get('/create', [TeacherQuestionController::class, 'create'])->name('create');
            Route::post('/store', [TeacherQuestionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TeacherQuestionController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [TeacherQuestionController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [TeacherQuestionController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('ajaxdata')->name('ajaxdata.')->group(function () {
            Route::post('section', [TeacherAjaxDataController::class, 'section'])->name('section');
            Route::post('course', [TeacherAjaxDataController::class, 'course'])->name('course');
        });

    Route::prefix('course')->name('course.')->group(function () {
        Route::get('index', [TeacherCourseController::class, 'index'])->name('index');
        Route::get('/view/{id}', [TeacherCourseController::class, 'view'])->name('view');

    });
    Route::prefix('content')->name('content.')->group(function () {
        Route::get('index', [TeacherContentController::class, 'index'])->name('index');
        Route::get('/create', [TeacherContentController::class, 'create'])->name('create');
        Route::post('/store', [TeacherContentController::class, 'store'])->name('store');
        Route::get('/download/{id}', [TeacherContentController::class, 'download'])->name('download');
        Route::delete('/destroy/{id}', [TeacherContentController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('group')->name('group.')->group(function () {
        Route::get('/', [TeacherContentController::class, 'groupList'])->name('list');
        Route::get('/create', [TeacherContentController::class, 'groupCreate'])->name('create');
        Route::post('/store', [TeacherContentController::class, 'groupStore'])->name('store');
        Route::get('/edit/{id}', [TeacherContentController::class, 'groupEdit'])->name('edit');
        Route::put('/update/{id}', [TeacherContentController::class, 'groupUpdate'])->name('update');
        Route::delete('/delete/{id}', [TeacherContentController::class, 'groupDestroy'])->name('destroy');
    });

    Route::prefix('ajaxdata')->name('ajaxdata.')->group(function () {
        Route::post('section', [TeacherAjaxDataController::class, 'section'])->name('section');
        Route::post('course', [TeacherAjaxDataController::class, 'course'])->name('course');
    });

  });

// student
Route::middleware(['auth', 'verified', 'student_auth_check'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // content

    Route::prefix('course')->name('course.')->group(function () {
        Route::get('index', [CourseController::class, 'index'])->name('index');
        Route::get('/view/{id}', [CourseController::class, 'view'])->name('view');
    });
    Route::prefix('content')->name('content.')->group(function () {
        Route::get('index', [ContentController::class, 'index'])->name('index');
        //  Route::get('list/{id}', [ContentController::class, 'index'])->name('index');
        Route::get('add/{id}', [TeacherContentController::class, 'add'])->name('add');
        Route::post('store/{id}', [TeacherContentController::class, 'store'])->name('store');
        Route::delete('delete/{id}', [TeacherContentController::class, 'delete'])->name('delete');

    });

});

Route::prefix('public/ajaxdata')->name('public.ajaxdata.')->group(function () {
    Route::post('section', [PublicAjaxDataController::class, 'publicSection'])->name('section');
});


/* Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); */


require __DIR__.'/auth.php';
