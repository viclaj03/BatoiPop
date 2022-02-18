<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */




    public function toArray($request)
    {
        $totalStars = 0;
        $valoration = $totalStars;
        if (count($this->valorations) != 0) {
            foreach ($this->valorations as $valorationItem) {
                $totalStars += $valorationItem->stars;
            }
            $valoration = ($totalStars / count($this->valorations));
        }
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "img"=>$this->imagen,
            "valoration"=> $valoration ,
            "location"=>$this->location,
            "valorationsUser"=> $this->valorations,

        ];
    }
}
