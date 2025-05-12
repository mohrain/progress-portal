<div class="bg-white light-shadow rounded font-noto main-sidebar" style="overflow-y: scroll;min-height:100vh">
    <div class=" text-center rounded">
        <div class="mun-title-card">
          <a href="/">
            <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo"
            height="50px">
        <div class="mt-2">
            <div>{{ settings('app_name') }}</div>
            <div>{{ settings('office_name') }}</div>
            <div>{{ settings('province_name') }}</div>
        </div>
          </a>
        </div>
    </div>
    <div class="sidebar-menu parent-menu {{ setActive('dashboard') }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <span class="text-warning"><i class="fa fa-cube pr-2"></i></span>ड्यासबोर्ड
        </a>
    </div>
    @hasanyrole('super-admin|admin')
    <div class="sidebar-menu {{ setActive('meetings.index') }}">
        <a href="{{ route('meetings.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success"><i class="bi bi-megaphone pr-2"></i></span>बैठकहरु
        </a>
    </div>
    <div class="sidebar-menu {{ setActive('bills.index') }}">
        <a href="{{ route('bills.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success"><i class="i bi-file-earmark-richtext pr-2"></i></span>विधेयकहरु
        </a>
    </div>
    {{-- <div class="sidebar-menu multi-level">
            <a href="#" aria-expanded="false" class="nav-link parent-menu">
                <span><span class="text-success"><i class="bi bi-megaphone pr-2"></i></span>Configuration</span>
                <i class="fas fa-angle-right arrow-icon"></i>
            </a>

            <div class="sub-menus">
                <a href="{{ route('posts.index') }}" aria-expanded="false" class="nav-link">
    <span class="text-success pr-4"></span>पोस्टहरु
    </a>
    <a href="{{ route('pages.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success pr-4"></span>पेजहरु
    </a>

</div>
</div> --}}

{{-- <li class="nav-item {{ setActive('carousel-images.*') }}">
<a href="{{ route('carousel-images.index') }}" aria-expanded="false" class="nav-link">
    <span class="text-success"><i class="bi bi-file-earmark-slides"></i></span>स्लाइडर फोटोहरु
</a>
</li> --}}
<div class="sidebar-menu {{ setActive('posts.index') }}">
    <a href="{{ route('posts.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-file-earmark-slides pr-2"></i></span>पोस्टहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('pages.index') }}">
    <a href="{{ route('pages.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-file-earmark-slides pr-2"></i></span>पेजहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('committee.*') }}">
    <a href="{{ route('committee.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-plus pr-2"></i></span>समिति
    </a>
</div>
<div class="sidebar-menu multi-level">
    <a href="#" aria-expanded="false" class="nav-link parent-menu">
        <span><span class="text-success"><i class="bi bi-youtube pr-2"></i></span>Media</span>
        <i class="fas fa-angle-right arrow-icon"></i>
    </a>

    <div class="sub-menus">
        <a href="{{ route('live.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>प्रत्यक्ष प्रसारण
        </a>
        <a href="{{ route('album.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>Gallery
        </a>
        <a href="{{ route('carousel-images.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>Video Gallery
        </a>
        <a href="{{ route('carousel-images.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>स्लाइडर फोटोहरु
        </a>
        <a href="{{ route('modal-images.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>मोडाल फोटोहरु
        </a>
    </div>
</div>
<div class="sidebar-menu {{ setActive('members.*') }}">
    <a href="{{ route('members.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-person-raised-hand pr-2"></i></span>सदस्यहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('office-bearers.*') }}">
    <a href="{{ route('office-bearers.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-person-bounding-box pr-2"></i></span>पदाधिकारीहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('employees.*') }}">
    <a href="{{ route('employees.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-person-vcard pr-2"></i></span>कर्मचारीहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('information-officers.*') }}">
    <a href="{{ route('information-officers.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-person-video pr-2"></i></span>सूचना अधिकारीहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('provincial-assembly-library.*') }}">
    <a href="{{ route('provincial-assembly-library.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-book pr-2"></i></span> पुस्तकालय
    </a>
</div>
<div class="sidebar-menu {{ setActive('contact-us.*') }}">
    <a href="{{ route('contact-us.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-info-lg pr-2"></i></span>सुझाव/प्रतिक्रियाहरू
    </a>
</div>
<div class="sidebar-menu {{ setActive('faq.*') }}">
    <a href="{{ route('faq.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-question-lg pr-2"></i></span>प्राय: सोधिने प्रश्नहरू
    </a>
</div>
<div class="sidebar-menu {{ setActive('current-parliamentary-parties.*') }}">
    <a href="{{ route('current-parliamentary-parties.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="bi bi-align-end pr-2"></i></span>राजनीतिक दलहरू
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.list') }}">
    <a href="{{ route('department.list') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fas fa-cog pr-2"></i></span>कार्यालय शाखाहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('ward.index') }}">
    <a href="{{ route('ward.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fas fa-cog pr-2"></i></span>वडा
    </a>
</div>

@can('user.*')
<div class="sidebar-menu {{ setActive('user.index') }}">
    <a href="{{ route('user.index') }}" aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-users pr-2"></i></span>प्रयोगकर्ताहरू
    </a>
</div>
@endcan
@hasrole('super-admin')
<div class="sidebar-menu multi-level">
    <a href="#" aria-expanded="false" class="nav-link parent-menu">
        <span><span class="text-success"><i class="fas fa-cog pr-2"></i></span>सेटिङहरू</span>
        <i class="fas fa-angle-right arrow-icon"></i>
    </a>

    <div class="sub-menus">
       
        <a href="{{ route('post-categories.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>पोस्ट प्रकार
        </a>
        <a href="{{ route('post-category-menu.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>पोस्ट प्रकार मेनु
        </a>
        <a href="{{ route('bill-types.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>विधयेक प्रकार
        </a>
        <a href="{{ route('meeting-types.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>बैठकको प्रकार
        </a>
        <a href="{{ route('bill-categories.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>विधयेक वर्ग
        </a>
      
        <a href="{{ route('ranks.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span> कर्मचारी श्रेणी
        </a>
        <a href="{{ route('primary-menus.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span> मेनु 
        </a>
    
        <a href="{{ route('employee-designations.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span> कर्मचारी पदहरु
        </a>
        <a href="{{ route('bearer-designations.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span> प्रतिनिधि पदहरु
        </a>
     
        <a href="{{ route('federal.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>कार्यपालिका
        </a>

    </div>
</div>
<div class="sidebar-menu multi-level">
    <a href="#" aria-expanded="false" class="nav-link parent-menu">
        <span><span class="text-success"><i class="fas fa-cog pr-2"></i></span>कनफयूग्रेशन</span>
        <i class="fas fa-angle-right arrow-icon"></i>
    </a>

    <div class="sub-menus">
        <a href="{{ route('sms.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>SMS
        </a>
        <a href="{{ route('ministries.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>मन्त्रालयहरु
        </a>
        <a href="{{ route('parliamentary-parties.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>राजनीतिक दलहरु
        </a>
        <a href="{{ route('employee-types.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span> जागिरको स्तिथि
        </a>
      
        <a href="{{ route('elections.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>निर्वाचन वर्षहरू
        </a>
        <a href="{{ route('settings.index') }}" aria-expanded="false" class="nav-link">
            <span class="text-success pr-4"></span>एप सेटिङहरू
        </a>
    </div>
</div>


@endhasrole
@endhasanyrole




@hasanyrole('sachib')
@php
$committeeSecretary = session('current_committee_secretary')
? \App\Models\CommitteeSecretary::find(session('current_committee_secretary'))
: Auth::user()->employee->committeeSecretary;
if (!$committeeSecretary) {
$committeeSecretary = Auth::user()->employee->committeeSecretary; // Fallback again
}
@endphp
<div class="sidebar-menu {{ setActive('committee.general') }}">
    <a href="{{ route('committee.general', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fas fa-cog pr-2"></i></span>सामान्य जानकारी
    </a>
</div>

{{-- <div class="p-2 text-center rounded">
            <div class="mun-title-card">
                <div class="mt-2">
                    <h3 class="text-center">{{ $committeeSecretary->committee->id->name }}</h3>

</div>
</div>
</div> --}}

<div class="sidebar-menu {{ setActive('committee.show-about-form') }}">
    <a href="{{ route('committee.show-about-form', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-info-circle pr-2"></i></span>परिचय
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.show-responsibility-form') }}">
    <a href="{{ route('committee.show-responsibility-form', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-tasks pr-2"></i></span>काम, कर्तव्य र अधिकार
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.notices') }}">
    <a href="{{ route('committee.notices', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-flag pr-2"></i></span>सूचनाहरु
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.activities') }}">
    <a href="{{ route('committee.activities', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-rss pr-2"></i></span>गतिविधिहरु
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.downloads') }}">
    <a href="{{ route('committee.downloads', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-download pr-2"></i></span>प्रकाशनहरु/डाउनलोडस्
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.members') }}">
    <a href="{{ route('committee.members', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-users pr-2"></i></span>समिति सदस्यहरु
    </a>
</div>

<div class="sidebar-menu {{ setActive('committee.audio') }}">
    <a href="{{ route('committee.audio', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-headphones pr-2"></i></span>अडियो
    </a>
</div>
<div class="sidebar-menu {{ setActive('committee.video.index') }}">
    <a href="{{ route('committee.video.index', $committeeSecretary->committee->id) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-film pr-2"></i></span>भिडियो
    </a>
</div>
@endhasanyrole

@hasanyrole('hod')

@php
$availableDepartments = Auth::user()->employee->departments ;

$department = session('current_department')
? \App\Models\Department::find(session('current_department'))
: Auth::user()->employee->department;

if (!$department) {
$department = Auth::user()->employee->department; // Fallback again
}

@endphp
{{-- <div class="p-2 text-center rounded">
            <div class="mun-title-card">
                <div class="mt-2">
                    <h3 class="text-center">{{ Auth::user()->employee->department->name }}</h3>

</div>
</div>
</div> --}}
@hasanyrole('sachib')
<div class=" font-bold px-3 py-2 mt-3 " style="color: red; border-bottom:1px solid #ccc; font-weight: bold;">
    शाखा विवरण
</div>
@endhasanyrole

<div class="sidebar-menu {{ setActive('department.subdepartment') }}">
    <a href="{{ route('department.subdepartment', $department->slug) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-boxes pr-2"></i></span>शाखाहरु
    </a>
</div>



<div class="sidebar-menu {{ setActive('department.edit') }}">
    <a href="{{ route('department.edit', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-info-circle pr-2"></i></span>परिचय
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.duty') }}">
    <a href="{{ route('department.duty', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-tasks pr-2"></i></span>काम, कर्तव्य र अधिकार
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.notices') }}">
    <a href="{{ route('department.notices', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-flag pr-2"></i></span>सूचनाहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.activity') }}">
    <a href="{{ route('department.activity', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-rss pr-2"></i></span>गतिविधिहरु
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.publications') }}">
    <a href="{{ route('department.publications', $department->slug) }}"
        aria-expanded="false" class="nav-link">
        <span class="text-success"><i class="fa fa-download pr-2"></i></span>प्रकाशनहरु/डाउनलोडस्
    </a>
</div>
<div class="sidebar-menu {{ setActive('department.media') }}">
    <a href="{{ route('department.media', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-headphones pr-2"></i></span>अडियो
    </a>
</div>

<div class="sidebar-menu {{ setActive('department.video') }}">
    <a href="{{ route('department.video', $department->slug) }}" aria-expanded="false"
        class="nav-link">
        <span class="text-success"><i class="fa fa-film pr-2"></i></span>भिडियो
    </a>
</div>
@endhasanyrole

@hasanyrole('super-admin')
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.logs') }}" target="_blank">
        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i></span>लग प्रणाली
    </a>
</li>
@endhasanyrole

{{-- <a class="nav-link" href="{{ route('dashboard') }}">
<span class="text-warning"><i class="fa fa-cube"></i></span>ड्यासबोर्ड
</a> --}}

</div>
@push('scripts')
<script>
    // $(".parent-item").click(function() {
    //     $(this).toggleClass("active-menu");
    // });

    $(document).ready(function() {
        // $(".parent-item").click(function() {
        //     $(this).toggleClass("active-menu");
        //     localStorage.setItem("activeMenu", $(this).attr("id"));
        // });

        $(".sidebar-menu").click(function() {
            $(".sidebar-menu").removeClass("active");
            $(".sidebar-menu").removeClass("active-multi");
            $('.sidebar-menu').not($(this)).removeClass('active-menu');
            $(this).toggleClass("active-menu");

            // $(this).toggleClass("active-menu",!$(this).hasClass("sidebar-menu")
            $(this).addClass("active-multi");
        })

        var activeMenu = localStorage.getItem("activeMenu");
        if (activeMenu) {
            $("#" + activeMenu).addClass("active-menu");
        }
    });
</script>
@endpush