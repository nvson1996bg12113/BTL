<div class="char-js">
	<div class="info-vendor">
		<h3>{{$vendor->name}}</h3>
		<div style="font-size: 13px">
			{!!$vendor->description!!}
		</div>
	</div>
	<div class="data-char-js">
		<canvas id="char-{{$vendor->id}}"></canvas>
	</div>
</div>
<div class="value-data" style="display: none">
	<span id="count-{{$vendor->id}}" title="Other Products">{{$count}}</span>
	<span id="hasProduct-{{$vendor->id}}" title="Products In {{$vendor->name}}">{{$hasProduct}}</span>
</div>
<div class="list-products">

</div>
<script type="text/javascript">
	var ctx = document.getElementById("char-<?php echo $vendor->id ?>");
	var vendorCount = document.getElementById("count-<?php echo $vendor->id?>");
	var vendorHasProduct = document.getElementById("hasProduct-<?php echo $vendor->id?>");
	var titleHasProduct = $(vendorHasProduct).attr("title");
	var titleCount = $(vendorCount).attr("title");
	var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
    			labels: [titleHasProduct, titleCount],
                datasets: [
                    {
                        
                        data: [parseInt($(vendorHasProduct).html()),parseInt($(vendorCount).html())-parseInt($(vendorHasProduct).html())],
                        backgroundColor: ['rgba(255, 0, 0, 0.5)', 'rgba(0, 128, 128, 0.5)'],
                        borderColor: ['rgba(255, 0, 0, 0.3)', 'rgba(0, 128, 128, 0.3)'],
                        borderWidth: 1
                    },
                ]
            }
});
</script>