<?php

namespace App\Http\Controllers\AI;

use App\Helpers\AI\GenerateTextHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function generateText(Request $request)
    {
        try {
            $generateText = new GenerateTextHelper();
            $generateText = $generateText->generateText($request->prompt, $request->model, $request->max_tokens, $request->temperature);
            $generateText = $generateText['choices'][0];
            return redirect()->back();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}