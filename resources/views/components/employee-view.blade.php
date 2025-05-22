<div class="">

      <div class="bg-theme-color-blue py-2 text-center mb-3 rounded-1">
        कर्मचारीहरु
    </div>
    @foreach ($employees as $employee)
    <div class="officer-card mb-3">
        <div class="bg-pattern"></div>
        <div class="officer-card-content">
            <div class="officer-image">
                <a class="officer-image-wrap" href="{{ route('employees.show', $employee) }}">
                       <img id="newProfilePhotoPreview"
                                            src="{{ $employee->profile ? asset('storage/' . $employee->profile) : asset('assets/img/no-image.png') }}"
                                            class="profile-nav">
                </a>
            </div>
            <div class="officer-info">
                <a style="text-decoration: none; color:black; font-weight:600; " href="{{ route('employees.show', $employee) }}">
                    <h4 class="fw-bold">{{ $employee->name }}</h4>
                    <div>{{ $employee->wardEmployee->position }}</div>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


@push('styles')
<style>
    .bearer-container {
        width: 100%;
        height: 280px;
        margin-bottom: 5px;
        overflow: hidden;
        overflow-y: scroll;
        scrollbar-width: none;
        /* Firefox */
        -ms-overflow-style: none;
        /* IE and Edge */
    }

    .bearer-container::-webkit-scrollbar {
        display: none;
        /* Chrome, Safari, Opera */
    }

    .officer-card {
        background-color: #fff;
        border-radius: 6px;
        overflow: hidden;
        padding: 10px;
        position: relative;
        /* background-image: url('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,208C384,235,480,245,576,218.7C672,192,768,128,864,90.7C960,53,1056,43,1152,69.3C1248,96,1344,160,1392,192L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') */
        /* background-image: url("data:image/png;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNDQwIDMyMCI+PHBhdGggZmlsbD0iIzAwOTlmZiIgZmlsbC1vcGFjaXR5PSIxIiBkPSJNMCw2NEw0OCw1OC43Qzk2LDUzLDE5Miw0MywyODgsODBDMzg0LDExNyw0ODAsMjAzLDU3NiwyMTguN0M2NzIsMjM1 LDc2OCwxODEsODY0LDE3NkM5NjAsMTcxLDEwNTYsMjEzLDExNTIsMjE4LjdDMTI0OCwyMjQsMTM0 NCwxOTIsMTM5MiwxNzZMMTQ0MCwxNjBMMTQ0MCwzMjBMMTM5MiwzMjBDMTM0NCwzMjAsMTI0OCwz MjAsMTE1MiwzMjBDMTA1NiwzMjAsOTYwLDMyMCw4NjQsMzIwQzc2OCwzMjAsNjcyLDMyMCw1NzYs MzIwQzQ4MCwzMjAsMzg0LDMyMCwyODgsMzIwQzE5MiwzMjAsOTYsMzIwLDQ4LDMyMEwwLDMyMFoi PjwvcGF0aD48L3N2Zz4="); */
        background-image: url('/images/pattern/pattern-4.svg');
        background-position: top left;
        background-repeat: no-repeat;
        background-size: contain;
        box-shadow: rgba(99, 99, 99, 0.1) 0px 2px 8px 0px;
        transition: box-shadow 150ms;
    }

    .officer-card:hover {
        box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;
    }

    .officer-card-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .officer-card .officer-image {
        width: 40%;
        flex-shrink: 0;

    }

    .officer-card .officer-image .officer-image-wrap {
        display: block;
        aspect-ratio: 1/1;
    }

    .officer-card .officer-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 4px;
    }

    .officer-card .officer-info {
        flex-grow: 1;
        color: inherit;
    }

    .officer-card .officer-info h4 {
        font-size: 1rem;
        font-weight: 600;
    }

    .officer-card .officer-info div {
        color: gray;
    }
</style>
@endpush