<section id = "{{$section}}">
	@if(session()->has('success'))
	<div class="alert alert-success animate-alter-success col-xs-10 col-sm-8 col-md-5 col-lg-3">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<u>{{session('success')}}</u> data has been updated 
	</div>
	@endif
	<div class="col-xs-12" style="padding: 0px">
		<form method="post" action="@if($type == 'add') {{route('admin.vendor.add.submit')}} @else {{route('admin.vendor.edit.submit')}} @endif">
			@csrf
			@if(isset($vendor))
				<input type="hidden" name="id" value="{{$vendor->id}}">
			@endif
			<div class="col-xs-12">
				<div class="form-group">
					<label>Title</label>
					<input type="text" name="name" value="@isset($vendor) {{$vendor->name}} @endisset" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Description</label>
					<div>
						<textarea name="description" id="description">{{ isset($vendor->description) ? $vendor->description : '' }}</textarea>
					</div>
				</div>
				<div class="form-group">
					<button class="__rg btn btn-default" type="submit" id="submit">submit</button>
				</div>
			</div>
		</form>
	</div>
</section>