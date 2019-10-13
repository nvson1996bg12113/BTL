<section id="{{$section}}">
  <div class="header-bottom">
   <div class="wrap">
     <!-- start header menu -->
   <ul class="megamenu skyblue __lf" style="width: auto;">
     @if(isset($menus['mega_menu']) && isset($menus['mega_menu']->next))
       <?php $count = 0; ?>
       @foreach($menus['mega_menu']->next as $sub_menu1)
         @isset($sub_menu1)
           <li>
             <a href="@isset($sub_menu1->path){{$sub_menu1->path}}@endisset" class="color{{$count+1}}">{{$sub_menu1->title}}</a>
             @isset($sub_menu1->next)
             <div class="megapanel">
               <div class="row">
               @foreach($sub_menu1->next as $sub_menu2)
                   <div class="col1">
                     <div class="h_nav">
                       @isset($sub_menu2->next)
                       <h4>{{$sub_menu2->title}}</h4>
                       <ul>
                         @foreach($sub_menu2->next as $sub_menu3)
                           <li> <a href="@isset($sub_menu3->path){{$sub_menu3->path}}@endisset">{{$sub_menu3->title}}</a> </li>
                         @endforeach
                       </ul>
                       @else
                         <a href="@isset($sub_menu2->path){{$sub_menu2->path}}@endisset" class="not-sub-menu">{{$sub_menu2->title}}</a>
                       @endif
                     </div>
                   </div>
               @endforeach
             </div>
           </div>
             @endif
           </li>
           <?php $count++; ?>
         @endisset
       @endforeach
     @endif
      </ul>
      <div class="__rg" style="height: 35px;">
        <form class="form" method="get" action="{{route('home.search')}}">
            <div class="form-group" style="margin: 0px">
              <input type="text" class="form-control" name="search" style="width: 250px; border-radius: 3px; border: 1px solid gray; line-height: 30px; margin-top: 2px; border-right: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; padding: 0 15px;" value="@if(isset($value)){{$value}}@endif"><button style="line-height: 30px; width: 30px; border: 1px solid gray; border-left: 0px; background: white; border-radius: 0px ;border-top-right-radius: 3px; border-bottom-right-radius: 3px; margin-top: 2px; padding: 0px" type="submit" name="button"><i class="fa fa-search"></i></button>
            </div>
        </form>
      </div>
      <div class="clear"></div>
     </div>
      </div>
</section>
