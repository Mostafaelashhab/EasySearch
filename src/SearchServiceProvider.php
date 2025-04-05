<?php

namespace EasySearch\src;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * التحقق من إمكانية تسجيل الـ Trait في الموديلات.
     *
     * @return void
     */
    public function boot()
    {
        // تسجيل الـ Trait بحيث يتم تحميله عند استخدامه
        // بذلك يمكن للمستخدمين استخدام الـ Trait مباشرة في الموديلات
        // نحن نفترض أن الـ Trait موجود داخل مجلد EasySearch/src
        // ويجب أن يتأكد المستخدم من تضمين الـ Trait في موديلاته بشكل يدوي

        // ليس من الضروري إضافة شيء هنا إن كنت تريد فقط أن يضيف المستخدم الـ Trait يدوياً.
    }

    public function register()
    {
        // تسجيل أي خدمات أو إعدادات إضافية هنا إذا كان هناك حاجة لذلك
    }
}
