@if ($message = Session::get('success'))
<div class="alert alert-block bg-success text-white">
	<button type="button" class="close text-white" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-block bg-danger text-white">
	<button type="button" class="close text-white" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-block bg-warning text-black">
	<button type="button" class="close text-black" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-block bg-info text-white">
	<button type="button" class="close text-white" data-dismiss="alert">×</button>
	<strong>{{ $message }}</strong>
</div>
@endif


{{-- @if ($errors->any())
<div class="alert alert-block bg-danger text-white">
	<button type="button" class="close text-white" data-dismiss="alert">×</button>
	Se detectaron errores
</div>
@endif --}}