<div class="wrapper container-fluid">

    <form class="form-horizontal" action="{{route('portfolioAdd')}}" method="post" enctype="multipart/form-data">

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-xs-2 control-label">Назва:</label>
            <div class="col-xs-8">
                <input type="text" name="name" class="form-control"
                       placeholder="Введіть назву портфоліо" id="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <label for="filter" class="col-xs-2 control-label">Фільтр:</label>
            <div class="col-xs-8">
                <select class="form-control" name="filter" id="filter">
                    @foreach($filters as $filter)
                        <option value="{{$filter}}">{{$filter}}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
            <label for="editor" class="col-xs-2 control-label">Текст:</label>
            <div class="col-xs-8">
                @if ($errors->has('text'))
                    <span class="help-block"> <strong>{{ $errors->first('text') }}</strong> </span>
                @endif
                <textarea name="text" class="form-control"  id="editor">{{old('text')}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="images" class="col-xs-2 control-label">Зображення</label>
            <div class="col-xs-8">
                <input type="file" data-buttonText="Виберіть зображення" data-buttonName="btn-primary" name="images" class="filestyle"
                       data-placeholder="Файл відсутній" id="images">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button class="btn btn-primary" type="submit">Зберегти</button>
            </div>
        </div>
        {{csrf_field()}}

    </form>

    <script>
        CKEDITOR.replace('editor')
    </script>
</div>

