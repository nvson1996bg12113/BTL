<div style="width: 100%" class="row">
	@foreach($posts as $post)
	<div class="list-vote-item wid-xs-20">
		<div class="wid-xs-7 wid-sm-5 wid-md-4 wid-lg-3">
			{{$post->name}}
		</div>
		<div class="wid-xs-13 wid-sm-15 wid-md-16 wid-lg-17">
			<div class="wid-xs-20 form-group">
				@for($i = 0 ; $i < $post->vote; $i++)
					<span class="star star_rate_100" style="width: 15px; height: 15px;"></span>
				@endfor
				@for($i = $post->vote; $i < $maxVote; $i++)
					<span class="star star_rate_0" style="width: 15px; height: 15px;"></span>
				@endfor
			</div>
			<div class="wid-xs-20 form-group">
				<span>
					{{$post->content}}
				</span>
			</div>
		</div>
	</div>
	@endforeach
	<div class="wid-xs-20">
		{{$posts->links()}}
	</div>
	<div class="clear"></div>
</div>
<script type="text/javascript" src="{{asset('public/vote/list.js')}}"></script>