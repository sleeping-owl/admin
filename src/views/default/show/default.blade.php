<form>
	@foreach ($items as $item)
		{!! $item !!}
	@endforeach
	<div class="form-group">
		<a href="{{ $backUrl }}" class="btn btn-default">{{ trans('admin::lang.table.cancel') }}</a>
	</div>
</form>