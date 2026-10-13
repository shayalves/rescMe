<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactPhoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'contact_id' => $this->contact_id,
            'international_code' => $this->international_code,
            'phone_number' => $this->phone_number,
            'main' => (bool) $this->main,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
