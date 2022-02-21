<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ArticleResource extends JsonResource
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
        if (count($this->user->valorations) != 0) {
            foreach ($this->user->valorations as $valorationItem) {
                $totalStars += $valorationItem->stars;
            }
            $valoration = ($totalStars / count($this->user->valorations));
        }

        $mensajes = [];
        foreach ($this->messages as $message) {
            $mensaje = array($message->message,$message->userTransmitter->name, $message->userTransmitter->imagen);
            array_push($mensajes,$mensaje);
        }
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "owner"=> [
                'name'=>$this->user->name,
                'img'=>$this->user->imagen],
            "valoration"=> $valoration ,
            "category"=>$this->category->name,
            "tags"=> $this->tags,
            "description"=>$this->description,
            "price"=>$this->price,
            "longitud"=>$this->longitud,
            "latitud"=>$this->latitud,
            "messages"=>$mensajes,
        ];
    }
}

