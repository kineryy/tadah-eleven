<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RenderQueue;

class RenderController extends Controller
{
    public function getQueue(Request $request) {
        $queue = RenderQueue::all();

        foreach ($queue as $queueitem) {            
            $queue_array[] = [
                'Type'         => $queueitem->type,
                'Target_ID'    => $queueitem->target_id,
                'Queue_ID'     => $queueitem->id,
            ];
        }
        
        return response()->json($queue_array);
    }

    public function upload(Request $request) {
        $thumbnailKey = $request->thumbnailkey;
        $thumbQueueId = $request->thumbqueueid;

        if (!$thumbnailKey == config('app.thumbnail_key')) {
            abort(403);
        }

        if (!$thumbQueueId) {
            abort(400);
        }

        if (!$request->hasFile('file')) {
            abort(400);
        }

        $queue = RenderQueue::where(['id' => $thumbQueueId])->firstOrFail();

        if ($queue->type == "user") {
            $request->file('file')->move(storage_path() . '/app/public/users/', 'user_' . $queue->target_id . '.png');
        } else {
            $request->file('file')->move(storage_path() . '/app/public/items/', $queue->target_id . '_thumbnail.png');
        }

        $queue->delete();

        return 'OK';
    }

    public function getClothingCharApp(Request $request, $id)
    {
        return url('/xmlasset?id=' . $id);
    }
}
