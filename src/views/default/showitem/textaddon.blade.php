<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div class="form-group input-group">
		@if ($placement == 'before')
			<span class="input-group-addon">{!! $addon !!}</span>
		@endif
		<input class="form-control" name="{{ $name }}" type="text" id="{{ $name }}" value="{{ $value }}" readonly="true">
		@if ($placement == 'after')
			<span class="input-group-addon">{!! $addon !!}</span>
		@endif
	</div>
	@include(AdminTemplate::view('formitem.errors'))
</div>