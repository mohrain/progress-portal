<?php

namespace App\View\Components;

use App\Models\Committee;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class CommitteeWizardMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Committee $committee
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
        $committee = $this->committee;

        if (!$committee->id) {
            $committee->id = '#';
        }

        $menus = [
            [
                'route_name' => ('committee.general'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-info-circle"></i>',
                'title' => 'सामान्य जानकारी'
            ],
            [
                'route_name' => ('committee.show-about-form'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-info-circle"></i>',
                'title' => 'परिचय'
            ],
            [
                'route_name' => ('committee.show-responsibility-form'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-tasks"></i>',
                'title' => ' काम, कर्तव्य र अधिकार'
            ],
            [
                'route_name' => ('committee.notices'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-flag"></i>',
                'title' => 'सूचनाहरु'
            ],
            [
                'route_name' => ('committee.activities'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-rss"></i>',
                'title' => 'गतिविधिहरु'
            ],
            [
                'route_name' => ('committee.downloads'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-download"></i>',
                'title' => 'प्रकाशनहरु/डाउनलोडस्'
            ],
            [
                'route_name' => ('committee.members'),
                'route_param' => $committee->id,
                'icon' => '<i class="fa fa-users"></i>',
                'title' => 'समिति सदस्यहरु'
            ],
            
        ];

        foreach ($menus as &$menu) {
            $menu['active'] = request()->routeIs($menu['route_name']);
        }

        return view('components.committee-wizard-menu', [
            'menus' => $menus
        ]);
    }
}
