<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Pusher\Pusher;

class Chat extends Component
{
    use WithFileUploads;

    public $message;
    public $messages = [];
    public $receiver;
    public $users;
    public $lastMessage = '';
    public $file;
    public $loading = false; // Add a loading state variable
    public $progress;
    public $audio, $audioFile;


    public function mount()
    {
        $this->receiver = User::find(request()->query('receiver'));


        $userId = \auth()->id();

        $this->users = User::joinSub(function ($query) use ($userId) {
            $query->selectRaw('distinct case when sender_id <> ? then sender_id else receiver_id end as user_id', [$userId])
                ->from('chats')
                ->where('sender_id', '=', $userId)
                ->orWhere('receiver_id', '=', $userId);
        }, 'chats', function ($join) {
            $join->on('users.id', '=', 'chats.user_id');
        })->get();
    }

    public function messageReceived($data)
    {
        $this->messages[] = $data;
    }


    public function send()
    {
        $this->validate();
        $this->loading = true; // Set loading state to true during file upload



        if (isset($this->audio) && !empty($this->audio)) {
            $this->audioFile = $this->audio->storeAs(date('Y/m/d'), Str::random(50) . '.' . $this->audio->extension(), 'public');
        }

        if (isset($this->file) && !empty($this->file)) {
            $this->file = $this->file->storeAs(date('Y/m/d'), Str::random(50) . '.' . $this->file->extension(), 'public');
        }

        $this->loading = false; // Set loading state to false after file upload is complete

        if (!$this->receiver) {
            $this->addError('receiver', 'برجاء اختيار عضو لبدء المجادثه.');
            return;
        }
        $message = new \App\Models\Chat();
        $message->sender_id = Auth::id();
        $message->receiver_id = $this->receiver->id;
        $message->message = $this->message;
        $message->file = $this->file;
        $message->audio = $this->audioFile;

        $message->save();

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        $data = [
            'message' => $message->load('sender', 'receiver')
        ];

        $pusher->trigger('chat', "message", $data);

        $this->message = '';
        $this->file = '';
        $this->audio = null;
        $this->dispatchBrowserEvent('deleteRecord');
    }

    public function getListeners()
    {
        return [
            'messageReceived' => 'messageReceived',
        ];
    }


    protected function rules()
    {
        return [
            'message' => 'required',
            'file' => 'nullable',
            'audio' => 'nullable',
        ];
    }

    public function setReceiver($receiverId)
    {

        $this->receiver = User::find($receiverId);


        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        if (\auth()->id() != $receiverId) {
            $chats = \App\Models\Chat::where('sender_id', $this->receiver->id)
                ->where('receiver_id', auth()->id())
                ->whereNull('receiver_read_at');

            $pusher->trigger('chat', "countZero", $chats->count());

            $chats->update(['receiver_read_at' => now()]);
        } else {
            $chats = \App\Models\Chat::where('sender_id', auth()->id())
                ->where('receiver_id', $this->receiver->id)
                ->whereNull('sender_read_at');

            $pusher->trigger('chat', "countZero", $chats->count());
            $chats->update(['sender_read_at' => now()]);
        }


        $this->removeError();
    }

    public function removeError()
    {
        $this->resetErrorBag('receiver');
    }

    public function render()
    {
        if ($this->receiver) {
            $this->messages = \App\Models\Chat::with(['sender', 'receiver'])
                ->where(function ($query) {
                    $query->where('sender_id', Auth::id())
                        ->where('receiver_id', $this->receiver->id);
                })
                ->orWhere(function ($query) {
                    $query->where('sender_id', $this->receiver->id)
                        ->where('receiver_id', Auth::id());
                })
                ->oldest()
                ->get()->toArray(); // Remove the ->toArray() method call
        }

        $messages = $this->messages;
        $users = $this->users;

        return view('livewire.user.chat', compact('messages', 'users'))->layout('layouts.user_dashboard');
    }
}
