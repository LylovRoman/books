<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role) : Response
    {
        // Проверяем, что пользователь аутентифицирован
        if ($request->user() && $request->user()->role === $role) {
            // Если у пользователя есть требуемая роль, пропускаем его дальше
            return $next($request);
        }

        // Если у пользователя нет требуемой роли, возвращаем ошибку или выполняем другое действие
        throw new HttpException(403, 'Отсутствует необходимая роль');
    }
}
