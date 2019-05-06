<?php
namespace App\Response;


trait ResponseJson
{
    /**
     * 当app接口出现业务异常时返回
     * @param $code
     * @param $message
     * @param array $data
     */
    public function jsonData($code,$message,$data = []){
        $this->jsonResponse($code,$message,$data);
    }

    /**
     * App接口请求成功时返回
     * @param array $data
     * @return mixed
     */
    public function jsonSuccessData($data = []){
        return $this->jsonResponse(0,'Successed',$data);
    }
    /**
     * 返回一个json
     */
    public function jsonResponse($code, $message, $data){
        $content = [
            'code' => $code,
            'message' => $message,
            'data' => $data];
        return json_encode($content,JSON_UNESCAPED_UNICODE);
    }
}
