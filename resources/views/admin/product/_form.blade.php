<div class="form-group">
{!! Form::label('Category', 'Categoria:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('category_id', $categories, null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group">
{!! Form::label('Name', 'Nome:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('name', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Description', 'Descrição:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('description', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Price', 'Preço:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('price', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>