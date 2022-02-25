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
        $valorationNum = $totalStars;
        if (count($this->valorations) != 0) {
            foreach ($this->valorations as $valorationItem) {
                $totalStars += $valorationItem->stars;
            }
            $valorationNum  = ($totalStars / count($this->valorations));
        }

        $valoraciones = [];
        foreach ($this->valorations as $valorationItem) {
            $valoration = array($valorationItem->commentary,$valorationItem->user->name, $valorationItem->user->imagen);
            array_push($valoraciones,$valoration);
        }
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "img"=>$this->imagen,
            "valoration"=> round($valorationNum),
            "location"=>$this->location,
            "valorationsUser"=> $valoraciones,
        ];
    }
}
