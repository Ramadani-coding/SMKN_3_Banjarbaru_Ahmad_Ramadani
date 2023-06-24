<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Job_vacancieResource extends JsonResource
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
            'job_category_id' => $this->job_category_id,
            'category' => $this->job_categorie,
            'Company' => $this->company,
            'address' => $this->address,
            'description' => $this->description,
        ];
    }
}
