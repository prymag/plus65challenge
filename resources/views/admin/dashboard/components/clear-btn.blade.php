@foreach($prizes as $prize)
    @if ($prize->winner)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end">
                        {{ Form::open(
                            [
                                'url' => route('admin.clear-winners'), 
                                'method' => 'post'
                            ]
                        ) }}
                            <button class="btn btn-primary"> {{ __('Clear Winners') }}</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        @break
    @endif
@endforeach