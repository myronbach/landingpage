<div class="wrapper container-fluid">

    {!! Form::open(['url'=>route('pagesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Назва', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'plaсeholder'=>'Введіть назву сторінки']) !!}
            @if ($errors->has('name'))
                <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('alias') ? ' has-error' : '' }}">
        {!! Form::label('alias', 'Псевдонім:', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class'=>'form-control', 'plaсeholder'=>'Введіть псевдонім сторінки']) !!}
            @if ($errors->has('alias'))
                <span class="help-block"> <strong>{{ $errors->first('alias') }}</strong> </span>
            @endif
        </div>
    </div>

    <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
        {!! Form::label('text', 'Текст:', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor','class'=>'form-control']) !!}
            @if ($errors->has('text'))
                <span class="help-block"> <strong>{{ $errors->first('text') }}</strong> </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Зображення', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class'=>'filestyle', 'data-buttonText'=>'Виберіть зображення',
            'data-buttonName'=>"btn-primary", 'data-placeholder'=>"Файл відсутній"]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Зберегти',['class'=>'btn btn-primary', 'type'=>'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor')
    </script>

</div>
