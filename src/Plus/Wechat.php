<?php

namespace Famio\Saber\Facades;


class Wechat
{
    /**
     * 微信公众平台-JSSDK页面分享生成wx.config需要的参数
     * @param $appid
     * @param $jsapiTicket
     * @param $myurl
     * @param $timestamp
     * @param $nonceStr
     * @return mixed
     */
    static function getWXConfig($appid, $jsapiTicket, $myurl, $timestamp, $nonceStr)
    {
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$myurl";

        $signature = sha1($string);
        $WxConfig["appid"] = $appid;
        $WxConfig["noncestr"] = $nonceStr;
        $WxConfig["timestamp"] = $timestamp;
        $WxConfig["url"] = $myurl;
        $WxConfig["signature"] = $signature;
        $WxConfig["rawstring"] = $string;
        return $WxConfig;
    }
}