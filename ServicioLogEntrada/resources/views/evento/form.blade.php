<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($evento->nombre) ? $evento->nombre : ''}}" required>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="control-label">{{ 'Direccion' }}</label>
    <input class="form-control" name="direccion" type="text" id="direccion" value="{{ isset($evento->direccion) ? $evento->direccion : ''}}" required>
    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ isset($evento->descripcion) ? $evento->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pais') ? 'has-error' : ''}}">
    <label for="pais" class="control-label">{{ 'Pais' }}</label>
    <input class="form-control" name="pais" type="text" id="pais" value="{{ isset($evento->pais) ? $evento->pais : ''}}" required>
    {!! $errors->first('pais', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
    <label for="ciudad" class="control-label">{{ 'Ciudad' }}</label>
    <input class="form-control" name="ciudad" type="text" id="ciudad" value="{{ isset($evento->ciudad) ? $evento->ciudad : ''}}" required>
    {!! $errors->first('ciudad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechas') ? 'has-error' : ''}}">
    <label for="fechas" class="control-label">{{ 'Fechas' }}</label>
    <input class="form-control" name="fechas" type="datetime-local" id="fechas" value="{{ isset($evento->fechas) ? $evento->fechas : ''}}" >
    {!! $errors->first('fechas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('capacidad_Lugares') ? 'has-error' : ''}}">
    <label for="capacidad_Lugares" class="control-label">{{ 'Capacidad Lugares' }}</label>
    <input class="form-control" name="capacidad_Lugares" type="number" id="capacidad_Lugares" value="{{ isset($evento->capacidad_Lugares) ? $evento->capacidad_Lugares : ''}}" >
    {!! $errors->first('capacidad_Lugares', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lugares_Disponibles') ? 'has-error' : ''}}">
    <label for="lugares_Disponibles" class="control-label">{{ 'Lugares Disponibles' }}</label>
    <input class="form-control" name="lugares_Disponibles" type="number" id="lugares_Disponibles" value="{{ isset($evento->lugares_Disponibles) ? $evento->lugares_Disponibles : ''}}" >
    {!! $errors->first('lugares_Disponibles', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('categoria_id') ? 'has-error' : ''}}">
    <label for="categoria_id" class="control-label">{{ 'Categoria Id' }}</label>
    <input class="form-control" name="categoria_id" type="number" id="categoria_id" value="{{ isset($evento->categoria_id) ? $evento->categoria_id : ''}}" >
    {!! $errors->first('categoria_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
