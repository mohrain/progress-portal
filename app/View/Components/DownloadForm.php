<?php

namespace App\View\Components;

use App\Models\Download;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class DownloadForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Download $download,
        public ?Model $attachToModel = null,
        public $redirectTo = null
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $downloadableType = $this->attachToModel
            ? get_class($this->attachToModel)
            : null;

        $downloadId = $this->attachToModel?->getKey() ?? null;

        return view('components.download-form', [
            'downloadableType' => $downloadableType,
            'downloadableId' => $downloadId,
            'updateMode' => $this->download->exists,
        ]);
    }
}
