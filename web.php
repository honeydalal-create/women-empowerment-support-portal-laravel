<?php

use Illuminate\Support\Facades\Route;

// ======================
// Visitor Controllers
// ======================
use App\Http\Controllers\Visitor\WelcomeController;
use App\Http\Controllers\Visitor\AboutController;
use App\Http\Controllers\Visitor\TrainingController;
use App\Http\Controllers\Visitor\JobController;
use App\Http\Controllers\Visitor\ArticlesController;
use App\Http\Controllers\visitor\SafetytipsController;
use App\Http\Controllers\Visitor\HelplineController;
use App\Http\Controllers\Visitor\ContactController;
use App\Http\Controllers\Visitor\RegisterController;
use App\Http\Controllers\Visitor\LoginController;

// ======================
// Woman Controllers
// ======================
use App\Http\Controllers\Woman\AuthController;
use App\Http\Controllers\Woman\DashboardController;
use App\Http\Controllers\Woman\WomanProfileController;
use App\Http\Controllers\Woman\TrainingApplicationController;
use App\Http\Controllers\Woman\JoblistingController;

use App\Http\Controllers\Woman\ArticleController;


use App\Http\Controllers\Woman\JobApplicationController;
use App\Http\Controllers\Woman\ComplaintController;
use App\Http\Controllers\Woman\ResumeController;


use App\Http\Controllers\Woman\MyCertificateController;

// ======================
// Admin Controllers
// ======================
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\TrainingsController;
use App\Http\Controllers\Admin\AppliedTrainingController;
use App\Http\Controllers\Admin\TrainingCertificateController;
use App\Http\Controllers\Admin\ViewComplaintController;
use App\Http\Controllers\Admin\ViewcontactController;
use App\Http\Controllers\admin\AddjobsController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\AdminsafetyTipController;
use App\Http\Controllers\Admin\HelplineNumberController;
use App\Http\Controllers\Admin\ReportController;
/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/trainings', [TrainingController::class, 'index'])->name('visitor.trainings');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/safety-tips', [SafetytipsController::class, 'index'])
    ->name('visitor.safety-tips');

// Visitor Helpline Page
Route::get('/helplines', [HelplineController::class, 'index'])
    ->name('visitor.helplines');



// Show contact form
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Store contact form submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Show "Check Admin Reply" form
Route::get('/check-reply', [ContactController::class, 'showCheckReplyForm'])->name('check.reply');

// Process email to see admin reply
Route::post('/check-reply', [ContactController::class, 'checkReply'])->name('check.reply.submit');


/*
|--------------------------------------------------------------------------
| Visitor Auth
|--------------------------------------------------------------------------
*/
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Forgot password
Route::get('/visitor/forgot-password', [LoginController::class, 'forgotForm'])->name('visitor.forgotpassword');
Route::post('/visitor/forgot-password', [LoginController::class, 'checkEmail'])->name('visitor.forgot.check');

// Reset password
Route::get('/visitor/reset-password/{email}', [LoginController::class, 'resetForm'])
    ->name('visitor.resetpassword');

// Handle reset password form submission
Route::post('/visitor/reset-password-submit', [LoginController::class, 'resetPassword'])
    ->name('visitor.reset.submit');


/*
|--------------------------------------------------------------------------
| Woman Routes
|--------------------------------------------------------------------------
*/
Route::prefix('woman')
    ->middleware('auth:female_user')
    ->name('woman.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [WomanProfileController::class, 'edit'])->name('profile');
    Route::post('/profile/{id}', [WomanProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Training
    Route::get('/training/apply', [TrainingApplicationController::class, 'create'])->name('apply_training');
    Route::post('/training/apply', [TrainingApplicationController::class, 'store'])->name('apply_training.store');
    Route::get('/my-training-applications', [TrainingApplicationController::class, 'myApplications'])
        ->name('user_training_applications');

    // Training Certificates (USER)
   Route::get('/training-certificates', [MyCertificateController::class, 'index'])
            ->name('training_certificates');

        Route::get('/training-certificates/download/{id}', [MyCertificateController::class, 'download'])
            ->name('training_certificates.download');
    // Jobs
    Route::get('/job-listings', [JoblistingController::class, 'index'])->name('joblisting');
    Route::post('/apply-job', [JobApplicationController::class, 'store'])->name('apply.job');
    Route::get('/applied-jobs', [JobApplicationController::class, 'appliedJobsPage'])->name('applied_jobs');

    // Complaints
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
    Route::get('/complaint/status', [ComplaintController::class, 'status'])->name('complaint.status');




    Route::get('resume', [ResumeController::class, 'index'])
            ->name('resume.index');

        Route::post('resume/store', [ResumeController::class, 'store'])
            ->name('resume.store');

        Route::post('resume/update', [ResumeController::class, 'update'])
            ->name('resume.update');

        Route::get('resume/view', [ResumeController::class, 'view'])
            ->name('resume.view');

    Route::get('articles', [ArticleController::class, 'index'])->name('articlelisting');
    Route::get('articles/breaking-barriers', [ArticleController::class, 'breakingBarriers'])->name('articles.breaking.barriers');
    Route::get('articles/leadership', [ArticleController::class, 'leadership'])->name('articles.leadership');
    Route::get('articles/self-defense', [ArticleController::class, 'selfDefense'])->name('articles.selfdefense');
    Route::get('articles/career-growth', [ArticleController::class, 'career'])->name('articles.career');
    Route::get('articles/entrepreneurs', [ArticleController::class, 'entrepreneurs'])->name('articles.entrepreneurs');
    Route::get('articles/health-wellness', [ArticleController::class, 'health'])->name('articles.health');


});

/*
|--------------------------------------------------------------------------
| Admin Auth (Public)
|--------------------------------------------------------------------------
*/


// Admin login & dashboard
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('visitor.admin');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminAuthController::class, 'penal'])->name('admin.penal');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Forgot password
Route::get('/admin/forgot-password', [AdminAuthController::class, 'forgotForm'])->name('admin.forgot');
Route::post('/admin/forgot-password', [AdminAuthController::class, 'checkEmail'])->name('admin.forgot.check');

// Reset password
Route::get('/admin/reset-password/{email}', [AdminAuthController::class, 'resetForm'])
    ->name('admin.reset');

// Handle reset password form submission
Route::post('/admin/reset-password-submit', [AdminAuthController::class, 'resetPassword'])
    ->name('admin.reset.submit');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware('auth:admin')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [AdminAuthController::class, 'penal'])->name('penal');

    // Trainings CRUD
    Route::resource('trainings', TrainingsController::class);

    // Applied Trainings
    Route::get('/approved_rejected_trainings', [AppliedTrainingController::class, 'index'])
        ->name('approved_rejected_trainings');




    Route::get('/complaints', [ViewComplaintController::class, 'index'])->name('complaints.index');
    Route::post('/complaints/reply/{id}', [ViewComplaintController::class, 'reply'])->name('complaints.reply');


    Route::get('/contacts', [ViewcontactController::class, 'index'])->name('contacts');
    Route::post('/contacts/reply/{id}', [ViewcontactController::class, 'reply'])->name('contacts.reply');


   // Jobs CRUD


Route::get('/job-applications', [AddjobsController::class, 'hiredRejectedApplications'])
    ->name('job_applications_status');



Route::get('/profile', [AdminProfileController::class, 'index'])
        ->name('profile');

    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update', [AdminProfileController::class, 'update'])
        ->name('profile.update');


    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/safety-tips', [AdminsafetyTipController::class, 'index'])
        ->name('safety_tips.index');

    Route::get('/safety-tips/create', [AdminsafetyTipController::class, 'create'])
        ->name('safety_tips.create');

    Route::post('/safety-tips', [AdminsafetyTipController::class, 'store'])
        ->name('safety_tips.store');

    Route::get('/safety-tips/{safetyTip}/edit', [AdminsafetyTipController::class, 'edit'])
        ->name('safety_tips.edit');

    Route::put('/safety-tips/{safetyTip}', [AdminsafetyTipController::class, 'update'])
        ->name('safety_tips.update');

    Route::delete('/safety-tips/{safetyTip}', [AdminsafetyTipController::class, 'destroy'])
        ->name('safety_tips.destroy');



    Route::get('/helplines', [HelplineNumberController::class, 'index'])
        ->name('helplines.index');

    Route::get('/helplines/create', [HelplineNumberController::class, 'create'])
        ->name('helplines.create');

    Route::post('/helplines', [HelplineNumberController::class, 'store'])
        ->name('helplines.store');

    Route::get('/helplines/{helpline}/edit', [HelplineNumberController::class, 'edit'])
        ->name('helplines.edit');

    Route::put('/helplines/{helpline}', [HelplineNumberController::class, 'update'])
        ->name('helplines.update');

    Route::delete('/helplines/{helpline}', [HelplineNumberController::class, 'destroy'])
        ->name('helplines.destroy');


Route::get('/report', [ReportController::class, 'index'])->name('report');


});







use App\Http\Controllers\Company\ApplicationDashboardController;
use App\Http\Controllers\company\CompanyTrainingController;
use App\Http\Controllers\company\CompanyProfileController;
use App\Http\Controllers\company\CompanyAuthController;
use App\Http\Controllers\Company\CompanyTrainingCertificateController;
use App\Http\Controllers\Company\CompanyJobsController;
use App\Http\Controllers\company\CompanyController;

Route::prefix('company')->name('company.')->group(function () {

    Route::get('/dashboard', [ApplicationDashboardController::class, 'index'])
            ->name('dashboard');

    // ================= AUTH =================
    Route::get('/login', [CompanyAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CompanyAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [CompanyAuthController::class, 'logout'])
        ->name('logout');

     // ✅ CORRECT
Route::get('/forgot', [CompanyAuthController::class, 'forgotForm'])
    ->name('forgot');

Route::post('/forgot', [CompanyAuthController::class, 'checkEmail'])
    ->name('forgot.check');

// Reset password
Route::get('/reset-password/{email}', [CompanyAuthController::class, 'resetForm'])
    ->name('reset');

Route::post('/reset-password-submit', [CompanyAuthController::class, 'resetPassword'])
    ->name('reset.submit');


       // Jobs Listing
    Route::get('/jobs', [CompanyJobsController::class, 'index'])
        ->name('jobs');

    // Create Job
    Route::get('/jobs/create', [CompanyJobsController::class, 'create'])
        ->name('jobs.create');

    Route::post('/jobs/store', [CompanyJobsController::class, 'store'])
        ->name('jobs.store');

    // Edit Job
    Route::get('/jobs/edit/{id}', [CompanyJobsController::class, 'edit'])
        ->name('jobs.edit');

    Route::post('/jobs/update/{id}', [CompanyJobsController::class, 'update'])
        ->name('jobs.update');

    // Delete Job
    Route::get('/jobs/delete/{id}', [CompanyJobsController::class, 'delete'])
        ->name('jobs.delete');

    // View Job Details
    Route::get('/jobs/view/{id}', [CompanyJobsController::class, 'view'])
        ->name('jobs.view');

    // Job Applications
    Route::get('/job-applications', [CompanyJobsController::class, 'jobApplications'])
        ->name('job.applications');

    // Update Application Status
   Route::put(
    '/job-applications/status/{id}',
    [CompanyJobsController::class, 'updateApplicationStatus']
)->name('job.update.status');

    // ================= PROTECTED =================


        Route::get('/profile', [CompanyProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [CompanyProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [CompanyProfileController::class, 'update'])->name('profile.update');

        // ================= TRAININGS =================

        Route::get('/', [CompanyTrainingController::class, 'index'])->name('index');
    Route::get('/create', [CompanyTrainingController::class, 'create'])->name('create');
    Route::post('/store', [CompanyTrainingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CompanyTrainingController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [CompanyTrainingController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [CompanyTrainingController::class, 'destroy'])->name('delete');

     Route::get('/applied-trainings', [CompanyTrainingController::class,'appliedTrainings'])
        ->name('applied_trainings');

    // Update Application Status (approve/reject)
    Route::patch('/applied-trainings/{id}/update-status', [CompanyTrainingController::class,'updateStatus'])
        ->name('applied_trainings.update_status');

        Route::get('/certificates', [CompanyTrainingCertificateController::class, 'index'])
        ->name('certificates.index');

    // Upload certificate
    Route::post('/certificates/upload', [CompanyTrainingCertificateController::class, 'store'])
        ->name('certificates.store');


    });

Route::get('/company/yearly-job-report', [CompanyController::class, 'yearlyReport'])
    ->name('company.yearly.job.report');
    Route::get('/company/training-pie-chart', [CompanyController::class, 'trainingPieChart'])->name('company.training.pie');




