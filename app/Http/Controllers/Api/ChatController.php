<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactChatList(Request $request)
    {
        try {
            $listUsersContact = User::query();
            if (auth()->user()->role == 'visitor') {
                $listUsersContact->where('role', 'exhibitor');
            }
            if (auth()->user()->role == 'exhibitor') {
                $listUsersContact->where('role', 'visitor');
            }
            if ($request->search) {
                $listUsersContact->where('name', 'like', "%" . $request->search . "%");
            }
            $chats = [];
            foreach ($listUsersContact->get() as $key => $user) {
                $chat = '';
                if (count(auth()->user()->chats)) {
                    $chat = optional(collect(auth()->user()->chats->where('receiver_id', $user->id))->last())->message;
                }
                $user['message'] = $chat;
                array_push(
                    $chats,
                    $user
                );
            }

            return response()->json([
                'code' => 200,
                'type' => 'success',
                'message' => 'Data successfully fetched',
                'data' => $chats,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function ChatDetail(User $user)
    {
        try {
            $chats1 = Chat::with('receiver')->where(['sender_id' => auth()->id(), 'receiver_id' => $user->id])->get();
            $chats2 = Chat::with('sender')->where(['sender_id' => $user->id, 'receiver_id' => auth()->id()])->get();
            $chats = collect($chats1)->merge(collect($chats2))->sortBy('created_at')->values();
            if ($chats) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Data successfully fetched',
                    'data' => $chats,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Data failed to retrieve',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function sendChat(Request $request)
    {
        try {
            if (!empty($request->message) || !empty($request->has('photo'))) {
                if ($request->file('photo')) {
                    $name = md5($request->file('photo') . microtime()) . '.' . $request->file('photo')->extension();
                    $request->file('photo')->storeAs('photos', $name);
                    $chat = Chat::create(['sender_id' => auth()->id(), 'receiver_id' => $request->receiver_id, 'message' => $request->message, 'image' => $name]);
                } else {
                    $chat = Chat::create(['sender_id' => auth()->id(), 'receiver_id' => $request->receiver_id, 'message' => $request->message]);
                }
                if ($chat) {
                    return response()->json([
                        'code' => 200,
                        'type' => 'success',
                        'message' => 'Chat successfully sent',
                        'data' => $chat,
                    ], 200);
                } else {
                    return response()->json([
                        'code' => 400,
                        'type' => 'danger',
                        'message' => 'Chat failed to send',
                        'data' => 'Error sent',
                    ], 400);
                }
            } else {
                return response()->json([
                    'code' => 400,
                    'type' => 'danger',
                    'message' => 'Chat failed to send',
                    'data' => 'Error sent',
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Chat failed to send',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    public function deleteOwnChat(Request $request)
    {
        try {
            if (Chat::whereIn('id', $request->id)->delete()) {
                return response()->json([
                    'code' => 200,
                    'type' => 'success',
                    'message' => 'Chat successfully deleted',
                    'data' => 'Chat Deleted',
                ], 200);
            }
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Chat failed to delete',
                'data' => 'Error sent',
            ], 400);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'type' => 'danger',
                'message' => 'Chat failed to delete',
                'data' => $th->getMessage(),
            ], 400);
        }
    }
}
