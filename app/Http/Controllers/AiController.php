```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AiController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $response = Http::withToken(config('services.openrouter.api_key'))
            ->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openrouter/free',

                'messages' => [
                    [
                        'role' => 'system',
                        'content' => <<<'PROMPT'
Kamu adalah Sekolahan Assistant, AI customer helper untuk website sekolah.

Tugasmu:
- Membantu pengunjung memahami informasi sekolah.
- Menjawab dengan bahasa Indonesia yang ramah dan natural.
- Jawaban harus singkat dan mudah dipahami.
- Jangan mengarang informasi tentang sekolah.
- Jika tidak mengetahui jawabannya, katakan dengan jujur bahwa informasi tersebut belum tersedia.

Untuk sekarang, kamu belum memiliki akses ke database sekolah.
PROMPT
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->message,
                    ],
                ],
            ]);

        if (! $response->successful()) {
            return response()->json([
                'message' => 'Maaf, AI sedang tidak tersedia.',
            ], 500);
        }

        return response()->json([
            'message' => $response->json('choices.0.message.content'),
        ]);
    }
}

