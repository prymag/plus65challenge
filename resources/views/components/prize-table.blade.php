<div class="table-wrapper">
    <table class="table table-striped table-dark text-center mb-0">
        <thead>
            <tr>
                <th colspan="100" class="text-center">
                    <h3 class="m-0">{{ __($key) }}</h3>
                </th>
            </tr>
            <tr>
                <th class="text-center">{{__('Member Name')}}</th>
                <th class="text-center">{{__("Winning Number")}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prizes as $key => $prize)
    
                @if (!$prize->winner)
                    @continue
                @endif
    
                <tr>
                    <td class="text-center">
                        {{ $prize->winner->member->name }}
                    </td>
                    <td class="text-center">
                        {{ $prize->winner->winning_number->number }}
                    </td>    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>