@if($errors->any())


    <div class="form-group form-group-last">

        @foreach($errors->all() as $error)
        <div class="alert alert-secondary" role="alert">

            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                <div class="alert-text" style="color: red; ">
                    {{ $error }}
                </div>
        </div>
        @endforeach

    </div>

@endif
