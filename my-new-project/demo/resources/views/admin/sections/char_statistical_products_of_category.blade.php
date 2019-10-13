<div class="char-js">
	<div class="info-category">
		<h3>{{$category->name}}</h3>
		<div style="font-size: 13px">
			{!!$category->description!!}
		</div>
	</div>
	<div class="data-char-js">
		<canvas id="char-{{$category->id}}"></canvas>
	</div>
</div>
<div class="value-data" style="display: none">
	<span id="count-{{$category->id}}" title="Other Products">{{$count}}</span>
	<span id="hasProduct-{{$category->id}}" title="Products In {{$category->name}}">{{$hasProduct}}</span>
</div>
<div class="list-products">

</div>
<script type="text/javascript">
	var ctx = document.getElementById("char-<?php echo $category->id ?>");
	var categoryCount = document.getElementById("count-<?php echo $category->id?>");
	var categoryHasProduct = document.getElementById("hasProduct-<?php echo $category->id?>");
	var titleHasProduct = $(categoryHasProduct).attr("title");
	var titleCount = $(categoryCount).attr("title");
	var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
    			labels: [titleHasProduct, titleCount],
                datasets: [
                    {
                        
                        data: [parseInt($(categoryHasProduct).html()),parseInt($(categoryCount).html())-parseInt($(categoryHasProduct).html())],
                        backgroundColor: ['rgba(255, 0, 0, 0.5)', 'rgba(0, 128, 128, 0.5)'],
                        borderColor: ['rgba(255, 0, 0, 0.3)', 'rgba(0, 128, 128, 0.3)'],
                        borderWidth: 1
                    },
                ]
            }
});
</script>