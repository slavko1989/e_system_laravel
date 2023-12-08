<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class FileUploadService
{

    public function uploadFile($request,$product){

        $image = $request->image;
        if($image){
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imgname);
        $product->image=$imgname;

        }
    }
}