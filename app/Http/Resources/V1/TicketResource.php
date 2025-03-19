<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    //*change the $wrap variable to 'ticket'
    // public static $wrap = 'ticket';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "type"=> 'ticket',
            "id"=> $this->id, 
            "attributes"=> [
                "title"=> $this->title,
                "description"=> when($request->routeIs('tickets.show'), $this->description),
                "status"=> $this->status,
                "created_at"=> $this->created_at,
                "updated_at"=> $this->updated_at,
            ],
            "relationships"=> [
                "author"=> [
                    "data"=> [
                        "type"=> 'user',
                        "id"=> $this->user_id
                    ],
                "links"=> [
                    "self"=> "dummy"
                ],
            ],
        ],
            "links"=> [
                "self"=> route('tickets.show', ['ticket'=> $this->id])
            ]
            ,//*include the user resource
            "included"=> [
                new UserResource($this->whenLoaded('user'))
            ]

        ];

    }
}
