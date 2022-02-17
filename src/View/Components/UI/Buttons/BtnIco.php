<?php

namespace JoulesLabs\IllumineAdmin\View\Components\UI\Buttons;

use Illuminate\View\Component;

class BtnIco extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public ?string $url = null,
        public ?string $icon = null,
        public ?string $size = null,
        public ?string $type = null,
        public ?string $id = null,
        public ?string $class = null,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('admin.components.u-i.buttons.btn-ico');
    }
}
