<?php

namespace App\Http\Composers;

use Illuminate\View\View;

/**
 * Class GlobalComposer
 * @package App\Http\Composers
 */
class GlobalComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('logged_in_user', auth()->user());
    }
}
