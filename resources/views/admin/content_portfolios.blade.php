<div class="container" >


<div class="row" style="margin: 0px 50px 0px 50px">


    @if($portfolios)

        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Назва портфоліо</th>
                <th>Фільтр</th>
                <th>Дата створення</th>
                <th>Видалити</th>
            </tr>
            </thead>
            <tbody>
            @foreach($portfolios as $k=>$portfolio)
                <tr>
                    <td>{{$portfolio->id}}</td>
                    <td>{!! Html::link(route('portfolioEdit', ['portfolio'=>$portfolio->id]), $portfolio->name,['alt'=>$portfolio->name]) !!}</td>
                    <td>{{$portfolio->filter}}</td>
                    <td>{{$portfolio->created_at}}</td>
                    {{--посилання для видалення певної сторінки. --}}
                    <td>
                        {!! Form::open(['url'=>route('portfolioEdit',['portfolio'=>$portfolio->id]),'class'=>'form-horizontal', 'method'=>'POST']) !!}

                        {{-- емуляція методу delete функцією Laravel--}}
                        {{method_field('DELETE')}}
                        {!! Form::button('Видалити', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}

                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

    {!! Html::link(route('portfolioAdd'), 'Нове портфоліо') !!}

</div>
</div>
