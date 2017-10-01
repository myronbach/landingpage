<div class="container">

    <div class="row">
        @if($services)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Назва сервісу</th>
                    <th>Текст</th>
                    <th>Значок</th>
                    <th>Дата створення</th>
                    <th>Видалити</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td><a href="{{route('serviceEdit', ['service'=>$service->id])}}">{{$service->name}}</a></td>
                        <td>{{$service->text}}</td>
                        <td><i class="fa {{$service->icon}}"></i></td>
                        <td>{{$service->created_at}}</td>
                        <td>
                            <form action="{{route('serviceEdit', ['service'=>$service->id])}}" class="form-horizontal" method="post">
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

            <a href="{{route('serviceAdd')}}">Новий сервіс</a>
    </div>

</div>
