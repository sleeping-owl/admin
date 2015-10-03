<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<div class="checkbox">
		<label>
			<input type="checkbox" name="{{ $name }}" value="1" {!! $value ? 'checked="checked"' : '' !!} disabled="true" />{{ $label }}
		</label>
	</div>
	@include(AdminTemplate::view('formitem.errors'))
</div>