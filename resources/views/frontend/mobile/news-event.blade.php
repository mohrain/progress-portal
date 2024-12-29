<div class=" bg-white p-2 mt-3">

    <h4 class="fw-bold mb-3">
        संग्रह
    </h4>
    <div class="d-flex gap-5" style="overflow-x: scroll">

        <a href="{{{route('department.index')}}}">
            <div class="text-center">

                <figure style="height: 60px; width:60px ">
                    <img src="https://cdn-icons-png.flaticon.com/256/6747/6747196.png" class=""
                        style="height: 60px; width:60px " alt="">
                </figure>
                <h5>
                    परिचय
                </h5>
            </div>
        </a>

        <a href="/gallery">
            <div class="text-center">
                <figure style="height: 60px; width:60px ">
                    <img src="https://cdn-icons-png.flaticon.com/512/1375/1375106.png" style="height: 60px; width:60px "
                        alt="">
                </figure>

                <h5>
                    ग्यालेरी
                </h5>

            </div>
        </a>

        <a href="{{ route('post-categories.show', 5) }}">
            <div class="text-center">

                <figure style="height: 60px; width:60px ">
                    <img src="https://www.freeiconspng.com/thumbs/legal-icon/legal-icon-png-27.png" class=""
                        style="height: 60px; width:60px " alt="">
                </figure>
                <h5>
                    एन, निएम
                </h5>
            </div>
        </a>


    </div>
</div>
