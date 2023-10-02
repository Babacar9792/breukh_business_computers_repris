<?php

namespace App\Http\Resources\SuccusaleProduit;

use App\Trait\Shared;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProduitBySuccursaleCollection extends ResourceCollection
{
    use Shared;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return $this->responseData("", $this->collection, true);
    }


    public function paginationInformation($request, $paginated, $default)
    {
        return ["links" => $default["meta"]["links"]];
    }
}
