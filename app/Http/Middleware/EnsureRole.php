<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    /**
     * Handle an incoming request.
     * Usage in routes: ->middleware('role:evaluator')
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            // Redirect to the user's correct home if they access wrong role's area
            if ($request->user()) {
                return match ($request->user()->role) {
                    'evaluator' => redirect()->route('evaluator.dashboard'),
                    'admin'     => redirect()->route('evaluator.dashboard'),
                    default     => redirect()->route('inovator.dashboard'),
                };
            }

            return redirect()->route('login');
        }

        return $next($request);
    }
}
