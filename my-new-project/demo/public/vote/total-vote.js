var box = document.getElementById("total-vote-box");
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
