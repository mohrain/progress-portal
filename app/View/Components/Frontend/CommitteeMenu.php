<?php

namespace App\View\Components\Frontend;

use App\Models\Committee;
use Illuminate\View\Component;

class CommitteeMenu extends Component
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

        $menus = [
            [
                'route_name' => ('frontend.committees.show'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-info-circle"></i>',
                'title' => 'परिचय'
            ],
            [
                'route_name' => ('frontend.committees.responsibilities'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-tasks"></i>',
                'title' => ' काम, कर्तव्य र अधिकार'
            ],
            [
                'route_name' => ('frontend.committees.notices'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-flag"></i>',
                'title' => 'सूचनाहरु'
            ],
            [
                'route_name' => ('frontend.committees.activities'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-rss"></i>',
                'title' => 'गतिविधिहरु'
            ],
            [
                'route_name' => ('frontend.committees.downloads'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-download"></i>',
                'title' => 'प्रकाशनहरु/डाउनलोडस्'
            ],
            [
                'route_name' => ('frontend.committees.members'),
                'route_param' => $committee->slug,
                'icon' => '<i class="fa fa-users"></i>',
                'title' => 'समिति सदस्यहरु'
            ],

        ];

        foreach ($menus as &$menu) {
            $menu['active'] = request()->routeIs($menu['route_name']);
        }

        return view('components.frontend.committee-menu', [
            'menus' => $menus
        ]);
    }
}
