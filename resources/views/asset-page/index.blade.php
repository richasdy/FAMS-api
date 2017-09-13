@extends('master-layout')

@section('content')
<div class="page-content">
	<div class="page-content-container">
			<div class="page-content-row">
				<router-view></router-view>
			</div>
	</div>
</div>
@stop
