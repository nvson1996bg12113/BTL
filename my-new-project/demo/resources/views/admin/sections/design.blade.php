<section id="{{$section}}">
  <!-- data-toggle="modal" data-target="#model-detail-menu" -->
  <div class="col-xs-12">
    <a href="javascript:void(0)" class="__lf btn btn-link" style="margin-bottom: 25px" data-toggle="modal" data-target="#model-add-menu">Add menu</a>
  </div>

    <ul>
  @foreach($menus as $key_menus => $menu)

      @if($menu != null)
      <li class="col-xs-12 form-group">
        <a href="javascript:void(0)" class="btn btn-primary"  data-toggle="collapse" data-target="#collapse_{{md5($menu->title)}}_level_0_{{$menu->index}}" style="width: 60%">
          {{$menu->title}}
        </a>
        <a href="#" class="btn btn-danger delete-menu-item" data-menu="#{{md5($key_menus.$menu->index)}}" style="font-size: 10px"> <i class="fa fa-close"></i> </a>
        <a href="#" data-toggle="modal" data-target="#model-edit-menu" class="btn btn-success edit-menu-item" data-menu="#{{md5($key_menus.$menu->index)}}" style="font-size: 10px"> <i class="fa fa-edit"></i> </a>
        <div class="data-menu" id="{{md5($key_menus.$menu->index)}}" style="display: none">
          <span class="index-menu-item">{{$menu->index}}</span>
          <span class="title-menu-item">{{$menu->title}}</span>
          <span class="level-menu-item">{{$menu->level}}</span>
          <span class="title-menu">{{$menu->title}}</span>
        </div>
        <div id="collapse_{{md5($menu->title)}}_level_0_{{$menu->index}}" class="collapse">
          @isset($menu->next)
            <ul>
              @foreach($menu->next as $sub_menu1)
                @if($sub_menu1 != null)
                <li class="col-xs-12" style="padding: 0px;">
                  <a href="javascript:void(0)" class="btn btn-default" style="width: 60%; text-align: left; padding-left: 15px;  font-size: 14px;" data-toggle="collapse" data-target="#collapse_{{md5($menu->title.$sub_menu1->title)}}_level_1_{{$sub_menu1->index}}">{{$sub_menu1->title}}</a>
                  <a href="#" class="btn btn-danger delete-menu-item" style="font-size: 10px" data-menu="#{{md5($key_menus.$sub_menu1->index)}}"><i class="fa fa-close"></i></a>
                  <a href="#" data-toggle="modal" data-target="#model-edit-menu" data-menu="#{{md5($key_menus.$sub_menu1->index)}}" class="btn btn-success edit-menu-item" style="font-size: 10px"><i class="fa fa-edit"></i></a>
                  <div class="data-menu" id="{{md5($key_menus.$sub_menu1->index)}}" style="display: none">
                    <span class="index-menu-item">{{$sub_menu1->index}}</span>
                    <span class="title-menu-item">{{$sub_menu1->title}}</span>
                    <span class="level-menu-item">{{$sub_menu1->level}}</span>
                    <span class="parent-menu-item">{{$menu->index}}</span>
                    <span class="title-menu">{{$menu->title}}</span>
                    <span class="type-menu-item">{{$sub_menu1->type}}</span>
                  </div>
                  <div id="collapse_{{md5($menu->title.$sub_menu1->title)}}_level_1_{{$sub_menu1->index}}" class="collapse">
                    @isset($sub_menu1->next)
                      <ul>
                        @foreach($sub_menu1->next as $sub_menu2)
                          @if($sub_menu2 != null)
                          <li class="col-xs-12" style="padding: 0px">
                            <a href="javascript:void(0)" data-menu="#{{md5($key_menus.$sub_menu2->index)}}" class="btn btn-default" style="width: 60%; text-align: left; padding-left: 30px; font-size: 13px" data-toggle="collapse" data-target="#collapse_{{md5($menu->title.$sub_menu1->title.$sub_menu2->title)}}_level_2_{{$sub_menu1->index}}">
                              {{$sub_menu2->title}}</a>
                            <a href="#" class="btn btn-danger delete-menu-item" data-menu="#{{md5($key_menus.$sub_menu2->index)}}" style="font-size: 10px"><i class="fa fa-close"></i></a>
                            <a href="#" class="btn btn-success edit-menu-item" data-toggle="modal" data-target="#model-edit-menu" data-menu="#{{md5($key_menus.$sub_menu2->index)}}" style="font-size: 10px"><i class="fa fa-edit"></i></a>
                            <div class="data-menu" id="{{md5($key_menus.$sub_menu2->index)}}" style="display: none">
                              <span class="index-menu-item">{{$sub_menu2->index}}</span>
                              <span class="title-menu-item">{{$sub_menu2->title}}</span>
                              <span class="level-menu-item">{{$sub_menu2->level}}</span>
                              <span class="parent-menu-item">{{$sub_menu1->index}}</span>
                              <span class="title-menu">{{$menu->title}}</span>
                              <span class="type-menu-item">{{$sub_menu2->type}}</span>
                            </div>
                            <div id="collapse_{{md5($menu->title.$sub_menu1->title.$sub_menu2->title)}}_level_2_{{$sub_menu1->index}}" class="collapse">
                              <ul>
                                @isset($sub_menu2->next)
                                  @foreach($sub_menu2->next as $sub_menu3)
                                    @isset($sub_menu3)
                                    <li class="col-xs-12" style="padding: 0px">
                                      <a href="javascript:void(0)" data-menu="#{{md5($key_menus.$sub_menu3->index)}}" class="btn btn-default" style="width: 60%; text-align: left; padding-left: 45px; font-size: 12px">
                                        {{$sub_menu3->title}}
                                      </a>
                                      <a href="#" class="btn btn-danger delete-menu-item" data-menu="#{{md5($key_menus.$sub_menu3->index)}}" style="font-size: 10px"><i class="fa fa-close"></i></a>
                                      <a href="#" class="btn btn-success edit-menu-item" data-menu="#{{md5($key_menus.$sub_menu3->index)}}" style="font-size: 10px" data-toggle="modal" data-target="#model-edit-menu"><i class="fa fa-edit"></i></a>
                                      <div class="data-menu" id="{{md5($key_menus.$sub_menu3->index)}}" style="display: none">
                                        <span class="index-menu-item">{{$sub_menu3->index}}</span>
                                        <span class="title-menu-item">{{$sub_menu3->title}}</span>
                                        <span class="level-menu-item">{{$sub_menu3->level}}</span>
                                        <span class="parent-menu-item">{{$sub_menu2->index}}</span>
                                        <span class="title-menu">{{$menu->title}}</span>
                                        <span class="type-menu-item">{{$sub_menu3->type}}</span>
                                      </div>
                                    </li>
                                    @endisset
                                  @endforeach
                                @endisset
                              </ul>
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#model-detail-menu" class="col-xs-12 open-add-menu" data-menu="#{{md5($key_menus.$sub_menu2->index)}}" style="padding: 0px; padding-left: 45px; font-size: 20px; text-align: left">+</a>
                            </div>
                            </li>
                          @endif
                        @endforeach
                      </ul>
                    @endisset
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#model-detail-menu" class="col-xs-12 open-add-menu" data-menu="#{{md5($key_menus.$sub_menu1->index)}}" style="padding: 0px; padding-left: 30px; font-size: 20px; text-align: left">+</a>
                  </div>
                </li>
                @endif
              @endforeach
            </ul>
          @endisset
          <a href="javascript:void(0)" title="{{$menu->title}}" data-toggle="modal" data-target="#model-detail-menu" class="col-xs-12 open-add-menu" data-menu="#{{md5($key_menus.$menu->index)}}" style="padding: 0px; padding-left: 15px; font-size: 20px; text-align: left">+</a>
        </div>
      </li>
      @endif
  @endforeach
      </ul>
<div id="model-detail-menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="{{route('admin.add.menu.item')}}" >
          @csrf
          <input type="hidden" name="title" value="" id="title-of-menu">
          <input type="hidden" name="index" value="" id="index-of-menu">
          <input type="hidden" name="content" value="" id="content-binding">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="name" class="form-control" value="">
            </div>
            <div class="form-group">
              <label for="">For</label>
              <select class="form-control" name="for" id="select-cate">
                <option value="home">Home</option>
                <option value="category">Category</option>
                <option value="vendor">Vendor</option>
                <option value="product">Product</option>
                <option value="cart">Cart</option>
              </select>
              <label for="">Value</label>
              <select class="form-control" name="value" id="binding">

              </select>
            </div>
            <div class="form-group" style="text-align: right">
              <button type="submit" name="button" class="btn btn-default" name="submit">submit</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
<div id="model-edit-menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" action="{{route('admin.edit.menu')}}" >
          @csrf
          <input type="hidden" name="index" value="" id="index-of-menu-edit">
          <input type="hidden" name="title" value="" id="inp-of-title-menu">
          <input type="hidden" name="level" value="" id="inp-of-level-menu">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="name" class="form-control" value="" id="inp-of-title-menu-item">
            </div>
            <div class="form-group">
              <input type="checkbox" name="check-edit-select" value="edit" id="check-edit-path"> <label for="">Change path</label>
            </div>
            <div class="form-group" id="select-edit-path" style="display: none">
              <label for="">For</label>
              <select class="form-control" name="for" id="select-cate-edit">
                <option value="home">Home</option>
                <option value="category">Category</option>
                <option value="vendor">Vendor</option>
                <option value="product">Product</option>
              </select>
              <label for="">Value</label>
              <select class="form-control" name="value" id="binding-edit">

              </select>
            </div>
            <div class="form-group" style="text-align: right">
              <button type="submit" name="button" class="btn btn-default" name="submit">submit</button>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>
<div id="model-add-menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add menu</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.add.menu')}}" method="post">
          @csrf

          <div class="form-group">
            <label for="">Title</label>
            <input type="text" name="title" value="" class="form-control">
          </div>
          <div class="form-group" style="text-align: right">
            <button type="submit" name="button" class="btn btn-default">submit</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
  <script type="text/javascript">
      $("#select-cate").change(function(){
        $("#binding").html("");
        var change = $(this).val();
        switch (change) {
          case "home":
            $("#binding").append("<option value='0'></option>");
            break;
          case "category":
            $.get("<?php echo route('category.all')?>?fields=id,name",function(data){
              $("#binding").append("<option value='0'></option>");
              $.each(data['data'],function(key,value){
                $("#binding").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
              });
            })
            break;
            case "vendor":
              $.get("<?php echo route('vendor.all')?>?fields=id,name",function(data){
                $("#binding").append("<option value='0'></option>");
                $.each(data['data'],function(key,value){
                  $("#binding").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
                });
              })
              break;
            case "product":
                $.get("<?php echo route('product.all')?>?fields=id,name",function(data){
                  $("#binding").append("<option value='0'></option>");
                  $.each(data['data'],function(key,value){
                    $("#binding").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
                  });
                })
                break;
          default:

        }
      });
      $("#select-cate-edit").change(function(){
        $("#binding-edit").html("");
        var change = $(this).val();
        switch (change) {
          case "home":
            $("#binding-edit").append("<option value='0'></option>");
            break;
          case "category":
            $.get("<?php echo route('category.all')?>?fields=id,name",function(data){
              $("#binding-edit").append("<option value='0'></option>");
              $.each(data['data'],function(key,value){
                $("#binding-edit").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
              });
            })
            break;
            case "vendor":
              $.get("<?php echo route('vendor.all')?>?fields=id,name",function(data){
                $("#binding-edit").append("<option value='0'></option>");
                $.each(data['data'],function(key,value){
                  $("#binding-edit").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
                });
              })
              break;
            case "product":
                $.get("<?php echo route('product.all')?>?fields=id,name",function(data){
                  $("#binding-edit").append("<option value='0'></option>");
                  $.each(data['data'],function(key,value){
                    $("#binding-edit").append("<option value='"+value.id+"=>"+value.name+"'>"+value.name+"</option>");
                  });
                })
                break;
          default:

        }
      });
      var dataMenu;
      $(".open-add-menu").click(function(){
        dataMenu = $($(this).attr("data-menu"));
        console.log($(this).attr("data-menu"));
        $("#index-of-menu").val(dataMenu.children(".index-menu-item").html());
        $("#title-of-menu").val(dataMenu.children(".title-menu").html());
      });
      var itemCheck;
      $(".delete-menu-item").click(function(){
        dataMenu = $($(this).attr("data-menu"));
        var level = parseInt(dataMenu.children(".level-menu-item").html());
        var index = parseInt(dataMenu.children(".index-menu-item").html());
        var title = dataMenu.children(".title-menu").html();
        var parent = dataMenu.children(".parent-menu-item").html();
        var url = "<?php echo route('admin.delete.menu.item')?>?level="+level+"&index="+index+"&title="+title+"&parent="+parent;
        console.log(url);
        itemCheck = $(this);
        $.get(url,function(data){
          itemCheck.parent().hide();
          console.log(data);
        });
        //console.log(url);
      });
      $(".edit-menu-item").click(function(){
        dataMenu = $($(this).attr("data-menu"));
        //<a href="#" data-toggle="modal" data-target="#model-edit-menu" class="btn btn-success edit-menu-item" level="0" index="{{$menu->index}}" title="{{$menu->title}}" style="font-size: 10px"> <i class="fa fa-edit"></i> </a>
        $("#inp-of-title-menu").val(dataMenu.children(".title-menu").html());
        $("#inp-of-title-menu-item").val(dataMenu.children(".title-menu-item").html());
        $("#index-of-menu-edit").val(dataMenu.children(".index-menu-item").html());
        $("#inp-of-level-menu").val(dataMenu.children(".level-menu-item").html());
      });

      $("#check-edit-path").change(function(){
        if(parseInt(dataMenu.children(".level-menu-item").html()) > 0)
        {
          if($(this).is(":checked")){
            $("#select-edit-path").slideDown();
          }
          else $("#select-edit-path").slideUp();
        }
        else $("#select-edit-path").hide();
      });
  </script>
</section>
