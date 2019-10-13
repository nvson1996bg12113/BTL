
  <style type="text/css">
  	.start-box-total > .star{
  		width: 15px;
  		height: 15px;
  	}
  </style>
  <div>

  	<div class="star-box start-box-total" id="total-vote-box-{{$id}}" max="{{$maxVote}}" agv="{{$agv}}">
	 </div>
	 <a href="javascript:void(0)" style="font-size: 13px">(vote: {{$agv}})</a>
  </div>
  <script type="text/javascript">
    var box = document.getElementById("total-vote-box-<?php echo $id?>");
    var agv = box.attributes.agv.value;
    var max = box.attributes.max.value;
    var iAgv = parseInt(agv);
    var eAgv = agv - iAgv;
    var count = 0;
    for(var i = 0 ; i < iAgv; i++)
    {
      box.insertAdjacentHTML('beforeend','<span class="star star_rate_100"></span>');
      count++;
    }
    if(eAgv > 0)
    {
      if(eAgv < 0.5)
        box.insertAdjacentHTML('beforeend','<span class="star star_rate_25"></span>');
      else if(eAgv == 0.5)
        box.insertAdjacentHTML('beforeend','<span class="star star_rate_50"></span>');
      else if(eAgv > 0.5)
        box.insertAdjacentHTML('beforeend','<span class="star star_rate_75"></span>');
      count++;
    }
    for(var i = count ; i < max; i++)
      box.insertAdjacentHTML('beforeend','<span class="star star_rate_0"></span>');

  </script>