<?php

namespace App\Http\Resources;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tipper_id' => $this->tipper_id,
            'tipped_id' => $this->tipped_id,
            'tipper_name' => $this->tipper_name,
            'tipped_name' => $this->tipped_name,
            'amount' => $this->amount,
            'amount_in_usd' => $this->amount * Price::orderBy('timestamp', 'desc')->first()->price,
            'timestamp' => $this->timestamp,
            'tx' => "https://solscan.io/tx/" . $this->tx,
        ];
    }
}
