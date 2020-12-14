<div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}">
    <label for="cliente_id" class="control-label">{{ 'Cliente Id' }}</label>
    <input class="form-control" name="cliente_id" type="number" id="cliente_id" value="{{ isset($banda->cliente_id) ? $banda->cliente_id : ''}}" >
    {!! $errors->first('cliente_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control" name="codigo" type="text" id="codigo" value="{{ isset($banda->codigo) ? $banda->codigo : ''}}" required>
    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
