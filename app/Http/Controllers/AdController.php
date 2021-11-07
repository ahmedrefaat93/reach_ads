<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterAdRequest;
use App\Http\Resources\AdResource;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Models\Ad;
use App\Models\Advertiser;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    use RespondsWithHttpStatus;
    public function filter(FilterAdRequest $request){

        try {
            if ($request->tag) {
                $ads = Ad::whereHas('tags', function($query) use ($request) {
                    $query->whereTitle($request->tag);
                })->get();
            }
            elseif($request->category) {
                $ads = Ad::whereHas('category',function($query) use ($request){
                    $query->whereTitle($request->category);
                })->get();
            }
            else{
                $ads=Ad::all();
            }
            return $this->success("", AdResource::collection($ads));
        }
        catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }

    }
    public function getAdsByAdvertiser($id){
        try {
            $advertiser=Advertiser::find($id);
            if($advertiser==NULL){
                return $this->failure("Not Found",404);
            }
            return $this->success("", AdResource::collection($advertiser->ads));
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }
    }
}
