<?php
// Mail
use App\Mail\sendEmail;
// Facades
use Illuminate\Support\Facades\{Auth,Route,Mail};

// Shared Restful Controllers
use App\Http\Controllers\All\{
    ProfileController,
    TmpImageUploadController
};

// Admin Restful Controllers
use App\Http\Controllers\Admin\{
    DashboardController,
    ActivityLogController,
    AttendanceController as AdminAttendanceController,
    CategoryController,
    CourseController,
    DepartmentController,
    PatientController,
    PerformanceController as AdminPerformanceController,
    PlatoonController,
    SettingsController,
    StudentController,
    UserController
};

use App\Http\Controllers\API\{
    AuthController as ApiAuthController,
};

// Auth Restful Controller
use App\Http\Controllers\Auth\{
    AuthController
};

// Main Restful Controller
use App\Http\Controllers\Main\{
    PagesController
};

// Platoon Leader Restful Controller
use App\Http\Controllers\PlatoonLeader\{
    AttendanceController as PlatoonLeaderAttendanceController,
    AttendanceMonitoringController,
    DashboardController as PlatoonLeaderDashboardController,
    PerformanceController,
    AttendanceRecordsController,
    MeritsDemeritsController,
    UpdateAttendanceRecordsController,
    StudentController as PlatoonLeaderStudentController
};

// Student Restful Controller
use App\Http\Controllers\Student\{
    AttendanceController,
    PerformanceController as StudentPerformanceController
};

Route::get('/', function () {
    return to_route('auth.login');
})->name('main.home');

// // Guest
// Route::group(['as' => 'main.'],function() {

//      Route::controller(PagesController::class)->group(function () {
//         Route::get('/', 'home')->name('home');
//     });

// });


// Admin 
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'],function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard.index');

    /** Start Student Management */

        Route::resource('departments', DepartmentController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('platoons', PlatoonController::class);
        Route::resource('students', StudentController::class);

    /** End Student Management */

    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('patients', PatientController::class);
    //Route::get('role', RoleController::class)->name('role.index');
    Route::get('activity_logs', ActivityLogController::class)->name('activity_logs.index');

    Route::get('attendances', AdminAttendanceController::class)->name('attendances.index');
    Route::resource('performances', AdminPerformanceController::class);


    Route::resource('settings', SettingsController::class);

});

// Platoon leader
Route::group(['middleware' => ['auth', 'platoon_leader'], 'prefix' => 'platoon_leader', 'as' => 'platoon_leader.'],function() {
    Route::get('dashboard', PlatoonLeaderDashboardController::class)->name('dashboard.index');

    /** Start Attendance Management */
        Route::resource('students', PlatoonLeaderStudentController::class);

        Route::resource('attendance-monitoring', AttendanceMonitoringController::class)->only('index', 'store');
        Route::resource('attendance-records', AttendanceRecordsController::class);
        Route::resource('merits-demerits', MeritsDemeritsController::class);
        Route::get('merits-demerits/show', [MeritsDemeritsController::class, 'show']);   
        Route::get('merits-demerits/create', [MeritsDemeritsController::class, 'create']);   
        Route::get('records',[AttendanceRecordsController::class, 'index'])->name('records');
        Route::get('show',[AttendanceRecordsController::class, 'show'])->name('show');
        Route::get('update_merits',[UpdateAttendanceRecordsController::class, 'update_merits'])->name('update_merits');
        Route::get('update_records',[UpdateAttendanceRecordsController::class, 'update_records'])->name('update_records');
        Route::get('attendances', PlatoonLeaderAttendanceController::class)->name('attendances.index');
    /** End Attendance Management */


    Route::resource('performances', PerformanceController::class);


    
});

// Student
Route::group(['middleware' => ['auth', 'student'], 'prefix' => 'student', 'as' => 'student.'],function() {
    Route::get('attendances', AttendanceController::class)->name('attendances.index');
    Route::resource('performances', StudentPerformanceController::class);

});


// Auth
Route::group(['middleware' => ['auth']],function() {
    Route::delete('tmp_upload/revert', [TmpImageUploadController::class, 'revert']);     // TMP FILE UPLOAD
    Route::resource('tmp_upload', TmpImageUploadController::class);
    Route::resource('profile', ProfileController::class)->parameter('profile', 'user');;
});


// Custom Authentication
Route::group(['as' => 'auth.'], function () {

    // Auth Routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'attemptLogin')->name('attempt_login');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'attemptRegister')->name('attempt_register');
        Route::post('/logout', 'logout')->name('logout');

        // email verification

        Route::get('/email/verify/{token}', 'emailVerification')->name('email_verification');
    });
});


Auth::routes(['login' => false, 'register' => false, 'logout' => false]);

// Route::any('request_otp', 
// function(){
//     Mail::to('methuselahdanieldoysabas@gmail.com')->send(new sendEmail());
// }
// );
Route::get('request_otp', [ApiAuthController::class, 'requestOtp']);
// Route::post('verify_otp', [ApiAuthController::class, 'verifyOtp']);