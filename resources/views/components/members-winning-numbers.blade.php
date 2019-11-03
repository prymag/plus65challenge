<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th colspan="100" class="text-center">{{ 'Members Winning Numbers'}}</th>
                        </tr>
                        <tr>
                            <th>{{__('Membe Name')}}</th>
                            @for ($i = 1; $i <= $crosstab['max']; $i++)
                                <th class="text-center">{{ __('Winning Number') }} {{$i}}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($crosstab['collection'] as $item)
                            <tr>
                                <td>{{$item['name']}}</td>
                                @foreach ($item['numbers'] as $number)
                                <td class="text-center">{{$number}}</td>    
                                @endforeach
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>