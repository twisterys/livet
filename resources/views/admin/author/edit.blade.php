@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.author.title_singular') }}:
                    {{ trans('cruds.author.fields.id') }}
                    {{ $author->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('author.edit', [$author])
        </div>
    </div>
</div>
@endsection