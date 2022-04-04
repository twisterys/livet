<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('author.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.author.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="author.name">
        <div class="validation-message">
            {{ $errors->first('author.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.author.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="author.email">
        <div class="validation-message">
            {{ $errors->first('author.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.desc') ? 'invalid' : '' }}">
        <label class="form-label" for="desc">{{ trans('cruds.author.fields.desc') }}</label>
        <textarea class="form-control" name="desc" id="desc" wire:model.defer="author.desc" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('author.desc') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.desc_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.pass') ? 'invalid' : '' }}">
        <label class="form-label" for="pass">{{ trans('cruds.author.fields.pass') }}</label>
        <input class="form-control" type="password" name="pass" id="pass" wire:model.defer="pass">
        <div class="validation-message">
            {{ $errors->first('author.pass') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.pass_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.yesno') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.author.fields.yesno') }}</label>
        @foreach($this->listsForFields['yesno'] as $key => $value)
            <label class="radio-label"><input type="radio" name="yesno" wire:model="author.yesno" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('author.yesno') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.yesno_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.multiplechoice') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.author.fields.multiplechoice') }}</label>
        <select class="form-control" wire:model="author.multiplechoice">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['multiplechoice'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('author.multiplechoice') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.multiplechoice_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.switch') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="switch" id="switch" wire:model.defer="author.switch">
        <label class="form-label inline ml-1" for="switch">{{ trans('cruds.author.fields.switch') }}</label>
        <div class="validation-message">
            {{ $errors->first('author.switch') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.switch_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.counter') ? 'invalid' : '' }}">
        <label class="form-label" for="counter">{{ trans('cruds.author.fields.counter') }}</label>
        <input class="form-control" type="number" name="counter" id="counter" wire:model.defer="author.counter" step="1">
        <div class="validation-message">
            {{ $errors->first('author.counter') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.counter_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.bignum') ? 'invalid' : '' }}">
        <label class="form-label" for="bignum">{{ trans('cruds.author.fields.bignum') }}</label>
        <input class="form-control" type="number" name="bignum" id="bignum" wire:model.defer="author.bignum" step="0.01">
        <div class="validation-message">
            {{ $errors->first('author.bignum') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.bignum_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.budget') ? 'invalid' : '' }}">
        <label class="form-label" for="budget">{{ trans('cruds.author.fields.budget') }}</label>
        <input class="form-control" type="number" name="budget" id="budget" wire:model.defer="author.budget" step="0.01">
        <div class="validation-message">
            {{ $errors->first('author.budget') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.budget_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.birthday') ? 'invalid' : '' }}">
        <label class="form-label" for="birthday">{{ trans('cruds.author.fields.birthday') }}</label>
        <x-date-picker class="form-control" wire:model="author.birthday" id="birthday" name="birthday" picker="date" />
        <div class="validation-message">
            {{ $errors->first('author.birthday') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.birthday_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.birthtime') ? 'invalid' : '' }}">
        <label class="form-label" for="birthtime">{{ trans('cruds.author.fields.birthtime') }}</label>
        <x-date-picker class="form-control" wire:model="author.birthtime" id="birthtime" name="birthtime" />
        <div class="validation-message">
            {{ $errors->first('author.birthtime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.birthtime_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('author.alarm') ? 'invalid' : '' }}">
        <label class="form-label" for="alarm">{{ trans('cruds.author.fields.alarm') }}</label>
        <x-date-picker class="form-control" wire:model="author.alarm" id="alarm" name="alarm" picker="time" />
        <div class="validation-message">
            {{ $errors->first('author.alarm') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.alarm_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.author_simplefile') ? 'invalid' : '' }}">
        <label class="form-label" for="simplefile">{{ trans('cruds.author.fields.simplefile') }}</label>
        <x-dropzone id="simplefile" name="simplefile" action="{{ route('admin.authors.storeMedia') }}" collection-name="author_simplefile" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.author_simplefile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.simplefile_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.author_profilepic') ? 'invalid' : '' }}">
        <label class="form-label" for="profilepic">{{ trans('cruds.author.fields.profilepic') }}</label>
        <x-dropzone id="profilepic" name="profilepic" action="{{ route('admin.authors.storeMedia') }}" collection-name="author_profilepic" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.author_profilepic') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.author.fields.profilepic_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.authors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>