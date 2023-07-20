<?php

namespace App\Http\Middleware\Shopping;

use App\Models\Purchase;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class check_user_purchase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->id != $request->purchase->user_id){
            return response()->json([
                'message' => "No tienes permiso para realizar esta acción",
                'error' => 'Unauthorized',
                'status' => 403,
            ], 403);
        }
        return $next($request);
    }
}
