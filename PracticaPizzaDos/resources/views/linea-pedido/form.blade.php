<div class="form-group {{ $errors->has('pizza_id') ? 'has-error' : ''}}">
    <label for="pizza_id" class="control-label">{{ 'Pizza Id' }}</label>
    <input class="form-control" name="pizza_id" type="number" id="pizza_id" value="{{ isset($lineapedido->pizza_id) ? $lineapedido->pizza_id : ''}}" >
    {!! $errors->first('pizza_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pedido_id') ? 'has-error' : ''}}">
    <label for="pedido_id" class="control-label">{{ 'Pedido Id' }}</label>
    <input class="form-control" name="pedido_id" type="number" id="pedido_id" value="{{ isset($lineapedido->pedido_id) ? $lineapedido->pedido_id : ''}}" >
    {!! $errors->first('pedido_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="control-label">{{ 'Cantidad' }}</label>
    <input class="form-control" name="cantidad" type="number" id="cantidad" value="{{ isset($lineapedido->cantidad) ? $lineapedido->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
