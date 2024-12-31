<div class=" bg-white p-2">

    <h4 class="fw-bold mb-3 text-theme-color">
        प्रदेश सभा
    </h4>
    <div class="d-flex gap-5" style="overflow-x: scroll">

        <a href="{{ route('pages.show', 1) }}">
            <div class="text-center">
                <div class="d-flex justify-content-center">

                    <figure style="height: 60px; width:60px ">
                        <img src="/images/mobile-icons/copy.png" class="" style="height: 60px; width:60px "
                            alt="">
                    </figure>
                </div>
                <h5>
                    परिचय
                </h5>
            </div>
        </a>

        <a href="{{ route('office-bearers.frontendIndex') }}">
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width:60px ">
                        <img src="/images/mobile-icons/committees.png" style="height: 60px; width:60px " alt="">
                    </figure>
                </div>

                <h5>
                    पदाधिकारी
                </h5>

            </div>
        </a>
        <a href="{{ route('pages.show', 5) }}">
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width:60px ">
                        <img src="/images/mobile-icons/structur.png" style="height: 60px; width:60px " alt="">
                    </figure>
                </div>
                <h5>
                    कार्यव्यवस्था परामर्श समिति
                </h5>

            </div>
        </a>

        <a href="{{ route('current-parliamentary-parties.frontendIndex') }}">
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width:60px ">
                        <img src="/images/mobile-icons/lawbook.png" style="height: 60px; width:60px " alt="">
                    </figure>
                </div>
                <h5>
                    संसदीय
                    दल
                </h5>

            </div>
        </a>

        <a href="{{ route('office-bearers.frontendIndexOld') }}">
            <div class="text-center">
                <div class="d-flex justify-content-center">
                    <figure style="height: 60px; width:60px ">
                        <img src="/images/mobile-icons/team.png" style="height: 60px; width:60px " alt="">
                    </figure>
                </div>
                <h5>
                    पूर्व पदाधिकारी
                </h5>

            </div>
        </a>
    </div>
</div>

<div class=" bg-white p-2 mt-3">

    <x-comittee-mobile />
</div>

<div class=" bg-white p-2 mt-3">

    <x-bidheyak-mobile />
</div>
