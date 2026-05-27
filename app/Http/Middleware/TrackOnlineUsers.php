<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class TrackOnlineUsers
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->ajax() || $request->wantsJson() || $request->method() !== 'GET') {
            return $next($request);
        }

        try {
            $userId = Auth::check() ? Auth::id() : null;
            $url = rtrim(config('app.url'), '/') . '/' . $request->path();

            DB::table('user_onlines')->updateOrInsert(
                [
                    'user_id'    => $userId,
                    'ip_address' => $request->ip(),
                    'url'        => $url,
                ],
                [
                    'last_activity' => now(),
                ]
            );

            DB::table('user_onlines')
                ->where('user_id', $userId)
                ->where('url', $url)
                ->where('last_activity', '<', now()->subMinutes(5))
                ->delete();
        } catch (Throwable $e) {
            Log::warning('TrackOnlineUsers middleware failed: ' . $e->getMessage());
        }

        return $next($request);
    }
}
