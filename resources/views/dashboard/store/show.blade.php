
<div class="kt-portlet kt-portlet--height-fluid">

    <div class="kt-widget kt-widget--user-profile-2 ml-4 mr-5 mb-2">
        <div class="kt-widget__body">

            <div class="kt-widget__item">
<div class="kt-widget__item">
    <div class="kt-widget__contact">
        <span class="kt-widget__label">اسم المخزن</span>
        <a id="store_name" class="kt-widget__data">{{ $store->name }}</a>
    </div>
    <div class="kt-widget__contact">
        <span class="kt-widget__label">العنوان</span>
        <a href="#" id="address" class="kt-widget__data">{{ $store->address }}</a>
    </div>
    <div class="kt-widget__contact">
        <span class="kt-widget__label">تاريخ بداية الأيجار</span>
        <span id="rental_date" class="kt-widget__data">{{ $store->rental_date  }}</span>
    </div>
    <div class="kt-widget__contact">
        <span class="kt-widget__label">مدة  الأيجار</span>
        <span id="rental_expire_date" class="kt-widget__data">{{ $store->duration_of_the_rental == 1 ?'سنوي':'شهري' }}</span>
    </div>

    <div class="kt-widget__contact">
        <span class="kt-widget__label">المبلغ للأيجار</span>
        <span id="rental_salary" class="kt-widget__data">{{ $store->rental_salary }}</span>
    </div>


</div>
            </div></div></div></div>
