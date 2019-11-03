<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="d-flex align-items-center justify-content-center">
                {{ Form::open(['url' => route('admin.generate-prizes'), 'method' => 'post']) }}
                    <button class="btn btn-primary"> {{ __('Lucky Draw') }}</button>
                {{ Form::close() }}
                <strong class="mx-3">{{ __('OR') }}</strong>
                <button class="btn btn-secondary" id="draw_toggle">{{ __('Manual Draw') }}</button>
            </div>
        </div>
    </div>
</div>