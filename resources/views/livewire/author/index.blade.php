<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('author_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Author" format="csv" />
                <livewire:excel-export model="Author" format="xlsx" />
                <livewire:excel-export model="Author" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.author.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.desc') }}
                            @include('components.table.sort', ['field' => 'desc'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.yesno') }}
                            @include('components.table.sort', ['field' => 'yesno'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.multiplechoice') }}
                            @include('components.table.sort', ['field' => 'multiplechoice'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.switch') }}
                            @include('components.table.sort', ['field' => 'switch'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.counter') }}
                            @include('components.table.sort', ['field' => 'counter'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.bignum') }}
                            @include('components.table.sort', ['field' => 'bignum'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.budget') }}
                            @include('components.table.sort', ['field' => 'budget'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.birthday') }}
                            @include('components.table.sort', ['field' => 'birthday'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.birthtime') }}
                            @include('components.table.sort', ['field' => 'birthtime'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.alarm') }}
                            @include('components.table.sort', ['field' => 'alarm'])
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.simplefile') }}
                        </th>
                        <th>
                            {{ trans('cruds.author.fields.profilepic') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($authors as $author)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $author->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $author->id }}
                            </td>
                            <td>
                                {{ $author->name }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $author->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $author->email }}
                                </a>
                            </td>
                            <td>
                                {{ $author->desc }}
                            </td>
                            <td>
                                {{ $author->yesno_label }}
                            </td>
                            <td>
                                {{ $author->multiplechoice_label }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $author->switch ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $author->counter }}
                            </td>
                            <td>
                                {{ $author->bignum }}
                            </td>
                            <td>
                                {{ $author->budget }}
                            </td>
                            <td>
                                {{ $author->birthday }}
                            </td>
                            <td>
                                {{ $author->birthtime }}
                            </td>
                            <td>
                                {{ $author->alarm }}
                            </td>
                            <td>
                                @foreach($author->simplefile as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($author->profilepic as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('author_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.authors.show', $author) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('author_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.authors.edit', $author) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('author_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $author->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $authors->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush