<?php

namespace App\Http\Requests;

use App\Models\Author;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAuthorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('author_create'),
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
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'email:rfc',
                'nullable',
            ],
            'desc' => [
                'string',
                'nullable',
            ],
            'pass' => [
                'string',
                'nullable',
            ],
            'yesno' => [
                'nullable',
                'in:' . implode(',', array_keys(Author::YESNO_RADIO)),
            ],
            'multiplechoice' => [
                'nullable',
                'in:' . implode(',', array_keys(Author::MULTIPLECHOICE_SELECT)),
            ],
            'switch' => [
                'boolean',
            ],
            'counter' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'bignum' => [
                'numeric',
                'nullable',
            ],
            'budget' => [
                'numeric',
                'nullable',
            ],
            'birthday' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'author.birthtime' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'alarm' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }
}
