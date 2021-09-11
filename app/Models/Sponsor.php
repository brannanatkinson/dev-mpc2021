<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'amount', 'item_id', 'website', 'img'];

    public function matchTotal()
    {
        $progress = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select(DB::raw('SUM(gifts.gift_total) as total') )
            ->where('items.sponsor_id', '=', $this->id )
            ->get();
        return $progress;
    }

    public function isItemMatched()
    {
        $itemTotal = DB::table('items')
            ->join('gift_item', 'items.id', '=', 'gift_item.item_id')
            ->join('gifts', 'gifts.id', '=', 'gift_item.gift_id')
            ->select(DB::raw('SUM(gifts.gift_total) as total') )
            ->where('items.sponsor_id', '=', $this->id )
            ->get();
        $progress = $itemTotal < $this->amount;
        return $progress;
    }

}
