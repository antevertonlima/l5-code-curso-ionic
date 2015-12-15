<div class="form-group">
	{!! Form::label('Status', 'Status:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('status', $list_status, null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
	{!! Form::label('Deliveriman', 'Entregador:',['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('deliveryman_id', $list_status, null,['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>