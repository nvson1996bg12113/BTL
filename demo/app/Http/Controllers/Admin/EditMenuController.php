<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MenuController;
class EditMenuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //setting path for item menu
    public function setPath($case, $value)
    {
        $path;
        switch ($case) {
          case 'home':
            // code...
            $path = route('home');
            break;
          case 'category':
            if($value == 0)
              $path = route('home.categorys');
            else{
              $array = explode("=>",$value);
              $path = route('home.categorys',['id'=>$array[0]]);
            }
            break;
          case 'vendor':
            if($value == 0)
              $path = route('home.vendors');
            else{
              $array = explode("=>",$value);
              $path = route('home.vendors',['id'=>$array[0]]);
            }
            break;
          case 'product':
            if($value == 0)
              $path = route('home.products');
              else{
                $array = explode("=>",$value);
                $path = route('home.product.detail',['name' => $array[1],'id'=>$array[0]]);
              }
            break;
          case 'cart':
            $path = route('user.cart');
            break;
          default:
            // code...
            break;
      }
      return $path;
    }

    //method add item in menu
    public function menuItemAdd(Request $request){
      $data = json_decode(Storage::disk('collections')->get($request->title.".json"));
      $sub = (object) array("title" => $request->name);
      $case = $request->for;
      $value = $request->value;
      $sub->path = $this->setPath($case, $value);
      $sub->type = $case;
      array_push($data->struct, $sub);
      if(isset($data->struct[$request->index]->next))
        array_push($data->struct[$request->index]->next, max(array_keys($data->struct)));
        //[count($data->struct[$request->index]->next)] = count($data->struct);
      else   $data->struct[$request->index]->next[0] = max(array_keys($data->struct));


      Storage::disk('collections')->put($request->title.".json",json_encode($data));
      return redirect()->back()->with('success','Update successul!');
      //return $data;
    }
    public function menuItemDelete(Request $request){
      $level = (int)$request->level;
      if($level == 0)
        Storage::disk('collections')->delete($request->title.".json");
      else if($level > 0){
        $data = json_decode(Storage::disk('collections')->get($request->title.".json"));
        $temp = $data;
        //array_diff($temp->struct[$request->parent]->next,[$request->index]);
        if(count($temp->struct[$request->parent]->next) <= 1) $temp->struct[$request->parent]->next = array();
        else
          foreach ($temp->struct[$request->parent]->next as $key => $value) {
            if($value == $request->index)
            array_splice($temp->struct[$request->parent]->next, $key, 1);
          }
          //array_splice($temp->struct[$request->parent]->next, $request->index, 1);
          $temp->struct = $this->deleteItemAll($temp->struct, $request->index);

          $data = $temp;
          Storage::disk('collections')->put($request->title.".json",json_encode($temp));
        }

      return [
        'success','has delete menu item'
      ];
    }
    public function deleteItemAll($menu, $index){
      if(!isset($menu[$index]->next[0]))
      {
          $menu[$index] = null;
          //
          return $menu;
      }
      else{
        foreach ($menu[$index]->next as $key => $value) {
          // code...
          if(isset($value))
            $menu = $this->deleteItemAll($menu, $value);
        }
        $menu[$index] = null;
        return $menu;
      }
    }

    //add new menu
    public function menuAdd(Request $request){
      if(!Storage::disk('collections')->exists($request->title.'.json'))
      {
        $data = (object) array(
            "title" => $request->title,
            "struct" => [
                (object)[
                  "title" => $request->title,
                  "next" => []
                ]
            ]
        );
        Storage::disk('collections')->put($request->title.".json", json_encode($data));
        return redirect()->back()->with('success','Update successul!');
      }
      return redirect()->back()->with('error',"Can't Update successul!");
    }

    //update menu item
    public function menuEdit(Request $request){
      if(Storage::disk('collections')->exists($request->title.".json")){
        $data = json_decode(Storage::disk('collections')->get($request->title.".json"));
        if($request->level > 0){
          $data->struct[$request->index]->title = $request->name;
          if($request->has('check-edit-select'))
          {
            $case = $request->for;
            $value = $request->value;
            $data->struct[$request->index]->type = $case;
            $data->struct[$request->index]->path = $this->setPath($case, $value);
            Storage::disk('collections')->put($request->title.".json",json_encode($data));
          }
        }
        else{
          if($request->title != $request->name)
          {
            $data->title = $request->name;
            $data->struct[0]->title = $request->name;
            Storage::disk('collections')->put($request->name.".json",json_encode($data));
            Storage::disk('collections')->delete($request->title.".json");
          }
        }
      }
      return redirect()->back()->with('success','Update successul!');
    }
}
