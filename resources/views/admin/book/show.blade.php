@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.book.title_singular') }}:
                    {{ trans('cruds.book.fields.id') }}
                    {{ $book->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.id') }}
                            </th>
                            <td>
                                {{ $book->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.author') }}
                            </th>
                            <td>
                                @if($book->author)
                                    <span class="badge badge-relationship">{{ $book->author->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.title') }}
                            </th>
                            <td>
                                {{ $book->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('book_edit')
                    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection