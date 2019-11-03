<div class="card text-white bg-dark">
    <div class="card-header text-center">
        <h4 class="m-0">{{__("table-titles.{$key}")}}</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($prizes as $key => $prize)
                @if (!$prize->winner)
                    @continue
                @endif
                <div class="winners col text-center mb-3">
                    {{$prize->position}}
                    <h5 class="m-0">{{ $prize->winner->winning_number->number }}</h5>
                    <h6 class="m-0">{{ $prize->winner->member->name }}</h6>
                </div>
            @endforeach
        </div>
    </div>
</div>