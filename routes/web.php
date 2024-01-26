<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Customer1Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderStatusController;



//////////////////////////////////////////////////////////////////////////
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Main', [DashboardController::class, 'AbuyogHome'])->name('Main');

//Route::get('/subscribers/orders/status/{status}', 'OrderStatusController@index');
Route::get('/water-refilling', [Customer1Controller::class, 'municipality']);
Route::get('/water-refilling/products/{municipality}', [Customer1Controller::class, 'products']);
Route::get('/subscription/renewal', [Customer1Controller::class, 'renewal']);
Route::post('/subscription/renewal', [Customer1Controller::class, 'renewalSubmit'])->name('subscription.renewal');


////////////////////////////////////////////////

// Additional Registration Route
Route::get('/register1', 'Auth\RegisterController@showRegistrationForm1')->name('register1');
Route::post('/register1', 'Auth\RegisterController@register1');


//////////////////DISPLAY PRODUCT//////////////
Route::get('/product/{id}', [CustomerController::class, 'viewProductDetails']);

Auth::routes();


//////////////////////////////////////////////////////////////////////////
// Customer Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/customer/home', [HomeController::class, 'customerHome'])->name('customer.home');

    // Customer Profile
    route::get('/customer/profile', [UserProfileController::class, 'userProfile'])->name('customer.profile');

    //PRODUCTS
    Route::get('/customer/product', [CustomerController::class, 'municipality']);
    Route::get('/customer/municipality/{municipality}/product', [CustomerController::class, 'products']);
    Route::get('/customer/cart', [CustomerController::class, 'viewCart']);
    Route::post('/customer/cart/{id}/add', [CustomerController::class, 'addToCart']);
    Route::get('/customer/cart/{id}/remove', [CustomerController::class, 'removeFromCart']);
    Route::post('/customer/buy', [CustomerController::class, 'buy']);
    Route::get('/customer/purchase-confirmation/{id}', [CustomerController::class, 'purchaseConfirmation']);
    Route::delete('/customer/purchase-confirmation/{id}', [CustomerController::class, 'purchaseDelete'])->name('purchase.delete');
    Route::get('/customer/my-orders', [CustomerController::class, 'myOrders']);

    // Add this new route
    Route::post('/customer/acknowledge-water/{orderId}', [CustomerController::class, 'acknowledgeWater']);


});

// Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/profile', [ProfileController::class, 'adminProfile'])->name('admin.profile');


    // Image
    Route::get('/admin/profile', [ProfileController::class, 'Profile'])->name('admin.profile');
    Route::get('/users/{users}/avatar', [ProfileController::class, 'avatar'])->name('users.avatar');
    Route::get('/delete/{id}', [HomeController::class, 'delete']);
    Route::get('/users/{users}/edit', [ProfileController::class, 'edit'])->name('users.edit');
    Route::put('/users/{users}', [ProfileController::class, 'update'])->name('users.update');

    // For All users
    Route::get('/admin/subscriber/invoice/{id}', [HomeController::class, 'subscriberInfo']);
    Route::put('/admin/subscriber/invoice/paid/{id}', [HomeController::class, 'subscriberPaid'])->name('invoice.update');

    Route::get('/admin/allusers', [HomeController::class, 'AllUsers'])->name('admin.allusers');
    Route::get('/admin/allsubscribers', [HomeController::class, 'AllSubscribers'])->name('admin.allsubscribers');
    Route::get('/delete/{id}', [HomeController::class, 'delete']);
    Route::get('/users/{users}/edit', [ProfileController::class, 'edit'])->name('users.edit');
    Route::put('/users/{users}', [ProfileController::class, 'update'])->name('users.update');

    // Subscribers Approval
    Route::put('/admin/allsubscribers/{id}', 'AdminController@approval')->name('admin.approval');
    Route::post('/admin/allsubscribers', 'AdminController@createInvoice')->name('invoice');
    Route::put('/admin/{id}', 'AdminController@disable')->name('admin.disable');
    Route::put('/{id}', 'AdminController@enable')->name('admin.enable');


});

// Subscribers Routes List
Route::middleware(['auth', 'user-access:WRF'])->group(function () {
    Route::get('/subscribers/home', [HomeController::class, 'subscribersHome'])->name('subscribers.home');

    Route::get('/subscriber/settings/{id}', [HomeController::class, 'mySettings']);
    Route::put('/subscriber/settings/update/{id}', [HomeController::class, 'updateSettings'])->name('update.settings');

    // Customer Profile
    route::get('/subscribers/profile', [UserProfileController::class, 'SubuserProfile'])->name('subscribers.profile');


        // PRODUCT MANAGE
        Route::get('/subscribers/products', [AdminController::class, 'manageProducts']);
        Route::get('/subscribers/products/create', [AdminController::class, 'createProduct']);
        Route::post('/subscribers/products/store', [AdminController::class, 'storeProduct']);
            // PRODUCT MANAGE
        Route::get('/subscribers/products/{id}/edit', [AdminController::class, 'editProduct']);
        Route::put('/subscribers/products/{id}/update', [AdminController::class, 'updateProduct']);
        Route::get('/subscribers/products/{id}/delete', [AdminController::class, 'deleteProduct']);
        // Update the delete route to use the 'destroyProduct' method

        // APPROVAL
        Route::get('/subscribers/orders', [AdminController::class, 'viewOrdersForApproval'])->name('subscribers.view-orders-for-approval');
        Route::post('/subscribers/orders/{order}/approve', [AdminController::class, 'approveOrder'])->name('subscribers.approve-order');

        Route::patch('/subscribers/approve-order/{orderId}', 'AdminController@approveOrder')->name('approveOrder');


        Route::get('/subscribers/orders/{order}/status', [OrderController::class, 'orderStatus'])->name('subscribers.order-status');


        Route::get('/subscribers/orders/status/{status}', 'OrderStatusController@index');
        Route::put('/subscribers/orders/status/{id}', 'AdminController@verifyOrder')->name('verify');

        //SMS
        Route::put('/subscribers/orders/status', 'AdminController@sendSms')->name('send-sms');

        // For success messages
        return redirect('/subscribers/products')->with('message', 'Product created successfully');

        // For error messages
        return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);




});




    use App\Http\Controllers\SubscriptionController;

    Route::get('/subscribe', [SubscriptionController::class, 'showSubscriptionForm'])->name('subscribe.form');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');


    // routes/web.php

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



//NOTIFICATIONS



Route::get('/subscribers/notifications', 'NotificationController@index')->name('subscribers.notifications');
Route::get('/subscribers/mark-as-read/{notificationId}', 'NotificationController@markAsRead');
