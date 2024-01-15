<?php

namespace App\Http\Resources\Engagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class EngagementResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => 'engagement',
            'bride_name' => $this->bride_name,
            'bride_qualification' => $this->bride_qualification,
            'bride_grandparents' => $this->bride_grandparents,
            'bride_parents' => $this->bride_parents,
            'bride_current_city' => $this->bride_current_city,
            'bride_native_city' => $this->bride_native_city,
            'groom_name' => $this->groom_name,
            'groom_qualification' => $this->groom_qualification,
            'groom_grandparents' => $this->groom_grandparents,
            'groom_parents' => $this->groom_parents,
            'groom_current_city' => $this->groom_current_city,
            'groom_native_city' => $this->groom_native_city,
            'bride_image_url' => $this->getImageUrl($this->bride_image_url),
            'groom_image_url' => $this->getImageUrl($this->groom_image_url),
        ];
    }

    private function getImageUrl($imagePath)
    {
        return Storage::url("public/$imagePath");
    }
}
