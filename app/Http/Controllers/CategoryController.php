<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\RespondsWithHttpStatus;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
class CategoryController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->success("", CategoryResource::collection(Category::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        try {
            $category = Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return $this->success("New Category Created Successfully", new CategoryResource($category));
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
            $category=Category::find($id);
            if($category==NULL){
                return $this->failure("Not Found",404);
            }
            return $this->success("", new CategoryResource($category));
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
    public function update(CategoryRequest $request, $id)
    {
        //
        try {
            $category=Category::find($id);
            if($category==NULL){
                return $this->failure("Not Found",404);
            }
            $category->update($request->only(['title', 'description']));
            return $this->success("Category Updated Successfully", new CategoryResource($category));
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
            $category=Category::find($id);
            if($category==NULL){
                return $this->failure("Not Found",404);
            }
            $category->delete();
            return $this->success("Category Deleted Successfully", null);
        } catch (\Exception $exception) {
            Log::channel("stack")->info("An Exception occurred in file "
                . $exception->getFile() . " and the message is "
                . $exception->getMessage()
                . " at line " . $exception->getLine());
            return $this->failure("Server Error",500);
        }
    }
}
