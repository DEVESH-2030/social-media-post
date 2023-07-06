<?php

namespace App\Traits;

use Throwable;
use App\Models\ErrorLogs;

trait ErrorLog
{
    /**
     * Create error log
     * @param Throwable $th
     * @return mixed
     */
    public static function createError(Throwable $th)
    {
        /* Save/Create Error Messages */
        $errorMessages = ErrorLogs::create([
            'line'          => $th->getLine(),
            'error_code'    => $th->getCode(),
            'file'          => $th->getFile(),
            'error_message' => $th->getMessage(),
            'trace'         => $th->getTraceAsString(),
        ]);

        return $errorMessages;
    }

    /**
     * Give an response error
     * @param $error_code
     * @return mixed
     */
    public static function errorResponse($error_code)
    {
        return "Error Message: " . $error_code;
    }

    /**
     * Srtipe api error
     * @param $th
     * @return mixed
     */
    public function stripePlanError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "SP-ERR" . $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Subscription error
     * @param $th
     * @return mixed
     */
    public function subscriptionError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "LSP-ERR" . $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Payment Mathod error
     * @param $th
     * @return mixed
     */
    public function paymenyMethodError($th)
    {
        $errorLog = $this->createError($th);
        $errorLog->update(['error_code' => "PM-ERR" . $errorLog->id]);

        return $this->errorResponse($errorLog->error_code);
    }

    /**
     * Cancel subscription error
     * @param $th
     * @return mixed
     */
    public function cancelSubscriptionError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "LCS-ERR" . $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Whiteboard api error
     * @param $th
     * @return mixed
     */
    public function whiteboardError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "WB API-ERR" . $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * AWS s3 service error
     * @param $th
     * @return mixed
     */
    public function awsS3ServiceError($th)
    {
        $errorLog = $this->createError($th);
        $errorLog->update(['error_code' => "S3 API-ERR" . $errorLog->id]);

        return $this->errorResponse($errorLog->error_code);
    }

    /**
     * Comment api error
     * @param $th
     * @return mixed
     */
    public function commentError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "COMMENT API-ERR" . $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Task api error
     * @param $th
     * @return mixed
     */
    public static function taskError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "TASK API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * User log api error
     * @param $th
     * @return mixed
     */
    public function userLogError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "USER LOG API-ERR",  $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * API endpoint error
     * @param $th
     * @return mixed
     */
    public function apiError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "API-ERR",  $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Report api error
     * @param $th
     * @return mixed
     */
    public function reportError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "REPORT API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Project api error
     * @param $th
     * @return mixed
     */
    public function projectError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "PROJECT API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Notification api error
     * @param $th
     * @return mixed
     */
    public function notificationError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "NOTIFICATION API-ERR",  $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Reset password api error
     * @param $th
     * @return mixed
     */
    public function resetPasswrdError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "RESET PASSWORD API-ERR",  $errorLog->id]);

            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * TODO api error
     * @param $th
     * @return mixed
     */
    public static function todoError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "TODO API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Workflow api error
     * @param $th
     * @return mixed
     */
    public static function workflowError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "WORKFLOW API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Wiki api error
     * @param $th
     * @return mixed
     */
    public static function wikiError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "WIKI API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Credential api error
     * @param $th
     * @return mixed
     */
    public static function credentialError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "CREDENTIAL API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Activity api error
     * @param $th
     * @return mixed
     */
    public static function activityError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "ACTIVITY API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Job api error
     * @param $th
     * @return mixed
     */
    public function jobError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "JOB API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Job Activity api error
     * @param $th
     * @return mixed
     */
    public function jobActivityError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "JOB ACTIVITY API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Team api error
     * @param $th
     * @return mixed
     */
    public function teamError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "TEAM API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Rating api error
     * @param $th
     * @return mixed
     */
    public function ratingError($th)
    {
        if (!empty($th)) {
            $errorLog = $this->createError($th);
            $errorLog->update(['error_code' => "RATING API-ERR",  $errorLog->id]);
            return $this->errorResponse($errorLog->error_code);
        } else {
            return [];
        }
    }

    /**
     * Label api error
     * @param $th
     * @return mixed
     */
    public static function labelError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "LABEL API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Status api error
     * @param $th
     * @return mixed
     */
    public static function statusError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "STATUS API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Bucket api error
     * @param $th
     * @return mixed
     */
    public static function bucketError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "BUCKET API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Role api error
     * @param $th
     * @return mixed
     */
    public static function roleError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "ROLE API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Pipeline api error
     * @param $th
     * @return mixed
     */
    public static function pipelineError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "PIPELINE API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Pipeline api error
     * @param $th
     * @return mixed
     */
    public static function personaError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "PERSONA API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Pipeline api error
     * @param $th
     * @return mixed
     */
    public static function KpiError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "KPI API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    public function sendOtpError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "SEND OTP ERROR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }

    public function broadcastNotificationError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "BROADCAST NOTIFICATION ERROR" . $errorLog->id]);
        return self::errorResponse($errorLog->error_code);
    }
    
    public function screenshotErrors($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "SCREENSHOT ERROR" . $errorLog->id]);
        return self::errorResponse($errorLog->error_code);
    }

    /**
     * Feedback api error
     * @param $th
     * @return mixed
     */
    public static function feedbackError($th)
    {
        $errorLog = self::createError($th);
        $errorLog->update(['error_code' => "FEEDBACK API-ERR" . $errorLog->id]);

        return self::errorResponse($errorLog->error_code);
    }
}
