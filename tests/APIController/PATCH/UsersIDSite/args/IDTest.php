<?php

namespace Tests\APIController\PATCH\UsersIDSite;

class IDTest extends \Test\TestCase\Frontend
{
    protected $setUpDB = [
        'ru' => ['activities'],
        'users' => ['users']
    ];

    public function test__User_ID_equal_zero()
    {
        $uri = '/api/v1/ru/users/0/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e&site=' . urlencode('https://answeropedia.org');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'Incorrect user id or API-key',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }

    public function test__User_ID_below_zero()
    {
        $uri = '/api/v1/ru/users/-1/site.json?api_key=7d21ebdbec3d4e396043c96b6ab44a6e&site=' . urlencode('https://answeropedia.org');

        $request = $this->createRequest('PATCH', $uri);
        $response = $this->request($request);
        $response_body = (string) $response->getBody();

        $expected_response = [
            'error_code'    => 0,
            'error_message' => 'Incorrect user id or API-key',
        ];

        $this->assertSame(200, $response->getStatusCode());
        $this->assertEquals($expected_response, json_decode($response_body, true));
    }
}
