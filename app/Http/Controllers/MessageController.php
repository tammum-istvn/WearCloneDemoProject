<?php

namespace App\Http\Controllers;

use App\Events\PusherEvent;
use App\models\Channel;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
use Pusher\PusherException;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getChat()
    {

        //        $channels = DB::select(
        //            "select users.first_name, users.picture, channels.id
        //from users join channels ON users.id = channels.sender_id
        // where channels.sender_id = " . Auth::id() . " or channels.receiver_id = " . Auth::id() . " "
        //        );
        //
        $channels = Channel::where('sender_id', Auth::id())->orWhere('receiver_id', Auth::id())->get();
        return $channels;
    }
    public function createChannel($id)
    {
        // when channel already created
        $my_id = Auth::id();
        $channel_id = Channel::where([
            ['sender_id', $my_id],
            ['receiver_id', $id]
        ])
            ->orWhere([
                ['sender_id', $id],
                ['receiver_id', $my_id]
            ])
            ->pluck('id')
            ->first();

        if ($channel_id) {
            return $channel_id;
        }

        // create a new channel
        $channel_id = Channel::create(['sender_id' => $my_id, 'receiver_id' => $id, 'status' => 'open'])->id;

        $sender = User::find($my_id);
        $receiver = User::find($id);

        $data = [
            'create' => 'createNew', 'sender_id' => $my_id, 'receiver_id' => $id,
            'sender_name' => $sender->first_name, 'receiver_name' => $receiver->first_name,
            'channel_id' => $channel_id, 'sender_pic' => $sender->picture, 'receiver_pic' => $receiver->picture
        ];

        $pusher = $this->getPusher();
        $pusher->trigger('my-channel', 'my-event', $data, null, true);
        return $channel_id;
    }


    public function getMessage($channel_id)
    {
        // Make all unread message to read
        $result = Message::where(['channel_id' => $channel_id])
            ->where([
                ['sender_id', '!=', Auth::id()],
                ['is_read', 0]
            ])
            ->update(['is_read' => 1]);
            
        // Get all message from selected user
        $messages = Message::where('channel_id', '=', $channel_id)->get();
        
        // Notify receiver
        if ($result) {
            $data = ['channel' => $channel_id];
            $pusher = $this->getPusher();
            $pusher->trigger('my-channel', 'my-event', $data, null, true);
        }

        return view('message.index', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $data = new Message();
        $data->channel_id = $request->channel_id;
        $data->sender_id = Auth::id();
        $data->message = $request->message;
        $data->save();

        $data = ['channel' => $request->channel_id]; // sending from and to user id when pressed enter
        $pusher = $this->getPusher();
        $pusher->trigger('my-channel', 'my-event', $data, null, true);
    }

    private function getPusher()
    {
        // pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        try {
            return new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );
        } catch (PusherException $e) {
        }

        return null;
    }
}
