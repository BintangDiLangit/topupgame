<?php


namespace App\Helpers\AI;
use OpenAI;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GenerateTextHelper{

    protected $openAI;
    public function __construct()
    {
        $apikey = env('API_KEY_OPENAI');
        $orgId = env('ORG_ID');

        $this->openAI = OpenAI::factory()
        ->withApiKey($apikey)
        ->withOrganization($orgId) // default: null
        ->withBaseUri('api.openai.com/v1') // default: api.openai.com/v1
        ->withHttpClient($client = new \GuzzleHttp\Client([])) // default: HTTP client found using PSR-18 HTTP Client Discovery
        ->withHttpHeader('X-My-Header', 'foo')
        ->withQueryParam('my-param', 'bar')
        ->withStreamHandler(fn(RequestInterface $request): ResponseInterface => $client->send($request, [
            'stream' => true // Allows to provide a custom stream handler for the http client.
        ]))
        ->make();
    }
    public function generateText($prompt="Write an blog post about http://bimy-store.com, it should in HTML format, include 5 unique points, 
    using informative tone.", $model="text-davinci-003", $max_tokens=800, $temperature = 0.85)
    {
        try {
            $response = $this->openAI->completions()->create([
                'model' => $model,
                'prompt' => $prompt,
                'max_tokens' => $max_tokens,
                'n' => 1,
                'temperature' => $temperature,
            ]);
            $usage = $response;
            return $usage;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}