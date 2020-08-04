<?php

namespace App\Http\Middleware;

use Closure;

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
      $user = User::Auth();
      $republics = $user->republics;
      foreach($republics as $user_republic) { //percorre o array de republicas do user
        if($user_republic->id == $request) //verifica se o id da republica dada pertence ao user
        $response = $next($request); //se sim, passa o request
        return $response;
      }
    }
}
