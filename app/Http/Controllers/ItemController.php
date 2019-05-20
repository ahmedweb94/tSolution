<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemRescource;
use App\Models\Image;
use App\Repository\ItemRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ItemController extends Controller
{

    protected $itemRepo;
    protected $apiResponse;

    public function __construct(ItemRepository $itemRepo,ApiResponseService $apiResponse)
    {
        $this->itemRepo = $itemRepo;
        $this->apiResponse = $apiResponse;
    }
    public function allItems(){
        $items=$this->itemRepo->findAll();
        $items= new ItemRescource($items);
        return $this->apiResponse->setData($items)->setCode(200)->send();
    }
    public function upload(Request $request){
        if(is_array(Input::file('file'))){
            $file=Input::file('file');
            foreach ($file as $item){
                $imagedata = file_get_contents($item);
                $name=$item->getClientOriginalName();
                $item->move(public_path().'/'.'uploads',$name);
                $base64 = base64_encode($imagedata);
                $row=new Image();
                $row->photo=$base64;
                $row->save();
            }
            return $this->apiResponse->setSuccess('uploaded')->setCode('200')->send();
        }
        $item=Input::file('file');
        $imagedata = file_get_contents($item);
        $name=$item->getClientOriginalName();
        $item->move(public_path().'/'.'uploads',$name);
        $base64 = base64_encode($imagedata);
        $row=new Image();
        $row->photo=$base64;
        $row->save();
        return $this->apiResponse->setSuccess('uploaded')->setCode('200')->send();
    }
}
