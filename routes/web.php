<?php

use App\Models\SeoSetting;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEOController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RollController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SocialurlController;
use App\Http\Controllers\YogaClassController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\YogaStudioController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClassBannerSettingController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ColorSettingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ThemeSettingController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\MailSettingController;
use App\Http\Controllers\ServiceClassBannerSettingController;
use App\Http\Controllers\ServiceParisController;
use App\Models\ServiceClassBannerSetting;

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

// Route::group(['middleware' => 'visitor_log'], function(){
//     Route::get('/', function () {
//         return redirect('login');
//     });
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admin.index');
// })->name('dashboard');

Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
    // \App::setLocale($locale);
    // dd(\App::getLocale());
    return back();
})->name('locale');

// Admin Group Route
Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    // AdminController
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('users/list', [AdminController::class, 'userList'])->name('users.index');
    Route::get('users/create', [AdminController::class, 'userCreate'])->name('users.create');
    Route::post('users/store', [AdminController::class, 'userStore'])->name('users.store');
    Route::get('users/edit/{id}', [AdminController::class, 'userEdit'])->name('users.edit');
    Route::post('users/update/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    Route::get('users/details/{id}', [AdminController::class, 'userDetaile'])->name('users.details');
    Route::get('users/{id}/destroy', [AdminController::class, 'userDestroy'])->name('users.destroy');
    Route::post('users/permission/action', [AdminController::class, 'userPermission'])->name('users.permission.action');

    Route::get('role/index', [RoleController::class, 'index'])->name('role.index');
    Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
    Route::post('role/update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::post('role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    Route::get('role/view/{id}', [RoleController::class, 'details'])->name('role.details');
    Route::post('role/perission', [RoleController::class, 'permission'])->name('role.permission');

    // banner controller
    Route::resource('banner', BannerController::class);
    Route::post('/banner-all-delete', [BannerController::class, 'mass_delete'])->name('banner.mass_action');
    Route::get('/banner-date-filter', [BannerController::class, 'bannerDateFilter'])->name('banner.date.filter');

    // about controller
    Route::resource('about', AboutUsController::class);

    // shop controller
    Route::resource('shop', ShopController::class);
    Route::post('/shop-all-delete', [ShopController::class, 'mass_delete'])->name('shop.mass_action');
    Route::get('/shop-date-filter', [ShopController::class, 'shopDateFilter'])->name('shop.date.filter');
    Route::post('/shop-shop_thumb_single_delete-filter', [ShopController::class, 'shop_thumb_single_delete'])->name('shop_thumb_single_delete');
    Route::get('/shop-banner', [ShopController::class, 'shopbanner_index'])->name('shopbanner.index');
    Route::put('/shop-banner-update/{id}', [ShopController::class, 'shopbanner_update'])->name('shopbanner.update');

    // CategoryController
    Route::get('/category-date-filter', [CategoryController::class, 'categoryDateFilter'])->name('category.date.filter');
    Route::post('category/pre/import', [CategoryController::class, 'preImport'])->name('category.pre.import');
    Route::post('category/import', [CategoryController::class, 'import'])->name('category.import');
    Route::post('/categories-all-delete', [CategoryController::class, 'mass_delete'])->name('categories.mass_action');
    Route::post('/categories-all-export', [CategoryController::class, 'mass_export'])->name('categories.mass_export');
    Route::resource('categories', CategoryController::class);

    // SubCategoryController
    Route::get('/subcategory-date-filter', [SubCategoryController::class, 'subcategoryDateFilter'])->name('subcategory.date.filter');
    Route::post('subcategory/pre/import', [SubCategoryController::class, 'preImport'])->name('subcategory.pre.import');
    Route::post('subcategory/import', [SubCategoryController::class, 'import'])->name('subcategory.import');
    Route::post('/subcategories-all-delete', [SubCategoryController::class, 'mass_delete'])->name('subcategories.mass_action');
    Route::post('/subcategories-all-export', [SubCategoryController::class, 'mass_export'])->name('subcategories.mass_export');
    Route::resource('subcategories', SubCategoryController::class);

    // ProductController
    Route::post('/product-gallery-delete', [ProductController::class, 'gallery_delete'])->name('products.gallery.delete');
    Route::post('/get-subcategory', [ProductController::class, 'getsubcategory'])->name('get.subcategory');
    Route::get('/product-search', [ProductController::class, 'productSearch'])->name('product.search');
    Route::post('product/pre/import', [ProductController::class, 'preImport'])->name('product.pre.import');
    Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
    Route::post('/product-all-export', [ProductController::class, 'mass_export'])->name('products.mass_export');
    Route::resource('products', ProductController::class);

    // TestimonialController
    Route::get('/testimonial-date-filter', [TestimonialController::class, 'testimonialDateFilter'])->name('testimonial.date.filter');
    Route::post('testimonial/pre/import', [TestimonialController::class, 'preImport'])->name('testimonial.pre.import');
    Route::post('testimonial/import', [TestimonialController::class, 'import'])->name('testimonial.import');
    Route::post('/testimonials-all-delete', [TestimonialController::class, 'mass_delete'])->name('testimonials.mass_action');
    Route::post('/testimonials-all-export', [TestimonialController::class, 'mass_export'])->name('testimonials.mass_export');
    Route::resource('testimonials', TestimonialController::class);

    // TeamController
    Route::resource('team', TeamController::class);
    Route::post('/team-all-delete', [TeamController::class, 'mass_delete'])->name('team.mass_action');
    Route::get('/team-date-filter', [TeamController::class, 'teamDateFilter'])->name('team.date.filter');

    // StudioController
    Route::post('/studio-all-delete', [YogaStudioController::class, 'mass_delete'])->name('studio.mass_action');
    Route::get('/studio-date-filter', [YogaStudioController::class, 'studioDateFilter'])->name('studio.date.filter');
    Route::resource('studio', YogaStudioController::class);



    // BlogController
    Route::get('/blog-search', [BlogController::class, 'blogSearch'])->name('blogs.search');
    Route::post('blog/pre/import', [BlogController::class, 'preImport'])->name('blog.pre.import');
    Route::post('blogs/import', [BlogController::class, 'import'])->name('blogs.import');
    Route::post('/blog-all-export', [BlogController::class, 'mass_export'])->name('blogs.mass_export');
    Route::resource('blogs', BlogController::class);

    //  GeneralSettingController
    Route::get('/stripe/index', [GeneralSettingController::class, 'stripeIndex'])->name('stripe.index');
    Route::post('admin/stripe/store', [GeneralSettingController::class, 'stripeStore'])->name('admin.stripe.store');
    Route::resource('generalSettings', GeneralSettingController::class);

    //  ColorSettingController
    Route::resource('colorSettings', ColorSettingController::class);

    //  SocialurlController
    Route::post('social/status/change', [SocialurlController::class, 'statusChange'])->name('social.status.change');
    Route::resource('socialurls', SocialurlController::class);

    //Appointment
    Route::get('admin/appointment/index',[AppointmentController::class , 'index'])->name('appointment.index');
    Route::post('admin/appointment/store',[AppointmentController::class , 'store'])->name('appointment.store');
    Route::post('admin/appointment/update/{id}',[AppointmentController::class , 'update'])->name('appointment.update');
    Route::post('admin/appointment/delete/{id}',[AppointmentController::class , 'delete'])->name('appointment.delete');
    Route::get('admin/appointment/date_filter',[AppointmentController::class , 'DateFilter'])->name('appointment.dateFilter');
    Route::post('admin/appointment/import',[AppointmentController::class , 'import'])->name('appointment.import');
    Route::post('admin/appointment/export',[AppointmentController::class , 'mass_export'])->name('appointment.export');
    Route::post('admin/appointment/bulk/delete',[AppointmentController::class , 'mass_delete'])->name('appointment.bulk.delete');
    Route::post('admin/appointment/pre/import',[AppointmentController::class , 'pre_import'])->name('appointment.pre.import');


    //Client
    Route::get('admin/client/index',[ClientController::class , 'index'])->name('client.index');
    Route::post('admin/client/store',[ClientController::class , 'store'])->name('client.store');
    Route::post('admin/client/update/{id}',[ClientController::class , 'update'])->name('client.update');
    Route::post('admin/client/delete/{id}',[ClientController::class , 'delete'])->name('client.delete');
    Route::get('admin/client/date_filter',[ClientController::class , 'DateFilter'])->name('client.dateFilter');
    Route::post('admin/client/import',[ClientController::class , 'import'])->name('client.import');
    Route::post('admin/client/export',[ClientController::class , 'mass_export'])->name('client.export');
    Route::post('admin/client/bulk/delete',[ClientController::class , 'mass_delete'])->name('client.bulk.delete');
    Route::post('admin/client/pre/import',[ClientController::class , 'pre_import'])->name('client.pre.import');

    // OrderController
    Route::get('/order-date-filter', [OrderController::class, 'orderDateFilter'])->name('order.date.filter');
    Route::post('order/pre/import', [OrderController::class, 'preImport'])->name('order.pre.import');
    Route::post('order/import', [OrderController::class, 'import'])->name('order.import');
    Route::post('/orders-all-delete', [OrderController::class, 'mass_delete'])->name('orders.mass_action');
    Route::post('/orders-all-export', [OrderController::class, 'mass_export'])->name('orders.mass_export');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('orders/{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::post('orders/destroy', [OrderController::class, 'ordersDestroy'])->name('orders.destroy');
    Route::get('orders/search', [OrderController::class, 'ordersSearch'])->name('orders.search');
    Route::post('order/bulk/delete', [OrderController::class, 'orderBulkDelete'])->name('order.bulk.delete');
    Route::post('order/status/change', [OrderController::class, 'orderStatusChange'])->name('order.status.change');

    // RefundController
    Route::get('/refund/{id}/full', [RefundController::class, 'refundFull'])->name('refund.full');
    Route::post('/refund/partial', [RefundController::class, 'refundPartial'])->name('refund.partial');

    // CouponController
    Route::get('/coupon-date-filter', [CouponController::class, 'couponDateFilter'])->name('coupon.date.filter');
    Route::post('coupon/pre/import', [CouponController::class, 'preImport'])->name('coupon.pre.import');
    Route::post('coupon/import', [CouponController::class, 'import'])->name('coupon.import');
    Route::post('/coupons-all-delete', [CouponController::class, 'mass_delete'])->name('coupons.mass_action');
    Route::post('/coupons-all-export', [CouponController::class, 'mass_export'])->name('coupons.mass_export');
    Route::post('/coupon-check', [CouponController::class, 'couponCheck'])->name('coupon.check');
    Route::resource('coupons', CouponController::class);


    //Invoice
    Route::get('/invoice/index',[InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::get('/invoice/create',[InvoiceController::class, 'create'])->name('admin.invoice.create');
    Route::post('/invoice/store',[InvoiceController::class, 'store'])->name('admin.invoice.store');
    Route::get('/invoice/edit/{id}',[InvoiceController::class, 'edit'])->name('admin.invoice.edit');
    Route::post('/invoice/update/{id}',[InvoiceController::class, 'update'])->name('admin.invoice.update');
    Route::get('/invoice/delete/{id}',[InvoiceController::class, 'delete'])->name('admin.invoice.delete');

    //  ContactController
    Route::resource('contacts', ContactController::class);
    Route::get('/contact/messages',[ContactController::class, 'messages'])->name('message.index');
    Route::get('/contact/messages',[ContactController::class, 'messages'])->name('message.index');
    Route::get('/contact/message/show/{id}',[ContactController::class, 'message_show'])->name('message_show');
    Route::delete('/contact/message/delete/{id}',[ContactController::class, 'message_destroy'])->name('message.destroy');
    Route::post('/message-all-delete', [ContactController::class, 'mass_delete'])->name('message.mass_action');
    Route::get('/message-date-filter', [ContactController::class, 'messageDateFilter'])->name('message.date.filter');


    // Seo Settings
    Route::get('seo-settings', [SeoSettingController::class, 'index'])->name('seo.index');
    Route::put('home_seo_setting/{id}', [SeoSettingController::class, 'home_seo_setting'])->name('home_seo_setting');
    Route::put('about_seo_setting/{id}', [SeoSettingController::class, 'about_seo_setting'])->name('about_seo_setting');
    Route::put('contact_seo_setting/{id}', [SeoSettingController::class, 'contact_seo_setting'])->name('contact_seo_setting');


    //  SubscriberController
    Route::post('/subscriber-all-delete', [SubscriberController::class, 'mass_delete'])->name('subscriber.mass_action');
    Route::get('/subscriber-date-filter', [SubscriberController::class, 'subscriberDateFilter'])->name('subscriber.date.filter');

    // ServiceParisController

    Route::get('service-paris', [ServiceParisController::class, 'index'])->name('serviceParis.index');
    Route::get('service-paris/create', [ServiceParisController::class, 'create'])->name('serviceParis.create');
    Route::post('service-paris/store', [ServiceParisController::class, 'store'])->name('serviceParis.store');
    Route::get('service-paris/search', [ServiceParisController::class, 'search'])->name('serviceParis.search');
    Route::get('service-paris/edit/{id}', [ServiceParisController::class, 'edit'])->name('serviceParis.edit');
    Route::post('service-paris/update/{id}', [ServiceParisController::class, 'update'])->name('serviceParis.update');
    Route::post('service-paris/destroy', [ServiceParisController::class, 'destroy'])->name('serviceParis.destroy');


    
    //Yoga Service Gallary
    Route::get('service-paris/gallery/index/{id}',[ServiceParisController::class, 'ClassGallery'])->name('service.gallery.index');
    Route::post('service-paris/gallery/store',[ServiceParisController::class, 'ClassGalleryStore'])->name('service.gallery.store');
    Route::post('service-paris/gallery/update/{id}',[ServiceParisController::class, 'ClassGalleryUpdate'])->name('service.gallery.update');
    Route::post('service-paris/gallery/delete/{id}',[ServiceParisController::class, 'ClassGalleryDelete'])->name('service.gallery.delete');
    Route::post('service-paris/price/item/delete',[ServiceParisController::class, 'pricingItemImageDelete'])->name('service.pricing.item.image.delete');
    Route::post('service-paris/gallery/image/reorder',[ServiceParisController::class, 'galleryOrderUpdate'])->name('service.gallery.order.update');




    // Yoga Class Controller
    Route::get('/yogaclass', [YogaClassController::class, 'index'])->name('yogaclass.index');
    Route::get('/yogaclass/create', [YogaClassController::class, 'create'])->name('yogaclass.create');
    Route::post('yogaclass/store', [YogaClassController::class, 'store'])->name('yogaclass.store');
    Route::get('yogaclass/search', [YogaClassController::class, 'search'])->name('yogaclass.search');
    Route::get('yogaclass/edit/{id}', [YogaClassController::class, 'edit'])->name('yogaclass.edit');
    Route::post('/yogaclass/update', [YogaClassController::class, 'update'])->name('yogaclass.update');
    Route::post('yogaclass/destroy', [YogaClassController::class, 'destroy'])->name('yogaclass.destroy');
    Route::get('yogaclass/pricing/{id}', [YogaClassController::class, 'yogaclassPricing'])->name('yogaclass.pricing');
    Route::post('class/pricing/info/update', [YogaClassController::class, 'classPricingInfoUpdate'])->name('class.pricing.info.update');
    Route::post('class/pricing/date/store', [YogaClassController::class, 'classPricingDateStore'])->name('class.pricing.date.store');
    Route::post('class/pricing/delete', [YogaClassController::class, 'classPricingDelete'])->name('class.pricing.delete');
    // Route::post('class/pricing/item/image/delete', [YogaClassController::class, 'pricingItemImageDelete'])->name('c');
    Route::post('class/pricing/add/more', [YogaClassController::class, 'classPricingAddMore'])->name('class.pricing.add.more');
    Route::post('clas/.pricing/item/delete', [YogaClassController::class, 'classPricingItemDelete'])->name('class.pricing.item.delete');
    Route::post('class/pricing/update/more', [YogaClassController::class, 'classPricingUpdateMore'])->name('class.pricing.update.more');

    //Yoga class Gallary
    Route::get('class/gallery/index/{id}',[YogaClassController::class, 'ClassGallery'])->name('class.gallery.index');
    Route::post('class/gallery/store',[YogaClassController::class, 'ClassGalleryStore'])->name('class.gallery.store');
    Route::post('class/gallery/update/{id}',[YogaClassController::class, 'ClassGalleryUpdate'])->name('class.gallery.update');
    Route::post('class/gallery/delete/{id}',[YogaClassController::class, 'ClassGalleryDelete'])->name('class.gallery.delete');
    Route::post('class/price/item/delete',[YogaClassController::class, 'pricingItemImageDelete'])->name('class.pricing.item.image.delete');
    Route::post('class/gallery/image/reorder',[YogaClassController::class, 'galleryOrderUpdate'])->name('class.gallery.order.update');

    Route::get('/api/language/edit', [LanguageController::class, 'lang_edit'])->name('lang_edit.index');
    Route::post('/api/lang/update', [LanguageController::class, 'lang_update'])->name('lang_update');

    //Yoga Class Banner Setting
    Route::post('class/banner/setting/{id}',[ClassBannerSettingController::class, 'update'])->name('yogaClass.banner.update');
    Route::post('service-paris/banner/setting/{id}',[ServiceClassBannerSettingController::class, 'update'])->name('serviceParis.banner.update');


    // My Profile
    Route::get('my-profile', [AdminController::class, 'myProfile'])->name('my-profile');
    Route::post('my-profile/update', [AdminController::class, 'myProfileUpdate'])->name('my-profile.update');
    Route::post('password/update', [AdminController::class, 'passwordUpdate'])->name('password.updates');

    //Gallery 
    Route::get('/gallery/index',[GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create',[GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery/store',[GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/gallery/edit/{id}',[GalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::get('/gallery/image/details/{id}',[GalleryController::class, 'view'])->name('admin.gallery.details');
    Route::post('/gallery/image/order/update',[GalleryController::class, 'imageReorder'])->name('admin.gallery.image.update');
    Route::post('/gallery/update/{id}',[GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::post('/gallery/delete/{id}',[GalleryController::class, 'delete'])->name('admin.gallery.delete');
    Route::post('/gallery/single_image/delete',[GalleryController::class, 'singleDelete'])->name('admin.gallery.image.delete');
    Route::post('/gallery/banner/update/{id}',[GalleryController::class, 'bannerUpdate'])->name('admin.banner.update');

    Route::post('admin/bulk/email/subscribtion',[AdminController::class, 'bulkSubscribtionEmail'])->name('admin.bulk.email');

    Route::get('admin/email/setting/index', [MailSettingController::class, 'index'])->name('admin.email.setting.index');
    Route::post('admin/email/setting/{id}', [MailSettingController::class, 'update'])->name('admin.email.setting');

});

    // My Profile
    // Route::get('my-profile', [AdminController::class, 'myProfile'])->name('my-profile');

// ThemeSettingController
Route::get('theme-color', [ThemeSettingController::class, 'color'])->name('theme.color');
Route::get('theme-toggle', [ThemeSettingController::class, 'toggle'])->name('theme.toggle');

//  SubscriberController
Route::resource('subscribers', SubscriberController::class);


Route::group(['middleware' => ['visitor_log','active_client']], function(){
    
    Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');
    Route::get('shop/',[FrontendController::class, 'shop'])->name('shop');
    Route::get('/single_product/{slug}',[FrontendController::class, 'single_product'])->name('single_product');
    Route::post('/shops-load-more', [FrontendController::class, 'shops_load_more'])->name('shops.load_more');
    Route::get('about/',[FrontendController::class, 'about'])->name('about');
    Route::get('blog/',[FrontendController::class, 'blog'])->name('blog');
    Route::post('/blogs-load-more', [FrontendController::class, 'blogs_load_more'])->name('blogs.load_more');
    Route::get('/single_post/{slug}',[FrontendController::class, 'single_post'])->name('single_post');
    Route::get('events/',[FrontendController::class, 'events'])->name('events');
    Route::get('contact/',[FrontendController::class, 'contact'])->name('contact');
    Route::get('checkout/',[FrontendController::class, 'checkout'])->name('checkout');
    Route::get('cart/',[FrontendController::class, 'cart'])->name('cart');
    Route::post('cart/add',[FrontendController::class, 'cartAdd'])->name('cart.add');
    Route::get('cart/remove/{id}', [FrontendController::class, 'cartRemove'])->name('cart.remove');
    
    Route::get('classes/',[FrontendController::class, 'classes'])->name('classes');
    Route::get('class/details/{slug}/{id}', [FrontendController::class, 'classDetails'])->name('class.details');
    Route::get('/404/page',[FrontendController::class, 'page_404'])->name('404');
    Route::post('/cart/checkout', [FrontendController::class, 'cartCheckout'])->name('cart.checkout');
    Route::post('checkout/payment', [FrontendController::class, 'checkoutPayment'])->name('checkout.payment');
    Route::post('class/join/payment', [FrontendController::class, 'classJoinPayment'])->name('class.join.payment');
    Route::post('coupon/check', [FrontendController::class, 'couponCheck'])->name('class.coupon.check');
    Route::post('class/date/change', [FrontendController::class, 'classDateChange'])->name('class.date.change');
    // contact message
    Route::post('contact_message', [ContactController::class, 'contact_message'])->name('contact_message');

    Route::get('gallery/',[FrontendController::class, 'gallery'])->name('gallery');
    Route::get('gallery/details/{slug}',[FrontendController::class, 'galleryDetails'])->name('gallery.details');

    Route::get('service-paris/',[FrontendController::class, 'serviceParis'])->name('service.paris.index');
    Route::get('service-paris/details/{slug}/{id}', [FrontendController::class, 'serviceDetails'])->name('service.paris.details');
});

































































