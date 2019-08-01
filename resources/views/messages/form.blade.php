<div class="form-group {{ $errors->has('contact_id') ? 'has-error' : ''}}">
    <label for="contact_id" class="control-label">{{ 'Contact Id' }}</label>
    <select name="contact_id" class="form-control" id="contact_id" >
    @foreach ($contacts as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($message->contact_id) && $message->contact_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('contact_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="control-label">{{ 'Descricao' }}</label>
    <textarea class="form-control" rows="5" name="descricao" type="textarea" id="descricao" >{{ isset($message->descricao) ? $message->descricao : ''}}</textarea>
    {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
