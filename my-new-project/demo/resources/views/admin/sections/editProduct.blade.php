<section id={{$section}}>
	@if(session()->has('success'))
	<div class="alert alert-success animate-alter-success col-xs-10 col-sm-8 col-md-5 col-lg-3">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<u>{{session('success')}}</u> data has been updated
	</div>
	@endif

	<div class="col-xs-12" style="padding: 0px">
		<form method="post" enctype="multipart/form-data" id="form-add-product" action="{{ isset($product) ? route('admin.product.edit.submit') : route('admin.product.add.submit')}}">
			@csrf
			@isset($product)
				<input type="hidden" name="id" value="{{$product->id}}">
			@endif
			<div class="edit col-xs-12" style="padding: 0px;">
				<div class="col-xs-12 col-md-7 col-lg-8">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" id="inp-name" value="{{ isset($product->name) ? $product->name : '' }}">
						<div class="form-error" id="form-error-name">
							<a href="#exception-name"><span class="content">name not invalid</span></a>
						</div>
					</div>
					<div class="form-group">
						<label>Description</label>
						<div>
							<textarea name="description" id="description">{{ isset($product->description) ? $product->description : '' }}</textarea>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-5 col-lg-4">
					<div class="form-group">
						<label>Categorys</label>
						<div class="rlPos dropdown_selection">
							<input type="text" id="categorys_label" class="form-control label-dropdown-menu" onkeyup="keyPressCategorys()" value="{{ isset($product->category->name) ? $product->category->name : '' }}"/>
							<div class="dropdown_value_list" style="display: block;">
								<ul class="dropdown-menu" id="dropdown-categorys" style="width: 100%;">

								</ul>
							</div>
							<div class="form-error" id="form-error-category">
								<a href="#exception-category"><span class="content">category not invalid</span></a>
							</div>
						</div>
						<input type="hidden" name="categorys_id" id="categorys_id"  value="{{ isset($product->category->id) ?$product->category->id : '' }}">

					</div>

					<div class="form-group">
						<label>Vendors</label>
						<div class="rlPos dropdown_selection">
							<input type="text" id="vendors_label" class="form-control label-dropdown-menu" onkeyup="keyPressVendors()"  value="{{ isset($product->vendor->name) ?$product->vendor->name : '' }}">
							<div class="dropdown_value_list" style="display: block;">
								<ul class="dropdown-menu" id="dropdown-vendors" style="width: 100%;">

								</ul>
							</div>
							<div class="form-error" id="form-error-vendor">
								<a href="#exception-vendor"><span class="content">vendor not invalid</span></a>
							</div>
						</div>
						<input type="hidden" name="vendors_id" id="vendors_id"  value="{{ isset($product->vendor->id) ?$product->vendor->id : '' }}">
					</div>

					<div class="form-group">
						<table class="table">
							<thead>
								<tr>
									<th><label>Old Price (VND)</label></th>
									<th><label>New Price (VND)</label></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="text" name="import_price" class="form-control"  value="{{ isset($product->import_price) ?$product->import_price : '' }}">
									</td>
									<td>
										<input type="text" name="price" id="price" class="form-control"  value="{{ isset($product->price) ?$product->price : '' }}">
										<div class="form-error" id="form-error-price">
											<a href="#exception-price"><span class="content">price not invalid</span></a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<table class="table">
							<thead>
								<tr>
									<th><label>Viewer</label></th>
									<th><label>Inventory</label></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<input type="text" name="viewer" class="form-control"  value="{{ isset($product->viewer) ?$product->viewer : '0' }}">
									</td>
									<td>
										<input type="text" name="inventory" class="form-control"  value="{{ isset($product->inventory) ?$product->inventory : '0' }}">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-group">
						<label>Sale <span id="title-value-progress"></span>(%)</label><br>
						<div class="Progress-small-move" id="Progress-small-move" value="0" max-value="100" min-value="0">
							<button type="button" id="button-progress-move"></button>
						</div>
						<div class="Progress-small-value">
							<input type="number" name="sale" class="form-control" id="value-progress" max="100" min="0"  value="{{ isset($product->sale) ?$product->sale : '0' }}">
						</div>
					</div>
				</div>
			</div>
			<div class="media-content col-xs-12" style="border-top: 1px solid lightgray; padding: 15px;">
				<label>Images</label>
				<a href="javascript:void(0)" class="__rg" id="label-upload-file">Upload files</a>
				<div class="col-xs-12 images-product" style="padding: 15px 0px;">
					@if(isset($type) && $type == 'edit')
						@foreach($product['media'] as $key => $value)
						<div class="square rlPos item-image-product __lf">
							<div class="fullScr algCenter">
								<img src="{{URL::asset('/storage/app/'.$value->path.'/'.$value->name)}}">
							</div>
						</div>
						@endforeach
					@endif
				</div>
				<div class="files-images-products" style="display: none">
					<input type="file" name="images[]" class="upload-file">
				</div>
			</div>

			<div class="col-xs-12">
				<button type="submit" id="submit" class="btn __rg btn-default">Submit</button>
			</div>
		</form>
	</div>
</section>
