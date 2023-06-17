<?php

namespace App\Http\Middleware;

use App\Models\category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $categoriess = Category::get();
       view()->share(['category'=>$categoriess]);
       return $next($request);
    }
}
