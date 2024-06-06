<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenAI;


class OpenAiController extends BaseController
{
    public function __invoke()
    {
        $response = $client->edits()->create([
            'model' => 'text-davinci-edit-001',
            'input' => 'What day of the wek is it?',
            'instruction' => 'Fix the spelling mistakes',
        ]);

        $response->object; // 'edit'
        $response->created; // 1589478378

        foreach ($response->choices as $result) {
            $result->text; // 'What day of the week is it?'
            $result->index; // 0
        }

        $response->usage->promptTokens; // 25,
        $response->usage->completionTokens; // 32,
        $response->usage->totalTokens; // 57

        $response->toArray(); // ['object' => 'edit', ...]
    }
}
