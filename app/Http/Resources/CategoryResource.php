<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @OA\Schema(
 *   description="Categories model",
 *   title="Categories",
 *   required={},
 *   @OA\Property(type="string",description="title of category",title="title",property="title",example="Comércio Varejista"),
 *   @OA\Property(type="string",description="description of category",title="description",property="description",example="Comércio de utilizadades do lar."),
 *   @OA\Property(type="string",description="url of category",title="url",property="url",example="comercio-varejista")
 * )
 * 
 */


class CategoryResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,            
            'slug' => $this->url,
            'date_created' => Carbon::make($this->created_at)->format('d/m/Y')
        ];
    }
}
