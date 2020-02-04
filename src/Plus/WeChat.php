<?php

namespace Famio\Saber\Facades\Plus;

class WeChat
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

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $appid
     * @param $sessionKey
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    static function decryptData($appid, $sessionKey, $encryptedData, $iv, &$data)
    {
        $OK = 0;
        $IllegalAesKey = -41001;
        $IllegalIv = -41002;
        $IllegalBuffer = -41003;
        $DecodeBase64Error = -41004;

        if (strlen($sessionKey) != 24) {
            return $IllegalAesKey;
        }
        $aesKey = base64_decode($sessionKey);


        if (strlen($iv) != 24) {
            return $IllegalIv;
        }
        $aesIV = base64_decode($iv);

        $aesCipher = base64_decode($encryptedData);

        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

        $dataObj = json_decode($result);
        if ($dataObj == NULL) {
            return $IllegalBuffer;
        }
        if ($dataObj->watermark->appid != $appid) {
            return $IllegalBuffer;
        }
        $data = $result;
        return $OK;
    }
}