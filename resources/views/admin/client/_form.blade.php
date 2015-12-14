<div class="form-group">
{!! Form::label('Name', 'Nome:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('user[name]', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Email', 'Email:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::email('user[email]', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Telefone', 'Telefone:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('phone', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Endereço', 'Endereço:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('address', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Cidade', 'Cidade:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('city', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('Estado', 'Estado:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('state', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('CEP', 'CEP:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('zipcode', null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>