<div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
    <label for="cliente_id" class="control-label">{{ 'Cliente Id' }}</label>
    <input class="form-control" name="cliente_id" type="number" id="cliente_id" value="{{ isset($logentrada->cliente_id) ? $logentrada->cliente_id : ''}}" >
    {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('evento_id') ? 'has-error' : ''}}">
    <label for="evento_id" class="control-label">{{ 'Evento Id' }}</label>
    <input class="form-control" name="evento_id" type="number" id="evento_id" value="{{ isset($logentrada->evento_id) ? $logentrada->evento_id : ''}}" >
    {!! $errors->first('evento_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('horaEntrada') ? 'has-error' : ''}}">
    <label for="horaEntrada" class="control-label">{{ 'Horaentrada' }}</label>
    <input class="form-control" name="horaEntrada" type="time" id="horaEntrada" value="{{ isset($logentrada->horaEntrada) ? $logentrada->horaEntrada : ''}}" >
    {!! $errors->first('horaEntrada', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechaEntrada') ? 'has-error' : ''}}">
    <label for="fechaEntrada" class="control-label">{{ 'Fechaentrada' }}</label>
    <input class="form-control" name="fechaEntrada" type="date" id="fechaEntrada" value="{{ isset($logentrada->fechaEntrada) ? $logentrada->fechaEntrada : ''}}" >
    {!! $errors->first('fechaEntrada', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigoDeEntrada') ? 'has-error' : ''}}">
    <label for="codigoDeEntrada" class="control-label">{{ 'Codigodeentrada' }}</label>
    <input class="form-control" name="codigoDeEntrada" type="text" id="codigoDeEntrada" value="{{ isset($logentrada->codigoDeEntrada) ? $logentrada->codigoDeEntrada : ''}}" >
    {!! $errors->first('codigoDeEntrada', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
