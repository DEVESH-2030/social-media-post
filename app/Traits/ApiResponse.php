<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * @param array|object $data
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function responseSuccess($data, int $status_code, string $message = "Successful"): JsonResponse
    {
        return $this->response(true, $data, $message, [], $status_code);
    }

    /**
     * @param array $errors
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function responseError(array $errors, int $status_code, string $message = 'Data is invalid'): JsonResponse
    {
        return $this->response(false, [], $message, $errors, $status_code);
    }

    /**
     * @param array $errors
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public static function responseErrorLog(array $errors, int $status_code, string $message,): JsonResponse
    {
        return self::response(false, [], $message, $errors, $status_code);
    }

    /**
     * @param array|object $data
     * @param string $message
     * @param int $status_code
     * @return JsonResponse
     */
    public function responseErrorWithData($data, int $status_code, string $message = "No data found"): JsonResponse
    {
        return $this->response(true, $data, $message, [], $status_code);
    }

    /**
     * @param bool $status
     * @param $data
     * @param string $message
     * @param array $errors
     * @param int $status_code
     * @return JsonResponse
     */
    static function response(bool $status, $data, string $message, array $errors, int $status_code): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'errors'  => $errors,
            'data'    => $data,
        ], $status_code);
    }
}
