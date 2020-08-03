<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Republics extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'title' => $this->title,
        'image_1' => $this->image_1,
        'image_2' => $this->image_1,
        'image_3' => $this->image_1,
        'category' => $this->category,
        'rental_per_month' => $this->rental_per_month,
        'footage' => $this->footage,
        'number_bath' => $this->number_bath,
        'number_bed' => $this->number_bed,
        'parking' => $this->parking,
        'animals' => $this->animals
      ];
    }
}
