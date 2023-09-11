<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="/companies",
     *      operationId="getCompaniesList",
     *      tags={"Companies"},
     *      summary="Get list of companies",
     *      description="Returns list of companies",
     *      @OA\Parameter(name="filter", in="query", description="filter", required=false,
     *        @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompanyResource")
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
    public function index(Request $request)
    {
        $companies = $this->repository->getCompanies($request->get('filter', ''));
        return CompanyResource::collection($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * @OA\Post(
     *      path="/companies",
     *      operationId="storeCompanies",
     *      tags={"Companies"},
     *      summary="Store new company",
     *      description="Returns company data",
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"category_id", "name", "phone", "whatsapp", "email", "facebook", "instagram", "youtube"},
     *               @OA\Property(property="category_id", type="integer"),
     *               @OA\Property(property="name", type="string"),
     *               @OA\Property(property="phone", type="string"),
     *               @OA\Property(property="whatsapp", type="string"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="facebook", type="string"),
     *               @OA\Property(property="instagram", type="string"),
     *               @OA\Property(property="youtube", type="string"),
     *            ),
     *         ),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"category_id", "name", "phone", "whatsapp", "email", "facebook", "instagram", "youtube"},
     *               @OA\Property(property="category_id", type="integer"),
     *               @OA\Property(property="name", type="string"),
     *               @OA\Property(property="phone", type="string"),
     *               @OA\Property(property="whatsapp", type="string"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="facebook", type="string"),
     *               @OA\Property(property="instagram", type="string"),
     *               @OA\Property(property="youtube", type="string"),
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
    public function store(StoreUpdateCompanyRequest $request)
    {
        $company = $this->repository->create($request->all());
        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $company = $this->repository->where('uuid', $uuid)->firstOrFail();
        return new CompanyResource($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */


    /**
     * @OA\Put(
     *      path="/companies/{uuid}",
     *      operationId="updateCompany",
     *      tags={"Companies"},
     *      summary="Update company",
     *      description="Update company data",
     *      @OA\Parameter(name="uuid", description="uuid", required=true, in="path", @OA\Schema(type="string")),
     *      @OA\RequestBody(
     *         @OA\JsonContent(
     *            @OA\Schema(
     *               type="object",
     *               required={"category_id", "name", "phone", "whatsapp", "email", "facebook", "instagram", "youtube"},
     *               @OA\Property(property="category_id", type="integer"),
     *               @OA\Property(property="name", type="string"),
     *               @OA\Property(property="phone", type="string"),
     *               @OA\Property(property="whatsapp", type="string"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="facebook", type="string"),
     *               @OA\Property(property="instagram", type="string"),
     *               @OA\Property(property="youtube", type="string"),
     *            ),
     *         ),
     *         @OA\MediaType(
     *            mediaType="application/x-www-form-urlencoded",
     *            @OA\Schema(
     *               type="object",
     *               required={"category_id", "name", "phone", "whatsapp", "email", "facebook", "instagram", "youtube"},
     *               @OA\Property(property="category_id", type="integer"),
     *               @OA\Property(property="name", type="string"),
     *               @OA\Property(property="phone", type="string"),
     *               @OA\Property(property="whatsapp", type="string"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="facebook", type="string"),
     *               @OA\Property(property="instagram", type="string"),
     *               @OA\Property(property="youtube", type="string"),
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
    public function update(StoreUpdateCompanyRequest $request, $uuid)
    {
        $company = $this->repository->where('uuid', $uuid)->firstOrFail();
        $company->update($request->all());
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $company = $this->repository->where('uuid', $uuid)->firstOrFail();
        $company->delete();
        return response()->json(['message' => 'success']);
    }
}
