<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $repository;

    public function __construct(Category $category) {

        $this->repository = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    /**
     * @OA\Get(
     *      path="/categories",
     *      operationId="getCategoryList",
     *      tags={"Categories"},
     *      summary="Get list of categories",
     *      description="Returns list of categories",
     *      @OA\Parameter(name="filter", in="query", description="filter", required=false,
     *        @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        //return response()->json(['categories']);
        $categories = $this->repository->get();
        return CategoryResource::collection($categories);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * @OA\Post(
     *      path="/categories",
     *      operationId="storeCategories",
     *      tags={"Categories"},
     *      summary="Store new category",
     *      description="Returns category data",
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"title", "description"},
     *               @OA\Property(property="title", type="string"),
     *               @OA\Property(property="description", type="string")
     *            ),
     *         ),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"title", "description"},
     *               @OA\Property(property="title", type="string"),
     *               @OA\Property(property="description", type="string")
     *            ),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal error"
     *      ),
     * )
     */
    public function store(StoreUpdateCategoryRequest $request)
    {        
        $category = $this->repository->create($request->all());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/categories/{url}",
     *      tags={"Categories"},
     *      operationId="getCategory",
     *      summary="Get category",
     *      @OA\Parameter(
     *          name="url",
     *          in="path",
     *          required=true
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     * ),
     */
    public function show($url)
    {
        $category = $this->repository->where('url', $url)->firstOrFail();
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */

    
    /**
     * @OA\Put(
     *      path="/categories/{url}",
     *      operationId="updateCategory",
     *      tags={"Categories"},
     *      summary="Update category",
     *      description="Update category data",
     *      @OA\Parameter(name="url", description="url", required=true, in="path", @OA\Schema(type="string")),
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"title", "description"},
     *               @OA\Property(property="title", type="string"),
     *               @OA\Property(property="description", type="string"),
     *            ),
     *         ),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *               required={"title", "description"},
     *               @OA\Property(property="title", type="string"),
     *               @OA\Property(property="description", type="string"),
     *            ),
     *         ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation error"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal error"
     *      ),
     * )
     */
    public function update(StoreUpdateCategoryRequest $request, $url)
    {
        $category = $this->repository->where('url', $url)->firstOrFail();
        
        $category->update($request->all());
        
        return response()->json(['message' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */

    
    /**
     * @OA\Delete(
     *      path="/categories/{url}",
     *      tags={"Categories"},
     *      operationId="deleteCategory",
     *      summary="Delete category",
     *      @OA\Parameter(
     *          name="url",
     *          in="path",
     *          required=true
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     * ),
     */
    public function destroy($url)
    {
        $category = $this->repository->where('url', $url)->firstOrFail();

        $category->delete();

        return response()->json(['message' => 'success']);


    }
}
