<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class APIv02Test extends TestCase {
	private $http;
	
	protected function setUp() : void {
		$this->http = new GuzzleHttp\Client([
			'base_uri' => 'http://localhost:8080/index.php/apps/notes/api/v0.2/',
			'auth' => ['test', 'test'],
			'http_errors' => false,
		]);
	}

	public function testGetNotes() : void {
		$response = $this->http->request('GET', 'notes');
		$this->assertEquals(200, $response->getStatusCode());
		$this->assertEquals(
			"application/json; charset=utf-8",
			$response->getHeaders()["Content-Type"][0]
		);
		// TODO test example notes
		// $userAgent = json_decode($response->getBody())->{"..."};
	}

	public function testCreateNote() : void {
		// TODO
	}

	public function testGetNonExistingNoteFails() : void {
		$response = $this->http->request('GET', 'notes/1');
		$this->assertEquals(404, $response->getStatusCode());
	}

	protected function tearDown() : void {
		$this->http = null;
	}
}

