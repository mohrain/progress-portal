<li class="nav-item">
    <a class="nav-link" aria-current="page" href="/">गृह पृष्ठ</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        प्रदेश सभा
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 'parathasha-sabha-paracaya') }}">प्रदेश सभा परिचय</a>
        </li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="#">पदाधिकारीहरु</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="{{ route('pages.show', 'sasathaya-thalhara') }}">संसदीयदलहरु</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="#">पुर्व पदाधिकारीहरु</a></li>

    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        प्रदेश सभा सचिवालय
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="{{ route('pages.show', 'sagathanaka-saracana') }}">संगठनिक संरचना</a>
        </li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="{{ route('pages.show', 'tharabnatha-saracana') }}">दरबन्दी संरचना</a></li>
        <hr class="dropdown-divider">
        <li><a class="dropdown-item" href="{{ route('employees.frontendIndex') }}">कर्मचारीहरु</a></li>
    </ul>
</li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        सदस्यहरु
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="{{route('members.frontendIndex')}}">सदस्यहरुको सुची</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="{{route('members.frontendIndexOld')}}">भू.पु.सदस्यहरुको सुची </a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        समिती
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">विधायन तथा प्रदेश समिती</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">सबजनिक लेखा समिती </a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">अर्थ विकास तथा प्राकृतिक स्रोत समिती</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">सार्बजनिक विकास समिती</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        विधेयक
    </a>
    <x-bill-type-view />
</li>
<x-post-category-menu-view />
<li class="nav-item">
    <a class="nav-link" href="#">फोटो संग्रह</a>
</li>
