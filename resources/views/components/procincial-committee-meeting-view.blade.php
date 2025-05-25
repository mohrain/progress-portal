@php
    // Mapping of meeting type IDs to specific colors
    $badgeColors = [
        1 => 'bg-primary text-white',  // Example: Meeting Type 1 gets bg-primary
        2 => 'bg-secondary text-white', // Example: Meeting Type 2 gets bg-secondary
        3 => 'bg-success text-white',   // Example: Meeting Type 3 gets bg-success
        4 => 'bg-danger text-white',    // Example: Meeting Type 4 gets bg-danger
        5 => 'bg-warning text-dark',    // Example: Meeting Type 5 gets bg-warning
        6 => 'bg-info text-dark',       // Example: Meeting Type 6 gets bg-info
        7 => 'bg-dark text-white',      // Example: Meeting Type 7 gets bg-dark
        8 => 'bg-light text-dark border border-secondary', // Example: Meeting Type 8 gets bg-light
    ];
@endphp

<ul class="posts-list">
    @forelse ($meetings as $meeting)
        <li class="post-item position-relative">
            @php
                // Assign color based on meeting type ID, default to bg-light if not mapped
                $badgeClass = $badgeColors[$meeting->meetingType->id] ?? 'bg-light text-dark border';
            @endphp

            <small class="meeting-type-tag {{ $badgeClass }}">
                {{ $meeting->meetingType->name ?? 'मिटिङ प्रकार छैन' }}
            </small>

            <div class="post-header mt-1">
                <div class="post-details">
                    <div class="post-title kalimati-font">
                        {{ $meeting->name }}
                    </div>
                    <div class="d-flex justify-content-between gap-3" style="font-size:12px">
                        <div>
                            <i class="bi bi-calendar-event me-1"></i>
                            <span id="date_bs-{{ $meeting->id }}"></span>
                        </div>
                        <div>
                            <i class="bi bi-clock me-1"></i>
                            <?php
                                $time = strtotime($meeting->time . ' Asia/Kathmandu');
                                echo (date('a', $time) === 'am') ? 'बिहानको ' : 'दिनको ';
                            ?>
                            {{ date('g:i', strtotime("$meeting->time Asia/Kathmandu")) }} बजे
                        </div>
                    </div>
                </div>
            </div>

           @if ($meeting->document)
           <a href="{{$meeting->document ? asset('/storage/'.$meeting->document) : "#"}}" target="_blank"> <i class="bi bi-download fw-bold"></i> </a>
           @endif
        </li>

        @push('scripts')
        <script>
            document.getElementById("date_bs-{{ $meeting->id }}").innerHTML =
                NepaliFunctions.AD2BS("{{ $meeting->date }}", "YYYY-MM-DD");
        </script>
        @endpush
    @empty
        <li class="no-posts">कुनैपनि मिटिङ छैन !!!</li>
    @endforelse
</ul>



@push('styles')
<style >
 .meeting-type-tag {
    position: absolute;
    top: 0;
    left: -8px;
    padding: 2px 6px;
    font-size: 10px;
    border-radius: 4px;
    z-index: 1;
}

    .categories {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
        justify-content: start;
        flex-wrap: wrap;
        background-color: #1c4267;
        padding: 10px;
    }
    
    .category-button {
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        background-color: transparent;
        /* Default gray */
        color: #e5e7eb;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    
        &.selected {
            background-color: #fff;
            color: #982121;
        }
    
        &:focus {
            outline: none;
        }
    }
    
    .posts-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        border-radius: 0.375rem;
        background-color: white;
        border: 1px solid #e5e7eb;
        divide-y: 1px solid #e5e7eb;
        cursor: pointer;
    
        .post-item {
            padding: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #d2d5dbc9;
    
            .post-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
    
                .post-details {
                    .post-title {
                        margin-top: 8px;
                        font-weight: 600;
                        font-size:16px

                    }
    
                    .post-date {
                        font-size: 0.875rem;
                        color: #6b7280;
                    }
                }
    
                .read-more {
                    display: flex;
                    align-items: center;
                    gap: 0.25rem;
                    color: #2563eb;
                    text-decoration: none;
    
                    &:hover {
                        text-decoration: underline;
                    }
                }
            }
        }

        .post-item:hover{
            background: #e5e7eb;
        }
    
        .no-posts {
            padding: 1rem;
            text-align: center;
            color: #6b7280;
        }
    }
    </style>
@endpush