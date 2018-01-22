<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\IpUtils;

class RedirectInvalidIPs
{
    protected $ips = [
//        local system
        '127.0.0.1',
////        pietercoeckestraat
        '198.199.86.94',
        '77.166.134.82',
////        daalakkersweg
        '89.20.177.129',
    ];

    protected $ipRanges = [
//        '10.11.3.1',
    ];

    protected $location;

    public function __construct()
    {
        $this->location = new \App\Location();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($request->getClientIps()[0]);
//        dd($this->isValidIp($request->getClientIps()[0]));
        foreach ($request->getClientIps() as $ip) {
            if (! $this->isValidIp($ip) && !$this->isValidIpRange($ip)) {
                abort(403, 'access denied, use the local wifi');
            }
        }

        return $next($request);
    }

    protected function isValidIp($ip)
    {
        return in_array($ip, $this->ips);
    }

    protected function isValidIpRange($ip)
    {
        return IpUtils::checkIp($ip, $this->ipRanges);
    }
}
