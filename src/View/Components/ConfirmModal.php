<?php

namespace JoulesLabs\IllumineAdmin\View\Components;

use Illuminate\View\Component;

class ConfirmModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $formId = null, //$formId will be used for submit button to target the form 
        public ?string $id = null,
        public ?string $title = null,
        public ?string $deny = null,
        public ?string $confirm = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.components.confirm-modal');
    }
}
