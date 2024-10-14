<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\CallTrackingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CharacteristicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\TargetNumberController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ZoneController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('about-us', [WebsiteController::class, 'about'])->name('about');
Route::get('contact', [WebsiteController::class, 'contact'])->name('contact');
Route::get('terms-conditions', [WebsiteController::class, 'termsConditions'])->name('terms-conditions');
Route::get('privacy-policy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('sitemap', [WebsiteController::class, 'sitemap'])->name('sitemap');

/* Landing */
Route::get('digital-solutions', [LandingController::class,'solutions'])->name('solutions');
Route::post('digital-solutions', [LandingController::class,'sendSolutions'])->name('post-solutions');

/* Locales pages */
Route::get('neighborhood-offer', [WebsiteController::class, 'neighborhoodOffer'])->name('neighborhood-offer');

/* Cards pages */
Route::get('card/jesus', [WebsiteController::class, 'cardJesus']);

/* Quotes */
Route::get('website-cost-calculator', [QuoteController::class, 'webDesign'])->name('website-cost-calculator');
Route::post('website-cost-calculator', [QuoteController::class, 'sendWebDesign'])->name('website-cost-send');
Route::get('quote/{id}/{email}', [QuoteController::class, 'showWebDesign'])->name('show-web-design-quote');

// Messages routes (forms)
Route::post('contact', [MessageController::class, 'contact'])->name('contact-message');

// Portfolio routes
Route::group(['prefix' => 'portfolio'], function () {
    Route::get('/', [PortfolioController::class, 'portfolio'])->name('portfolio');
    Route::get('{url}', [PortfolioController::class, 'single'])->name('single-portfolio');
});

/* Blog */
Route::get('blog', [PostController::class, 'blog'])->name('blog');
Route::get('blog/{url}', [PostController::class, 'single'])->name('single');
Route::get('get-posts', [PostController::class, 'getPosts'])->name('get-posts');

/* e-commerce */
Route::get('product/{url}', [ProductController::class, 'single'])->name('product');
/*
// Categories and products routes
Route::get('categoria/{url}', [CategoryController::class, 'single'])->name('category');
Route::get('producto/{url}/zoom/{variation}', [ProductController::class, 'zoom'])->name('product-zoom');

// Order routes
Route::post('handle-order', [OrderController::class, 'handle'])->name('handle-order');
Route::get('order-remove/{id}/{order}', [OrderController::class, 'remove'])->name('remove-order');
Route::get('carrito', [OrderController::class, 'cart'])->name('cart');
Route::post('update-order', [OrderController::class, 'update'])->name('update-order');

// Checkout routes
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('login', [CheckoutController::class, 'login'])->name('checkout-login');
    Route::post('register', [CheckoutController::class, 'register'])->name('checkout-register');
});

// Temporal unused routes - not delete
Route::get('cart/{id}', [WebsiteController::class, 'addCart'])->name('add-cart');
Route::get('quick-view/{id}', [WebsiteController::class, 'quickView'])->name('quick-view');
*/

// Account routes for non-blocked users
Route::middleware(['blocked', 'verified'])->group(function () {
    // Dashboard routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Account routes
    Route::group(['prefix' => 'cuenta'], function () {
        Route::get('/', [AccountController::class, 'index'])->name('my-account');
        Route::post('update', [AccountController::class, 'update'])->name('update-account');
    });
    // Profiles routes
    Route::group(['prefix' => 'direcciones'], function () {
        Route::get('/', [AddressController::class, 'index'])->name('addresses');
        Route::get('new', [AddressController::class, 'new'])->name('new-address');
        Route::post('create', [AddressController::class, 'create'])->name('create-address');
        Route::get('edit/{id}', [AddressController::class, 'edit'])->name('edit-address');
        Route::post('update', [AddressController::class, 'update'])->name('update-address');
        Route::get('delete/{id}', [AddressController::class, 'delete'])->name('delete-address');
        Route::get('main/{id}', [AddressController::class, 'main'])->name('main-address');
    });

    // Checkout route
    Route::group(['prefix' => 'checkout'], function () {
        Route::post('shipping', [CheckoutController::class, 'setShipping'])->name('checkout-shipping');
        Route::post('billing', [CheckoutController::class, 'setBilling'])->name('checkout-billing');
        Route::post('openpay', [CheckoutController::class, 'openpay'])->name('checkout-openpay');
        Route::get('mercadopago/success', [CheckoutController::class, 'mercadopagoSuccess'])->name('mercadopago-success');
        Route::get('mercadopago/failure', [CheckoutController::class, 'mercadopagoFailure'])->name('mercadopago-failure');
        Route::get('mercadopago/pending', [CheckoutController::class, 'mercadopagoPending'])->name('mercadopago-pending');
    });

    // Order route
    Route::group(['prefix' => 'orden'], function () {
        Route::get('completa/{hash}', [OrderController::class, 'completed'])->name('completed-order');
        Route::get('recibo', [OrderController::class, 'receipt'])->name('receipt-order');
        Route::get('historial', [OrderController::class, 'history'])->name('history');
        Route::get('detalles/{hash}', [OrderController::class, 'details'])->name('details-order');
        Route::get('imprimir/{hash}', [OrderController::class, 'print'])->name('print-order');
    });

    // Wishlist routes
    Route::get('lista-deseos', [WishlistController::class, 'index'])->name('wishlist');
    Route::post('add-wishlist', [WishlistController::class, 'add'])->name('add-wishlist');
    Route::post('actions', [WishlistController::class, 'actions'])->name('actions-wishlist');

    // Messages routes
    Route::group(['prefix' => 'messages'], function () {
        Route::get('type/{type}', [MessageController::class, 'type'])->name('type-message');
        Route::get('view/{id}', [MessageController::class, 'view'])->name('view-message');
        Route::get('delete/{id}', [MessageController::class, 'delete'])->name('delete-message');
        Route::get('trash', [MessageController::class, 'trash'])->name('trash');
        Route::post('actions', [MessageController::class, 'actions'])->name('actions-message');
        Route::get('/{filter?}', [MessageController::class, 'index'])->name('messages');
    });

    // Analytics routes
    Route::group(['prefix' => 'analytics'], function () {
        Route::get('/', [AnalyticsController::class, 'index'])->name('analytics');
    });

    // Call routes
    Route::group(['prefix' => 'calls'], function () {
        Route::get('/', [CallController::class, 'index'])->name('calls');
    });
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'verified']],function () {
    // Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('new', [UserController::class, 'new'])->name('new-user');
        Route::post('create', [UserController::class, 'create'])->name('create-user');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit-user');
        Route::post('update', [UserController::class, 'update'])->name('update-user');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete-user');
        Route::post('actions', [UserController::class, 'actions'])->name('actions-user');
        Route::get('table', [UserController::class, 'table'])->name('table-user');
    });

    // Services
    Route::group(['prefix' => 'services'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services');
        Route::get('new', [ServiceController::class, 'new'])->name('new-service');
        Route::post('create', [ServiceController::class, 'create'])->name('create-service');
        Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit-service');
        Route::post('update', [ServiceController::class, 'update'])->name('update-service');
        Route::get('delete/{id}', [ServiceController::class, 'delete'])->name('delete-service');
        Route::post('actions', [ServiceController::class, 'actions'])->name('actions-service');
    });

    // Posts
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('posts');
        Route::get('new', [PostController::class, 'new'])->name('new-post');
        Route::post('create', [PostController::class, 'create'])->name('create-post');
        Route::get('edit/{id}', [PostController::class, 'edit'])->name('edit-post');
        Route::post('update', [PostController::class, 'update'])->name('update-post');
        Route::get('delete/{id}', [PostController::class, 'delete'])->name('delete-post');
        Route::post('actions', [PostController::class, 'actions'])->name('actions-post');
    });

    // Categories
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('new', [CategoryController::class, 'new'])->name('new-category');
        Route::post('create', [CategoryController::class, 'create'])->name('create-category');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit-category');
        Route::post('update', [CategoryController::class, 'update'])->name('update-category');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete-category');
        Route::post('actions', [CategoryController::class, 'actions'])->name('actions-category');
        Route::post('upload', [CategoryController::class, 'upload'])->name('image-category');
    });

    // Attributes
    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', [AttributeController::class, 'index'])->name('attributes');
        Route::get('new', [AttributeController::class, 'new'])->name('new-attribute');
        Route::post('create', [AttributeController::class, 'create'])->name('create-attribute');
        Route::get('edit/{id}', [AttributeController::class, 'edit'])->name('edit-attribute');
        Route::post('update', [AttributeController::class, 'update'])->name('update-attribute');
        Route::get('delete/{id}', [AttributeController::class, 'delete'])->name('delete-attribute');
        Route::post('actions', [AttributeController::class, 'actions'])->name('actions-attribute');
    });

    // Attributes
    Route::group(['prefix' => 'characteristics'], function () {
        Route::post('create', [CharacteristicController::class, 'create'])->name('create-characteristic');
        Route::get('edit/{id}', [CharacteristicController::class, 'edit'])->name('edit-characteristic');
        Route::post('update', [CharacteristicController::class, 'update'])->name('update-characteristic');
        Route::get('delete/{id}', [CharacteristicController::class, 'delete'])->name('delete-characteristic');
        Route::post('actions', [CharacteristicController::class, 'actions'])->name('actions-characteristic');
    });

    // Products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products');
        Route::get('new', [ProductController::class, 'new'])->name('new-product');
        Route::post('create', [ProductController::class, 'create'])->name('create-product');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::post('update', [ProductController::class, 'update'])->name('update-product');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete-product');
        Route::get('delete-image/{id}/{number}', [ProductController::class, 'deleteImage'])->name('delete-image-product');
        Route::post('actions', [ProductController::class, 'actions'])->name('actions-product');
        Route::get('duplicate/{id}', [ProductController::class, 'duplicate'])->name('duplicate-product');
    });

    // Zones
    Route::group(['prefix' => 'zones'], function () {
        Route::get('/', [ZoneController::class, 'index'])->name('zones');
        Route::get('new', [ZoneController::class, 'new'])->name('new-zone');
        Route::post('create', [ZoneController::class, 'create'])->name('create-zone');
        Route::get('edit/{id}', [ZoneController::class, 'edit'])->name('edit-zone');
        Route::post('update', [ZoneController::class, 'update'])->name('update-zone');
        Route::get('delete/{id}', [ZoneController::class, 'delete'])->name('delete-zone');
        Route::post('actions', [ZoneController::class, 'actions'])->name('actions-zone');
    });

    // States
    Route::group(['prefix' => 'states'], function () {
        Route::get('/', [StateController::class, 'index'])->name('states');
        Route::get('new', [StateController::class, 'new'])->name('new-state');
        Route::post('create', [StateController::class, 'create'])->name('create-state');
        Route::get('edit/{id}', [StateController::class, 'edit'])->name('edit-state');
        Route::post('update', [StateController::class, 'update'])->name('update-state');
        Route::get('delete/{id}', [StateController::class, 'delete'])->name('delete-state');
        Route::post('actions', [StateController::class, 'actions'])->name('actions-state');
    });

    // Order
    Route::group(['prefix' => 'orders'], function () {
        Route::get('manage/{hash}', [OrderController::class, 'manage'])->name('manage-order');
        Route::post('status', [OrderController::class, 'status'])->name('status-order');
        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('delete-order');
    });

    //Note route
    Route::group(['prefix' => 'notes'], function () {
        Route::post('create', [NoteController::class, 'create'])->name('create-note');
        Route::get('delete/{id}', [NoteController::class, 'delete'])->name('delete-note');
    });

    // Payment
    Route::get('pago', [PaymentController::class, 'index'])->name('payment');

    // Portfolio routes
    Route::group(['prefix' => 'portfolio'], function () {
        Route::get('/', [PortfolioController::class, 'index'])->name('portfolios');
        Route::get('new', [PortfolioController::class, 'new'])->name('new-portfolio');
        Route::post('new', [PortfolioController::class, 'create'])->name('create-portfolio');
        Route::get('edit/{id}', [PortfolioController::class, 'edit'])->name('edit-portfolio');
        Route::post('update', [PortfolioController::class, 'update'])->name('update-portfolio');
        Route::post('actions', [PortfolioController::class, 'actions'])->name('actions-portfolio');
        Route::get('delete/{id}', [PortfolioController::class, 'delete'])->name('delete-portfolio');
        Route::get('delete-image/{image}', [PortfolioController::class, 'deleteImage'])->name('delete-image-portfolio');
    });

    // Setting routes
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings');
        Route::post('new', [SettingController::class, 'create'])->name('create-setting');
        Route::post('update', [SettingController::class, 'update'])->name('update-setting');
        Route::get('delete-image/{image}', [SettingController::class, 'deleteImage'])->name('delete-image-setting');
        Route::get('sitemap', [SettingController::class, 'sitemapLaunch']);
    });

    // OpenAI routes
    Route::group(['prefix' => 'open-ai'], function () {
        Route::get('/', [OpenAIController::class, 'index'])->name('open-ai');
        Route::post('create', [OpenAIController::class, 'create'])->name('open-ai-create');
    });

    // Call Tracking routes
    Route::group(['prefix' => 'call-tracking'], function () {
        Route::get('/', [CallTrackingController::class, 'index'])->name('call-tracking');
        Route::get('new', [CallTrackingController::class, 'new'])->name('new-call-tracking');
        Route::post('new', [CallTrackingController::class, 'create'])->name('create-call-tracking');
        Route::get('edit/{id}', [CallTrackingController::class, 'edit'])->name('edit-call-tracking');
        Route::post('update', [CallTrackingController::class, 'update'])->name('update-call-tracking');
        Route::get('delete/{hash}', [CallTrackingController::class, 'delete'])->name('delete-call-tracking');
        Route::get('search', [CallTrackingController::class, 'search']);
    });

    // Target Number routes
    Route::group(['prefix' => 'target-numbers'], function () {
        Route::get('/', [TargetNumberController::class, 'index'])->name('target-numbers');
        Route::post('new', [TargetNumberController::class, 'create'])->name('create-target-number');
        Route::post('update', [TargetNumberController::class, 'update'])->name('update-target-number');
        Route::get('delete/{id}', [TargetNumberController::class, 'delete'])->name('delete-target-number');
    });

    // Quotes routes
    Route::group(['prefix' => 'quotes'], function () {
        Route::get('/', [QuoteController::class, 'index'])->name('quotes');
        Route::get('delete/{id}', [QuoteController::class, 'delete'])->name('delete-quote');
        Route::post('actions', [QuoteController::class, 'actions'])->name('actions-quote');
    });

    // Target Number routes
    Route::group(['prefix' => 'sms'], function () {
        Route::get('test', [SMSController::class, 'test']);
    });

    /* Test */
    Route::group(['prefix' => 'test'], function () {
        Route::get('open-ai', [TestController::class, 'openAI']);
        Route::get('print', [TestController::class, 'print']);
    });
});

// Webhook routes
Route::group(['prefix' => 'webhook'], function () {
    Route::get('subscribe', [WebhookController::class, 'subscribe'])->name('subscribe-webhook');
    Route::post('pushcallsoutboundhangup', [WebhookController::class, 'pushCallsOutBoundHangup'])->name('pushCallsOutBoundHangup');
    Route::post('pushmediarecordingnew', [WebhookController::class, 'pushMediaRecordingNew'])->name('pushMediaRecordingNew');
});

require __DIR__.'/auth.php';

Route::get('/{any}', [ServiceController::class, 'single'])->where('any', '.*')->name('pages');
