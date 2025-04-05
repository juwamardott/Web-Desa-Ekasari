<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */


     public function handle(Request $request, Closure $next)
     {
         $ip = $request->ip();
         $userAgent = $request->header('User-Agent');
         $today = Carbon::today();
     
         $visitorSessionKey = 'visited_today_' . $ip . '_' . $today;
     
         // Cek jika pengunjung sudah dihitung di sesi ini
         if (!session()->has($visitorSessionKey)) {
             // Cek apakah visitor dengan IP ini sudah tercatat hari ini
             $visitor = Visitor::where('date', $today)
                             ->first();
     
             if ($visitor) {
                 // Jika sudah ada, update jumlahnya hanya jika session belum ada
                 // Jangan lakukan increment jika session key ada
                 $visitor->increment('count');
             } else {
                 // Jika belum ada, buat record baru
                 Visitor::create([
                     'date' => $today,
                     'count' => 1,
                     'ip_address' => $ip,
                     'user_agent' => $userAgent
                 ]);
   
             }
         }
           
                 // Tandai pengunjung sudah dihitung untuk sesi ini
                 session([$visitorSessionKey => true]);
     
         return $next($request);
     }


}