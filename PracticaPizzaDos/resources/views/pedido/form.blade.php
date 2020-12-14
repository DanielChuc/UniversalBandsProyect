<div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
    <label for="cliente_id" class="control-label">{{ 'Cliente Id' }}</label>
    <input class="form-control" name="cliente_id" type="number" id="cliente_id" value="{{ isset($pedido->cliente_id) ? $pedido->cliente_id : ''}}" >
    {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion_Envio') ? 'has-error' : ''}}">
    <label for="direccion_Envio" class="control-label">{{ 'Direccion Envio' }}</label>
    <input class="form-control" name="direccion_Envio" type="text" id="direccion_Envio" value="{{ isset($pedido->direccion_Envio) ? $pedido->direccion_Envio : ''}}" >
    {!! $errors->first('direccion_Envio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
