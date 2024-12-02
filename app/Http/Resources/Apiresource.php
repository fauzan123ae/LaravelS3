<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Apiresource extends JsonResource
{
    public $status;
    public $pesan;
    public $resource;

    public function __construct($resource, $pesan, $status)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->pesan = $pesan;
        $this->resource = $resource;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return array(
            "pesan" => $this->pesan,
            "status" => $this->status,
            "data" => $this->resource,
        );
    }
}
