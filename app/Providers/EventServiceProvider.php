<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ServiceParis;
use App\Models\Shop;
use App\Models\ShopThumb;
use App\Models\SubCategory;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\YogaClass;
use App\Models\YogaStudio;
use App\Observers\AboutUsObserver;
use App\Observers\AppointmentObserver;
use App\Observers\BlogObserver;
use App\Observers\BannerObserver;
use App\Observers\ShopObserver;
use App\Observers\ShopThumbObserver;
use App\Observers\CategoryObserver;
use App\Observers\ClassObserver;
use App\Observers\CouponObserver;
use App\Observers\ProductObserver;
use App\Observers\ServiceParisObserver;
use App\Observers\SubCategoryObserver;
use App\Observers\TeamObserver;
use App\Observers\TestimonialObserver;
use App\Observers\YogaStudioObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        YogaClass::observe(ClassObserver::class);
        ServiceParis::observe(ServiceParisObserver::class);
        SubCategory::observe(SubCategoryObserver::class);
        Product::observe(ProductObserver::class);
        Testimonial::observe(TestimonialObserver::class);
        Blog::observe(BlogObserver::class);
        Appointment::observe(AppointmentObserver::class);
        Coupon::observe(CouponObserver::class);
        Banner::observe(BannerObserver::class);
        Shop::observe(ShopObserver::class);
        ShopThumb::observe(ShopThumbObserver::class);
        AboutUs::observe(AboutUsObserver::class);
        Team::observe(TeamObserver::class);
        YogaStudio::observe(YogaStudioObserver::class);
    }
}
