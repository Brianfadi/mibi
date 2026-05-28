<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LiveSessionController;
use App\Http\Controllers\Web\ProgramController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\TestimonialController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\CommunicationController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\LiveSessionController as AdminLiveSessionController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/coming-soon', 'pages.coming-soon')->name('coming-soon');

// About & Legal Pages
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/coaching', [HomeController::class, 'coaching'])->name('coaching');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Live Sessions
Route::get('/live-sessions', [LiveSessionController::class, 'index'])->name('live-sessions.index');
Route::get('/live-sessions/{slug}', [LiveSessionController::class, 'show'])->name('live-sessions.show');

// Testimonials
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [ContactController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe/{email}', [ContactController::class, 'unsubscribe'])->name('unsubscribe');

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    Route::get('/api/bookings/slots/{serviceId}/{date}', [BookingController::class, 'slots'])->name('bookings.slots');

    // Live Session Registration
    Route::post('/live-sessions/{slug}/register', [LiveSessionController::class, 'register'])->name('live-sessions.register');
});

// Payment Webhooks
Route::post('/api/mpesa/callback', [App\Http\Controllers\Api\PaymentWebhookController::class, 'mpesaCallback']);
Route::post('/api/stripe/webhook', [App\Http\Controllers\Api\PaymentWebhookController::class, 'stripeWebhook']);
Route::match(['get', 'post'], '/api/whatsapp/webhook', [App\Http\Controllers\Api\PaymentWebhookController::class, 'whatsappWebhook']);

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
    Route::post('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');

    // Services
    Route::resource('/services', AdminServiceController::class)->except('show');

    // Programs
    Route::resource('/programs', \App\Http\Controllers\Admin\ProgramController::class)->except('show');

    // Bookings
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/upcoming', [AdminBookingController::class, 'upcoming'])->name('bookings.upcoming');
    Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{booking}/confirm', [AdminBookingController::class, 'confirm'])->name('bookings.confirm');
    Route::post('/bookings/{booking}/complete', [AdminBookingController::class, 'complete'])->name('bookings.complete');
    Route::post('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])->name('bookings.cancel');

    // Blog
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::post('/blog/{post}/publish', [AdminBlogController::class, 'publish'])->name('blog.publish');
    Route::post('/blog/{post}/unpublish', [AdminBlogController::class, 'unpublish'])->name('blog.unpublish');
    Route::delete('/blog/{post}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/blog/categories', [AdminBlogController::class, 'categories'])->name('blog.categories');
    Route::post('/blog/categories', [AdminBlogController::class, 'storeCategory'])->name('blog.categories.store');

    // Testimonials
    Route::resource('/testimonials', AdminTestimonialController::class)->except('show');

    // Contacts
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/unread', [AdminContactController::class, 'unread'])->name('contacts.unread');
    Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Pages
    Route::resource('/pages', AdminPageController::class)->except('show');

    // Live Sessions
    Route::resource('/live-sessions', AdminLiveSessionController::class)->except('show');

    // FAQs
    Route::get('/faqs', [AdminFaqController::class, 'index'])->name('faqs.index');
    Route::post('/faqs', [AdminFaqController::class, 'store'])->name('faqs.store');
    Route::put('/faqs/{faq}', [AdminFaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [AdminFaqController::class, 'destroy'])->name('faqs.destroy');

    // Registrations
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
    Route::get('/registrations/pending', [RegistrationController::class, 'pending'])->name('registrations.pending');
    Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    Route::post('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::post('/registrations/{registration}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [AdminPaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{payment}/confirm', [AdminPaymentController::class, 'confirm'])->name('payments.confirm');
    Route::post('/payments/{payment}/refund', [AdminPaymentController::class, 'refund'])->name('payments.refund');

    // Coaches
    Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
    Route::get('/coaches/create', [CoachController::class, 'create'])->name('coaches.create');
    Route::post('/coaches', [CoachController::class, 'store'])->name('coaches.store');
    Route::get('/coaches/{coach}', [CoachController::class, 'show'])->name('coaches.show');
    Route::get('/coaches/{coach}/edit', [CoachController::class, 'edit'])->name('coaches.edit');
    Route::put('/coaches/{coach}', [CoachController::class, 'update'])->name('coaches.update');

    // Support Tickets
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    Route::get('/support/{ticket}', [SupportController::class, 'show'])->name('support.show');
    Route::post('/support/{ticket}/reply', [SupportController::class, 'reply'])->name('support.reply');
    Route::post('/support/{ticket}/assign', [SupportController::class, 'assign'])->name('support.assign');
    Route::post('/support/{ticket}/resolve', [SupportController::class, 'resolve'])->name('support.resolve');
    Route::post('/support/{ticket}/escalate', [SupportController::class, 'escalate'])->name('support.escalate');

    // Subscribers
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers.index');
    Route::get('/subscribers/export', [SubscriberController::class, 'export'])->name('subscribers.export');
    Route::delete('/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])->name('subscribers.destroy');

    // Communication
    Route::get('/communication', [CommunicationController::class, 'index'])->name('communication.index');
    Route::get('/communication/whatsapp', [CommunicationController::class, 'whatsApp'])->name('communication.whatsapp');
    Route::get('/communication/subscribers', [CommunicationController::class, 'subscribers'])->name('communication.subscribers');
    Route::post('/communication/send-email', [CommunicationController::class, 'sendEmail'])->name('communication.send-email');

    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

    // Media Library
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::delete('/media/{medium}', [MediaController::class, 'destroy'])->name('media.destroy');

    // Notifications
    Route::get('/notifications', [AdminNotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-read', [AdminNotificationController::class, 'markAllRead'])->name('notifications.mark-all-read');
    Route::post('/notifications/{notification}/read', [AdminNotificationController::class, 'markRead'])->name('notifications.mark-read');
    Route::delete('/notifications/{notification}', [AdminNotificationController::class, 'destroy'])->name('notifications.destroy');

    // Security
    Route::get('/security', [SecurityController::class, 'index'])->name('security.index');
    Route::post('/security/roles', [SecurityController::class, 'createRole'])->name('security.create-role');
    Route::put('/security/roles/{role}', [SecurityController::class, 'updateRole'])->name('security.update-role');
    Route::get('/security/logs', [SecurityController::class, 'logs'])->name('security.logs');

    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

// Fallback for CMS Pages
Route::get('/{slug}', function (string $slug) {
    $page = \App\Models\Page::where('slug', $slug)->published()->firstOrFail();
    return view('pages.show', compact('page'));
})->where('slug', '[a-z0-9-]+');
