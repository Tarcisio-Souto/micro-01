<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *   description="Companies model",
 *   title="Companies",
 *   required={},
 *   @OA\Property(type="integer",description="category_id of Company",title="category_id",property="category_id",example="1",readOnly="true"),
 *   @OA\Property(type="string",description="name of Company",title="name",property="name",example="Coca-Cola"),
 *   @OA\Property(type="string",description="phone of Company",title="phone",property="phone",example="99999-1992"),
 *   @OA\Property(type="string",description="whatsapp of Company",title="whatsapp",property="whatsapp",example="99999-1992"),
 *   @OA\Property(type="string",description="email of Company",title="email",property="email",example="company@company.com"),
 *   @OA\Property(type="string",description="facebook of Company",title="facebook",property="facebook",example="company profile"), 
 *   @OA\Property(type="string",description="instagram of Company",title="instagram",property="instagram",example="company profile"), 
 *   @OA\Property(type="string",description="youtube of Company",title="youtube",property="youtube",example="company channel")
 * )
 * 
 */



class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->uuid,
            'name' => $this->name,
            'category' => new CategoryResource($this->category),
            'url' => $this->url,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube
        ];
    }
}
