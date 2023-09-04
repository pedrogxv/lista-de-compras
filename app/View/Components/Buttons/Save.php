<?php

namespace App\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Save extends Component
{
    public function __construct(
        public string $text
    )
    {
    }

    public function render(): View
    {
        return view('components.buttons.save');
    }
}
