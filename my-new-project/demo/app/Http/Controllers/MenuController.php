<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    //
    public function getList(){
      $titleMenu = Storage::disk('collections')->files();
      $data;
      foreach ($titleMenu as $key => $value) {
        $menu = json_decode(Storage::disk('collections')->get($value));
        $data[$menu->title] = $this->createMenu($menu->struct,0,0);
      }
      return $data;
    }
    public function createMenu($menu, $i, $level){
      if(!isset($menu[$i]->next[0]))
      {
        $data = $menu[$i];
        if(!isset($data)) return null;
        $data->index = $i;
        $data->level = $level;
        return $data;
      }

      else {
        $data = $menu[$i];
        $data->index = $i;
        for($j = 0 ; $j < count($menu[$i]->next); $j++)
          $data->next[$j] = $this->createMenu($menu, $menu[$i]->next[$j], $level+1);
        $data->level = $level;
        return $data;
      }
    }
}
