<?php 
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Option;
use App\Partener;
use App\Social;

class CommonComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $contactEmail   = Option::where('slug','contactEmail')->first()->value;
        $contactAddress = Option::where('slug','contactAddress')->first()->value;
        $contactPhone   = Option::where('slug','contactPhone')->first()->value;
        $logo           = Option::where('slug','logo')->first();

        $parteners      = Partener::get();
        $social         = Social::get();
        $view->with( compact('contactEmail', 'contactAddress', 'contactPhone', 'logo', 'parteners', 'social'));
    }
}