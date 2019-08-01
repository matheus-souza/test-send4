<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    <label for="nome" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control" name="nome" type="text" id="nome" value="{{ isset($contact->nome) ? $contact->nome : ''}}" >
    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sobrenome') ? 'has-error' : ''}}">
    <label for="sobrenome" class="control-label">{{ 'Sobrenome' }}</label>
    <input class="form-control" name="sobrenome" type="text" id="sobrenome" value="{{ isset($contact->sobrenome) ? $contact->sobrenome : ''}}" >
    {!! $errors->first('sobrenome', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($contact->email) ? $contact->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
    <label for="telefone" class="control-label">{{ 'Telefone' }}</label>
    <input class="form-control" name="telefone" type="text" id="telefone" value="{{ isset($contact->telefone) ? $contact->telefone : ''}}" >
    {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
