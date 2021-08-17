<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Hosts extends Component
{
    public $hosts;
    public function mount()
    {
        $this->hosts = DB::table('hosts')
            ->join('host_item', 'hosts.id', '=', 'host_item.host_id')
            ->join('items', 'items.id', '=', 'host_item.item_id')
            ->select('hosts.name' as 'Host Name', 'items.name' as 'Item Name', 'host_item.item_quantity' )
            ->get();
    }


    public function render()
    {
        return view('livewire.hosts')->layout('layouts.guest');
    }
}
