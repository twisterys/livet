<?php

namespace App\Http\Livewire\Author;

use App\Models\Author;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Author $author;

    public string $pass = '';

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Author $author)
    {
        $this->author = $author;
        $this->initListsForFields();
        $this->mediaCollections = [
            'author_simplefile' => $author->simplefile,
            'author_profilepic' => $author->profilepic,
        ];
    }

    public function render()
    {
        return view('livewire.author.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->author->pass = $this->pass;
        $this->author->save();
        $this->syncMedia();

        return redirect()->route('admin.authors.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->author->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'author.name' => [
                'string',
                'nullable',
            ],
            'author.email' => [
                'email:rfc',
                'nullable',
            ],
            'author.desc' => [
                'string',
                'nullable',
            ],
            'pass' => [
                'string',
            ],
            'author.yesno' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['yesno'])),
            ],
            'author.multiplechoice' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['multiplechoice'])),
            ],
            'author.switch' => [
                'boolean',
            ],
            'author.counter' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'author.bignum' => [
                'numeric',
                'nullable',
            ],
            'author.budget' => [
                'numeric',
                'nullable',
            ],
            'author.birthday' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'author.birthtime' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'author.alarm' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'mediaCollections.author_simplefile' => [
                'array',
                'nullable',
            ],
            'mediaCollections.author_simplefile.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.author_profilepic' => [
                'array',
                'nullable',
            ],
            'mediaCollections.author_profilepic.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['yesno']          = $this->author::YESNO_RADIO;
        $this->listsForFields['multiplechoice'] = $this->author::MULTIPLECHOICE_SELECT;
    }
}
