<div style="width: 100%">
	<div class="star-box form-group" id="star-box" max="{{$maxVote}}" posted="{{isset($posted)? $posted->vote : 0}}">
	</div>
	<form method="post" action="{{route('home.vote.submit')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$idProduct}}">
		<input type="hidden" name="vote" value="{{isset($posted)? $posted->vote : 0}}" id="vote">
		<div class="form-group">
			<textarea class="form-control" name="content" id="textarea_post">{{isset($posted)? $posted->content : ""}}</textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" id="submit_post">Gửi</button>
		</div>
	</form>
</div>
<script type="text/javascript" src="{{asset('public/vote/vote.js')}}"></script>