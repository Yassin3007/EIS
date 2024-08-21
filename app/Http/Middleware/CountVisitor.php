<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
class CountVisitor
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip =  $request->ip();
        if (!Visitor::where('date', today())->where('ip', $ip)->exists())
        {
            $visitor = new Visitor();
            $visitor->ip = $ip;
            $visitor->date = today();
            $visitor->save();
        }
        return $next($request);
    }
}
