<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Apiresource extends JsonResource
{
    public $status;
    public $pesan;
    public $resource;

<<<<<<< HEAD
    public function __construct($resource, $pesan, $status)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->pesan = $pesan;
        $this->resource = $resource;
    }

=======
    public function __construct($resource, $pesan, $status){
        parent::__construct($resource);
        $this->status = $status;
        $this->pesan = $pesan;
    }
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    public function toArray($request): array
    {
        return array(
=======
    public function toArray(Request $request): array
    {
        return array (
>>>>>>> d1466008155c9fdac68c50282f68b8bdd982c6c4
            "pesan" => $this->pesan,
            "status" => $this->status,
            "data" => $this->resource,
        );
    }
}
