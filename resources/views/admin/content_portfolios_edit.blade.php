<div class="wrapper container-fluid">

    <form class="form-horizontal" action="{{route('portfolioEdit', ['portfolio'=>$data['id']])}}" method="post" enctype="multipart/form-data">

        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            {{--приховане пол з id матеріалу для передачі у $request--}}
            <input type="hidden" name="id" value="{{$data['id']}}">

            <label for="name" class="col-xs-2 control-label">Назва:</label>
            <div class="col-xs-8">
                <input type="text" name="name" class="form-control"
                       placeholder="Введіть назву портфоліо" id="name" value="{{$data['name']}}">
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
                    <span class="help-block"> <strong></strong> </span>
                @endif
                <textarea name="text" class="form-control"  id="editor">{{$data['text']}}</textarea>
            </div>
        </div>
        {{--Відображення зображення зз БД. В прихованому полі шлях до малюнка з БД --}}
        <div class="form-group">
            <label for="old_images" class="col-xs-2 control-label">Зображення:</label>
            <div class="col-xs-offset-2 col-xs-10">
                <img src="/assets/img/{{$data['images']}}" class="img-thumbnail" alt="">
                <input type="hidden" name="old_images" id="old_images" value="{{$data['images']}}">
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

