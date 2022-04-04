<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\Admin\AuthorResource;
use App\Models\Author;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('author_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuthorResource(Author::all());
    }

    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        if ($request->input('author_simplefile', false)) {
            $author->addMedia(storage_path('tmp/uploads/' . basename($request->input('author_simplefile'))))->toMediaCollection('author_simplefile');
        }

        if ($request->input('author_profilepic', false)) {
            $author->addMedia(storage_path('tmp/uploads/' . basename($request->input('author_profilepic'))))->toMediaCollection('author_profilepic');
        }

        return (new AuthorResource($author))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Author $author)
    {
        abort_if(Gate::denies('author_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AuthorResource($author);
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        if ($request->input('author_simplefile', false)) {
            if (!$author->author_simplefile || $request->input('author_simplefile') !== $author->author_simplefile->file_name) {
                if ($author->author_simplefile) {
                    $author->author_simplefile->delete();
                }
                $author->addMedia(storage_path('tmp/uploads/' . basename($request->input('author_simplefile'))))->toMediaCollection('author_simplefile');
            }
        } elseif ($author->author_simplefile) {
            $author->author_simplefile->delete();
        }

        if ($request->input('author_profilepic', false)) {
            if (!$author->author_profilepic || $request->input('author_profilepic') !== $author->author_profilepic->file_name) {
                if ($author->author_profilepic) {
                    $author->author_profilepic->delete();
                }
                $author->addMedia(storage_path('tmp/uploads/' . basename($request->input('author_profilepic'))))->toMediaCollection('author_profilepic');
            }
        } elseif ($author->author_profilepic) {
            $author->author_profilepic->delete();
        }

        return (new AuthorResource($author))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Author $author)
    {
        abort_if(Gate::denies('author_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $author->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
