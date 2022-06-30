<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function counter()
    {
        $total = Notification::where('user_id', Auth::user()->id)->where('read', 0)->count();
        return response()->json([
            'total' => $total,
        ]);
    }

    public function index()
    {
        $notifications = Notification::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $output = '';

        if ($notifications->count() > 0) {
            foreach ($notifications as $notification) {
                $output .= '
                    <a href="javascript:;" class="navi-item">
						<div class="navi-link">
							<div class="navi-icon mr-2">
                                <i class="fas fa-info-circle text-info"></i>
						    </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">' . $notification->message . '</div>
                                <div class="text-muted">' . $notification->created_at->diffForHumans() . '</div>
                            </div>
                        </div>
                    </a>';
            }
        } else {
            $output .= '
            <a href="javascript:;" class="navi-item">
                <div class="navi-link">
                    <div class="navi-text">
                        <div class="font-weight-bold">No new notifications</div>
                    </div>
                </div>
            </a>';
        }

        $notifications->each(function ($notification) {
            $notification->read = true;
            $notification->save();
        });

        return response()->json([
            'notifications' => $output,
        ]);
    }
}
