<?php

namespace Yormy\Apiresponse\Tests\Unit;

use Yormy\Apiresponse\Facades\ApiResponse;
use Yormy\Apiresponse\Tests\TestCase;

class DataTest extends TestCase
{
    /**
     * @test
     *
     * @group data
     */
    public function SimpleData(): void
    {
        $data = [
            'Hello' => 'some-data',
        ];
        $responseValue = Apiresponse::withData($data)->successResponse();

        $content = $this->getDataField($responseValue);

        $this->assertEquals(json_encode($data), $content);
    }

    /**
     * @test
     *
     * @group data
     */
    public function NestedDataField(): void
    {
        $data = [
            'Hello' => 'some-data',
            'data' => [
                'extra' => 'data',
            ],
        ];
        $responseValue = Apiresponse::withData($data)->successResponse();
        $content = $this->getDataField($responseValue);

        $this->assertEquals(json_encode($data), $content);
    }

    // --------- HELPERS ---------
    private function getDataField($responseValue): string
    {
        return json_encode(json_decode($responseValue->getContent())->data);
    }
}
