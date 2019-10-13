<section id="{{$section}}">
	<div class="col-xs-12" style="padding: 0px">

		<table class="table table-hover table-products col-xs-12" style="padding: 0px">
			<thead>
				<tr>
					<th></th>
					@foreach($excutes as $excute)
						@if($excute == "id")
							<th class="{{$excute}}">STT</th>
						@else
						<th class="{{$excute}}">{{$excute}}</th>
						@endif
					@endforeach
					<th class="settings"></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $key => $value)
					<tr id="tr_{{$key}}">
						<td><input type="checkbox" name="checkId[]"></td>
						@foreach($excutes as $excute)
							@if($excute == "id")
								<td class="{{$excute}}">
									{{$key + 1}}
									<select style="display: none;" name="id[]" class="__{{$excute}}">
										<option selected="selected" value="{{$value[$excute]}}"></option>
									</select>
								</td>
							@elseif($excute == "name")
								<td class="{{$excute}}"><a href="javascript:void(0)">{{$value[$excute]}}</a></td>
							@elseif($excute == "category" || $excute == "vendor")
								<td class="{{$excute}}"><a href="javascript:void(0)">{{$value[$excute]['name']}}</a></td>
							@elseif($excute == "media")
								<td class="{{$excute}}">
									<div class="fullScr rlPos square">
										<div class="fullScr">
											@isset($value[$excute][0])
											<img src="{{URL::asset('/storage/app/images/products/'.$value['id'].'/'.$value[$excute][0]['name'])}}">
											@endisset
										</div>
									</div>
								</td>
							@else
							<td class="{{$excute}}">{{$value[$excute]}}</td>
							@endif
						@endforeach
						<td class="settings">
							<a href="{{route('admin.product.edit',['id' => $value['id']])}}"><i class="fa fa-pencil-square-o"></i></a>
						</td>
						<td>
							<a href="javascript:void(0)" style="color: red" class="delete" index="{{$key}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-close"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="col-xs-12 algCenter">
			{!!$products->appends(['paginate' => $paginate, 'fields' => $fields])->links()!!}
		</div>
		<div id="deleteModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete products</h4>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-warning" id="confirm_delete" data-dismiss="modal">Delete</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
	</div>
</section>
