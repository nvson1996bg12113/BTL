var vote = document.getElementById("vote");
var box = document.getElementById("star-box");
var length = box.attributes.max.value;
var posted = box.attributes.posted.value;
//isset star

for(var i = 0 ; i < posted; i++)
	box.insertAdjacentHTML('beforeend','<span class="star star_rate_100 star-click"></span>');
for(var i = posted; i< length; i++)
	box.insertAdjacentHTML('beforeend','<span class="star star_rate_0 star-click"></span>');

var star = document.querySelectorAll(".star-click");
for(var i = 0 ; i < length; i++)
	star[i].value = i+1;

for(var i = 0 ; i < length; i++)
	star[i].addEventListener('click',function(){
		vote.value = this.value;
		for(var j = 0 ; j < this.value; j++)
		{
			star[j].classList.remove("star_rate_0");
			star[j].classList.add("star_rate_100");
		}
		for(var j = length - 1; j >= this.value; j--)
		{
			star[j].classList.remove("star_rate_100");
			star[j].classList.add("star_rate_0");
		}
	});


