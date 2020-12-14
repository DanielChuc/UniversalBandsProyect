<div class="form-group {{ $errors->has('evento_id') ? 'has-error' : ''}}">
    <label for="evento_id" class="control-label">{{ 'Evento Id' }}</label>
    <input class="form-control" name="evento_id" type="number" id="evento_id" value="{{ isset($eventopermitido->evento_id) ? $eventopermitido->evento_id : ''}}" >
    {!! $errors->first('evento_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('banda_id') ? 'has-error' : ''}}">
    <label for="banda_id" class="control-label">{{ 'Banda Id' }}</label>
    <input class="form-control" name="banda_id" type="number" id="banda_id" value="{{ isset($eventopermitido->banda_id) ? $eventopermitido->banda_id : ''}}" >
    {!! $errors->first('banda_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
