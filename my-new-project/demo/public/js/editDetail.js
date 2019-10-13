		tinymce.init({
			selector: '#description',
			height: 200,
			statusbar: false
		});

	    $(".animate-alter-success").animate({
			opacity : '0',
		}, 4000).hide(1000);
		
		function keyPressCategorys(){
			//charCode or keyCode get ascII of key
			//var x = event.keyCode || event.charCode;
			//String.fromCharCode(key)
			//indexOf
			var input = document.getElementById("categorys_label");
			var filter = document.getElementsByClassName("list-filter-category");
			var categoryId = document.getElementById("categorys_id");
			var inputUpCase = input.value.toUpperCase();
			for(var i = 0; i < filter.length ; i++)
			{
				var filterUpCase = filter[i].innerHTML.toUpperCase();
				if(filterUpCase.indexOf(inputUpCase) > -1)
				{
					filter[i].style.display = "block";
					categoryId.value = filter[i].getAttribute("value");
				}
				else filter[i].style.display = "none";
			}
			//alert(x);
		}


		function keyPressVendors(){
			//charCode or keyCode get ascII of key
			//var x = event.keyCode || event.charCode;
			//String.fromCharCode(key)
			//indexOf
			var input = document.getElementById("vendors_label");
			var filter = document.getElementsByClassName("list-filter-vendor");
			var vendorId = document.getElementById("vendors_id");
			var inputUpCase = input.value.toUpperCase();
			
			for(var i = 0; i < filter.length ; i++)
			{
				var filterUpCase = filter[i].innerHTML.toUpperCase();
				if(filterUpCase.indexOf(inputUpCase) > -1)
				{
					filter[i].style.display = "block";
					vendorId.value = filter[i].getAttribute("value");
				}
				else filter[i].style.display = "none";
			}
			//alert(x);
		}

		function clickItemDropCategory(index){
			document.getElementById("categorys_label").value = index.innerHTML;
			document.getElementById("categorys_id").value = index.getAttribute("value");
		}

		function clickItemDropVendor(index){
			document.getElementById("vendors_label").value = index.innerHTML;
			document.getElementById("vendors_id").value = index.getAttribute("value");
		}

		//create dragging
		var $dragging = null;
		//left limit in task bar
		var limitLeft = $("#button-progress-move").offset().left;
		//right limit in task bar
		var limitRight = parseFloat($("#Progress-small-move").css("width")) - 20 + limitLeft;
		
		var pageX = limitLeft;

		console.log("index left of #Progress-small-move: "+limitLeft);
		console.log("index right of #Progress-small-move: "+limitRight);

		//event has click on button move
		$(document.body).on("mousemove",function(e){
			if ($dragging) {
				var $left = e.pageX-10;
				console.log($left);
				if($left <= limitLeft) $left = limitLeft;
				if($left >= limitRight) $left = limitRight;

				if($left > limitLeft && $left < limitRight)
			    {
			    	$dragging.offset({
			            left: $left
			        });
			    	var value = Math.round((($left - limitLeft)/(limitRight - limitLeft)) * 100);
			    	$("#value-progress").val(value);
			    	$("#title-value-progress").html(value);
			    }
			    pageX = $left;
		    }
		});

		$(document.body).on("mousedown", "#button-progress-move", function (e) {
       		$dragging = $(e.target);
	    });
	    
	    $(document.body).on("mouseup", function (e) {
	        $dragging = null;
	    });

	    $("#title-value-progress").html($("#value-progress").val());
	    $("#value-progress").change(function(){
	    	$("#title-value-progress").html($(this).val());
	    });

	    $("#label-upload-file").click(function(){
	    	$(".upload-file").click().change(function(event){
	    		$(".images-product").append('<div class="square rlPos item-image-product __lf"><div class="fullScr algCenter"><img src="'+URL.createObjectURL(event.target.files[0])+'"></div></div>');
	    		$(this).removeClass("upload-file").addClass("item-files");
	    		$(".files-images-products").append('<input type="file" name="images[]" class="upload-file item-files">');
	    	});

	    });

	    //URL.createObjectURL(event.target.files[0])

	    $("#inp-name").change(function(){
	    	$(this).removeClass("inp-error");
	    	$("#form-error-name").hide();
	    });

	    $("#categorys_label").change(function(){
	    	$("#categorys_label").removeClass("inp-error");
	    	$("#form-error-category").hide();
	    });

	    $("#vendors_label").change(function(){
	    	$("#vendors_label").removeClass("inp-error");
	    	$("#form-error-vendor").hide();
	    });

	    $("#price").change(function(){
	    	$("#price").removeClass("inp-error");
	    	$("#form-error-price").hide();
	    });

	    $("#form-add-product").submit(function(){
	    	var name = $("#inp-name").val();
	    	var category = $("#categorys_label").val();
	    	var vendor = $("#vendors_label").val();
	    	var price = $("#price").val()+"";
	    	var check = true;
	    	if(name == "" || name == null){
	    		$("#inp-name").addClass("inp-error");
	    		$("#form-error-name").show();
	    		check = false;
	    	}
	    	if(category == "" || category == null){
	    		$("#categorys_label").addClass("inp-error");
	    		$("#form-error-category").show();
	    		check = false;
	    	}
	    	if(vendor == "" || vendor == null){
	    		$("#vendors_label").addClass("inp-error");
	    		$("#form-error-vendor").show();
	    		check = false;
	    	}
	    	if(price == "" || price == null){
	    		$("#price").addClass("inp-error");
	    		$("#form-error-price").show();
	    	}
	    	return check;
	    });