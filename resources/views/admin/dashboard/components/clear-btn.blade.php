
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-end align-items-center">
                @foreach($prizes as $prize)
                    @if ($prize->winner)
                        {{ Form::open(
                            [
                                'url' => route('admin.clear-winners'), 
                                'method' => 'post'
                            ]
                        ) }}
                            <button class="btn btn-primary"> {{ __('Clear Winners') }}</button>
                        {{ Form::close() }}
                        <span class="mx-3">{{ __('Or')}} </span>
                    @break
                    @endif
                @endforeach
                {{ Form::open(
                    [
                        'url' => route('admin.re-seed'), 
                        'method' => 'post'
                    ]
                ) }}
                    <button class="btn btn-primary"> {{ __('Re-Seed') }}</button>
                {{ Form::close() }}
                <span class="mx-5">|</span>
                {{ Form::open(
                    [
                        'url' => route('admin.logout'), 
                        'method' => 'post'
                    ]
                ) }}
                    <button class="btn btn-primary"> {{ __('Logout') }}</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
        
