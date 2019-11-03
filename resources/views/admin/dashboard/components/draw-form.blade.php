{{ @session('show_form') }}
<div class="container-fluid" 
    id="draw_form_container" 
    @if(session('show_form'))style="display:block!important" @endif>
    <div class="row justify-content-center mb-0">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                {{ Form::open(['url' => route('admin.generate-prize'), 'method' => 'post']) }}
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="input-field">
                                {{ Form::select('prize_id', $prizes_options, $prize_id) }}
                                <label for="">{{ __('Prize')}}</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            {{ __('Randomize') }}
                            <div class="switch">
                                <label>
                                    No
                                    {{ Form::checkbox('randomized', 'on', $randomized, ['id' => 'rand_toggle']) }}
                                    <span class="lever"></span>
                                    Yes
                                </label>
                            </div>
                        </div>

                        <div class="input-field">
                            {{ Form::text('winning_number', $winning_number, ['id' => 'winning_number']) }}
                            <label for="">{{ __('Winning Number') }}</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary">{{ __('Draw')}}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>