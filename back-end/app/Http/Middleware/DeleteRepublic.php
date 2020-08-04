<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Republic;

class DeleteRepublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
      $user = Auth::user();
      $republics = Republic::with('user')->where('user_id', $user->id)->where('id', $request->id)->first();

      if($republics) {
        return $next($request);
      }
      else {
        return response()->json(['Vc nao tem permissao!']);
      }
    }
}
