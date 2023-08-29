<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public string  $redirectUrl,
        public string  $title,
        public ?string $description = null,
        public string $btnText = 'Acessar',
        public string $class = '',
    )
    {
    }

    public function render(): View
    {
        return view('components.card');
    }
}
