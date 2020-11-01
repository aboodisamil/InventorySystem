<div class="kt-portlet kt-portlet--height-fluid">

    <div class="kt-widget kt-widget--user-profile-2 ml-4 mr-5 mb-2">
        <div class="kt-widget__body">
            <div class="kt-widget__item">
                <div class="kt-widget__contact">
                    <span class="kt-widget__label">شركة التوريد</span>
                    <a id="supplier" class="kt-widget__data">{{ $supplier->supplier }}</a>
                </div>
                <div class="kt-widget__contact">
                    <span class="kt-widget__label">اسم المورد:</span>
                    <a id="contact_person" href="#" class="kt-widget__data">{{ $supplier->contact_person }}</a>
                </div>
                <div class="kt-widget__contact">
                    <span class="kt-widget__label">الرقم للتواصل</span>
                    <span id="phone" class="kt-widget__data">{{ $supplier->phone }}</span>
                </div>
            </div>
        </div>


        <div class="kt-widget__contact  ">
            <br>
            <span class="kt-widget__label  mb-6" style="font-size: 14px;font-weight: bold" > الأصناف الموردة</span>
            <br>
            <br>

            <span id="category_name" class="badge badge-info" style="font-size: 12px">
              {{  implode('-' ,$supplier->categories->pluck('name')->toArray()) }}
            </span>
        </div>

    </div>

    <!--end::Widget -->
</div>
