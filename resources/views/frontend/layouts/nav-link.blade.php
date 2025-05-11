<li class="nav-item">
    <a class="nav-link" aria-current="page" href="/">गृह पृष्ठ</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        परिचय
    </a>

    @php
    $pages=[];
    $pages = \App\Page::where('status',1)->get();
    @endphp

    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        {{-- <li>
            <a class="dropdown-item" href="{{ route('pages.show', 1) }}"> संक्षिप्त परिचय</a>
        </li> --}}
        {{-- <li>
            <a class="dropdown-item" href="{{ route('office-bearers.frontendIndex') }}">पदाधिकारीहरु</a>
        </li> --}}

        @foreach ($pages as $page)
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', $page->id) }}">{{ $page->title }}</a>
        </li>
        @endforeach
        <li><a class="dropdown-item" href="{{ route('members.frontendIndex') }}"> निर्बाचित जनप्रतिनिधि </a></li>
        <li><a class="dropdown-item" href="{{ route('employees.frontendIndex') }}">कर्मचारी विवरण</a></li>

        {{-- <li>
            <a class="dropdown-item" href="{{ route('office-bearers.frontendIndex') }}">पदाधिकारीहरु</a>
        </li> --}}


        {{-- <li>
            <a class="dropdown-item" href="{{ route('current-parliamentary-parties.frontendIndex') }}">संसदीय दल</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('office-bearers.frontendIndexOld') }}">पूर्व पदाधिकारीहरु</a>
        </li> --}}
    </ul>

</li>
<li class="nav-item">
    {{-- <a class="nav-link" href="{{{route('department.index')}}}">
        कार्यक्रम तथा परियोजना
    </a> --}}
    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 2) }}">संगठनिक संरचना</a>
</li>
<li><a class="dropdown-item" href="{{ route('pages.show', 3) }}">दरबन्दी संरचना</a></li>
<li><a class="dropdown-item" href="{{ route('employees.frontendIndex') }}">कर्मचारी विवरण</a></li>
<li><a class="dropdown-item" href="{{ route('employees.frontendIndexOld') }}">पूर्व कर्मचारी विवरण</a></li>
</ul> --}}
</li>



{{-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        सदस्यहरु
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{ route('members.frontendIndex') }}">सदस्यहरुका विवरण</a></li>
        <li><a class="dropdown-item" href="{{ route('members.frontendIndexOld') }}">पूर्व सदस्यहरुका विवरण </a></li>
    </ul>
</li> --}}
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        समिति
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach (\App\Models\Committee::get() as $committee)
        <li><a class="dropdown-item" href="{{ route('frontend.committees.show', $committee->slug) }}">{{ $committee->name }}</a></li>
        @endforeach

    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        विधेयक
    </a>
    <x-bill-type-view />
</li>
<x-post-category-menu-view />
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        अनलाईन सेवा

     </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="https://donidcr.gov.np/">घटना दर्ता </a></li>
        <li><a class="dropdown-item" href="https://donidcr.gov.np/">सामाजिक सुरक्षा </a></li>
        <li><a class="dropdown-item" href="https://charter.mohrain.com">वडापत्र </a></li>
        <li><a class="dropdown-item" href="#"> निवेदनको ढाँचा </a></li>
        <li><a class="dropdown-item" href="https://business.ghodaghodi.com"> अनलाईन व्यवसाय दर्ता </a></li>
        <li><a class="dropdown-item" href="https://sifarish.ghodaghodimun.gov.np/">अनलाईन  सिफारिस </a></li>
        <li><a class="dropdown-item" href="https://suchidarta.ghodaghodi.com/">सुची दर्ता </a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="/gallery">फोटो संग्रह</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('contact-us.create') }}">सम्पर्क  </a>

</li>