<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;
class TagController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success("", TagResource::collection(Tag::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //
        try {
            $tag = Tag::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return $this->success("New Tag Created Successfully", new TagResource($tag));
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $tag=Tag::find($id);
            if($tag==NULL){
                return $this->failure("Not Found",404);
            }
            return $this->success("", new TagResource($tag));
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        //
        try {
            $tag=Tag::find($id);
            if($tag==NULL){
                return $this->failure("Not Found",404);
            }
            $tag->update($request->only(['title', 'description']));
            return $this->success("Tag Updated Successfully", new TagResource($tag));
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $tag=Tag::find($id);
            if($tag==NULL){
                return $this->failure("Not Found",404);
            }
            $tag->delete();
            return $this->success("Tag Deleted Successfully", null);
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }
    }
}
