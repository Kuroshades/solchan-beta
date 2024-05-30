<?php

namespace App\Http\Resources;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'parent' => $this->parent,
            'timestamp' => $this->timestamp,
            'bumped' => $this->bumped,
            'name' => $this->name,
            'subject' => $this->subject,
            'message' => $this->message,
            'password' => $this->password,
            'file' => $this->file ? config('app.alpha_url') . '/src/' . $this->file : null,
            'file_hex' => $this->file_hex,
            'file_original' => $this->file_original,
            'file_size' => $this->file_size,
            'file_size_formatted' => $this->file_size_formatted,
            'image_width' => $this->image_width,
            'image_height' => $this->image_height,
            'thumb' => $this->thumb ? config('app.alpha_url') . '/thumb/' . $this->thumb : null,
            'thumb_width' => $this->thumb_width,
            'thumb_height' => $this->thumb_height,
            'stickied' => $this->stickied,
            'locked' => $this->locked,
            'pfp' => $this->pfp->pfp_link ?? null,
            'sent_tips' => new TipCollection($this->tipperTips),
            'received_tips' => $this->tippedTips->sum('amount'),
            'received_tips_in_usd' => $this->tippedTips->sum('amount') * Price::orderBy('timestamp', 'desc')->first()->price,
            'reply_count' => $this->replies->count(),
            'image_count' => $this->replies->whereNotNull('file')->count(),
            'replies' => new PostCollection($this->replies),
        ];
    }
}
