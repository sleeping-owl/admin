<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<textarea class="form-control" rows="{{ $rows }}" name="{{ $name }}" readonly="true">{!! $value !!}</textarea>
	@include(AdminTemplate::view('formitem.errors'))
</div>