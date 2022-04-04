@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.author.title_singular') }}:
                    {{ trans('cruds.author.fields.id') }}
                    {{ $author->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.id') }}
                            </th>
                            <td>
                                {{ $author->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.name') }}
                            </th>
                            <td>
                                {{ $author->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $author->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $author->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.desc') }}
                            </th>
                            <td>
                                {{ $author->desc }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.pass') }}
                            </th>
                            <td>
                                **********
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.yesno') }}
                            </th>
                            <td>
                                {{ $author->yesno_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.multiplechoice') }}
                            </th>
                            <td>
                                {{ $author->multiplechoice_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.switch') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $author->switch ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.counter') }}
                            </th>
                            <td>
                                {{ $author->counter }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.bignum') }}
                            </th>
                            <td>
                                {{ $author->bignum }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.budget') }}
                            </th>
                            <td>
                                {{ $author->budget }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.birthday') }}
                            </th>
                            <td>
                                {{ $author->birthday }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.birthtime') }}
                            </th>
                            <td>
                                {{ $author->birthtime }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.alarm') }}
                            </th>
                            <td>
                                {{ $author->alarm }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.simplefile') }}
                            </th>
                            <td>
                                @foreach($author->simplefile as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.author.fields.profilepic') }}
                            </th>
                            <td>
                                @foreach($author->profilepic as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('author_edit')
                    <a href="{{ route('admin.authors.edit', $author) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection