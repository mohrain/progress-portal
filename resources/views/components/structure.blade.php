@if ($federalparliment?->document)
    <a target="_blank" href="{{ asset('storage') . '/' . $federalparliment->document }}">
        <div class="">
            <div class="d-flex justify-content-center">
                <figure style="height: 60px; width:60px ">
                    <img src="/images/mobile-icons/organization-structure.png" class=""
                        style="height: 60px; width:60px " alt="">
                </figure>
            </div>
            <h5>
                संगठनात्मक <br>
                संरचना
            </h5>
        </div>
    </a>
@else
    <a href="#">
        <div class="text-center">
            <div class="d-flex justify-content-center">

                <figure style="height: 60px; width:60px ">
                    <img src="/images/mobile-icons/organization-structure.png" class=""
                        style="height: 60px; width:60px " alt="">
                </figure>
            </div>
            <h5>
                संगठनात्मक <br>
                संरचना
            </h5>
        </div>
    </a>
@endif
