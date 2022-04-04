<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('book.author_id') ? 'invalid' : '' }}">
        <label class="form-label" for="author">{{ trans('cruds.book.fields.author') }}</label>
        <x-select-list class="form-control" id="author" name="author" :options="$this->listsForFields['author']" wire:model="book.author_id" />
        <div class="validation-message">
            {{ $errors->first('book.author_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.author_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.book.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="book.title">
        <div class="validation-message">
            {{ $errors->first('book.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>