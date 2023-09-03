<?php

namespace App\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public function __construct(
        public string $url
    )
    {
    }

    public function render(): View
    {
        return view('components.buttons.back');
    }
}
