<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Donor;
use App\Models\Gift;
use App\Models\Item;
use App\Models\Host;

class WebhookConfirmation extends Component
{    
    public $result;
    public $gift;
    public function mount(Request $request)
    {
        $this->result = $request->all();

        $donor = Donor::create([
            'order_token' => $this->result['content']['token'],
            'full_name' => $this->result['content']['billingAddressName'],
            'email_address' => $this->result['content']['email'],
            'address' => $this->result['content']['billingAddressAddress1'],
            'address_2' => $this->result['content']['billingAddressAddress2'],
            'city' => $this->result['content']['billingAddressCity'],
            'state' => $this->result['content']['billingAddressProvince'],
            'postal_code' => $this->result['content']['billingAddressPostalCode'],
        ]);

        $gift = Gift::create([
            'order_token' => $this->result['content']['token'],
            'donor_id' => $donor->id,
            'gift_total' => $this->result['content']['finalGrandTotal']
        ]);

        foreach ( $this->result['content']['items'] as $newItem )
        {
            $itemToStore = Item::where('name', $newItem['name'])->first();
            //$gift->items()->attach( [ 'item_id' => 1 ], [ 'item_quanity' => 1 ] );
        }

    }

    public function render()
    {
        return view('livewire.webhook-confirmation')->layout('layouts.guest');
    }
}
