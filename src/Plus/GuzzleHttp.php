<?php


namespace Pour\Plus;


class GuzzleHttp
{
    /**
     * 强制请求使用ipv4协议，解决php-curl和wget非常慢的问题
     * @return array
     */
    static function forceResolveIpv4()
    {
        return ['curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4]];
    }
}