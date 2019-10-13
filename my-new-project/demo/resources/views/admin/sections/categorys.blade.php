<section id="{{$section}}">
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" style="padding: 0px">
		@if(!isset($categorys['error']))
		<form method="post">
			<table class="table table-hover table-categorys">
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
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categorys as $key => $value)
						<tr id="tr_{{$key}}">
							<td><input type="checkbox" name="checkId[]" value="{{$value->id}}"></td>
							@foreach($excutes as $excute)
								@if($excute == "id")
									<td class="{{$excute}}">
										{{$key + 1}}
										<select style="display: none;" name="id" class="__{{$excute}}">
											<option selected="selected" value="{{$value[$excute]}}"></option>
										</select>
									</td>
								@elseif($excute == "name")
									<td class="{{$excute}}"><a href="javascript:void(0)" class="click-info-categorys" load-data="{{route('admin.category.statistical',['id' => $value->id,'fields' => 'id,name,description,category,vendor,price,import_price,media,sale,created_at,updated_at'])}}" index="{{$key}}">{{$value[$excute]}}</a></td>
								@else
								<td class="{{$excute}}">{{$value[$excute]}}</td>
								@endif
							@endforeach
							<td><a href="{{route('admin.category.edit',['id' => $value->id])}}" style="color: blue"><i class="fa fa-pencil"></i></a></td>
							<td><a href="javascript:void(0)" style="color: red" class="delete" index="{{$key}}" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-close"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</form>
		@endif
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
		<div class="main-statistical">
			<script type="text/javascript" src="{{URL::asset('js/Chart.min.js')}}"></script>
			@foreach($categorys as $key => $category)
			<div class="item-statiscal col-xs-12" id="item-{{$key}}" style="padding: 0px" has-data="0">
				
			</div>
			@endforeach	
		</div>
		
	</div>
	<div class="col-xs-12 algCenter">
			{!!$categorys->appends(['paginate' => $paginate, 'fields' => $fields])->links()!!}
	</div>
	<div id="deleteModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete categorys</h4>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-warning" id="confirm_delete" data-dismiss="modal">Delete</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
</section>
