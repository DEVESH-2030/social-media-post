<?php

namespace App\Traits;

use App\Enums\BucketColorEnum;
use App\Enums\IsBucketEnum;

trait BucketTrait
{
    /**
     * Get existing bucket template as Backlog and Completed 
     * it can be use when create, update, delete workglow
     * @param $payload
     * @return mixed
     */
    private function existingBucketTemplates($payload)
    {
        return  [
                    [
                        'workflow_id' => $payload->id,
                        'name'        => 'Backlog',
                        'color'       => BucketColorEnum::ORANGE,
                        'is_default'  => IsBucketEnum::ISACTIVE,
                        'is_complete' => IsBucketEnum::ISINACTIVE,
                    ],
                    [
                        'workflow_id' => $payload->id,
                        'name'        => 'Completed',
                        'color'       => BucketColorEnum::PURPLE,
                        'is_default'  => IsBucketEnum::ISINACTIVE,
                        'is_complete' => IsBucketEnum::ISACTIVE,
                    ],
                ];
    }
}