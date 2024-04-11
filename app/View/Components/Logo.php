<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Logo extends Component
{
    public $src;

    public function __construct($src = 'default-logo.png')
    {
        $src = asset("website/assets/images/company-logo.png");
        $this->src = $src ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.logo');
    }
}
