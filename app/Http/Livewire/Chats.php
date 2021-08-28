<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Chats extends Component
{
    use WithFileUploads;

    public $message, $receiver_id, $photo, $isVisitor;

    public function render()
    {
        $chats = [];
        if ($this->receiver_id) {
            $chats1 = Chat::where(['sender_id' => auth()->id(), 'receiver_id' => $this->receiver_id])->get();
            $chats2 = Chat::where(['sender_id' => $this->receiver_id, 'receiver_id' => auth()->id()])->get();
            $chats = collect($chats1)->merge(collect($chats2))->sortBy('created_at')->values();
        }
        $users = Chat::where('receiver_id', auth()->id())->groupBy('sender_id')->get();
        $this->isVisitor = false;
        if (auth()->user()->role == 'visitor') {
            $users = User::where('id', '!=', auth()->id())->where('role', 'exhibitor')->get();
            $this->isVisitor = true;
        }
        return view('livewire.chats', ['chats' => $chats, 'users' => $users])->extends('layouts.app-dashboard')->section('content');
    }

    public function store()
    {
        if (!empty($this->message) || !empty($this->photo)) {
            if ($this->photo) {
                $name = md5($this->photo . microtime()) . '.' . $this->photo->extension();
                $this->photo->storeAs('photos', $name);
                Chat::create(['sender_id' => auth()->id(), 'receiver_id' => $this->receiver_id, 'message' => $this->message, 'image' => $name]);
            } else {
                Chat::create(['sender_id' => auth()->id(), 'receiver_id' => $this->receiver_id, 'message' => $this->message]);
            }

            $this->resetInputFields();
        }
    }

    private function resetInputFields()
    {
        $this->message = '';
        $this->photo = '';
    }

    public function setReceiver($receiver_id)
    {
        $this->receiver_id = $receiver_id;
    }
}
