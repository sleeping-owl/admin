<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<textarea class="ckeditor" name="{{ $name }}" disabled="true">{!! $value !!}</textarea>
	@include(AdminTemplate::view('formitem.errors'))
</div>



