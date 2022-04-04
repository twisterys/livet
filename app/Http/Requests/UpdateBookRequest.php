<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('book_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'author_id' => [
                'integer',
                'exists:authors,id',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
