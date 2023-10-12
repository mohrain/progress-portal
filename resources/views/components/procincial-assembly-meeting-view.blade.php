<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">प्रदेश सभा</th>
            <th scope="col">मिति</th>
            <th scope="col">समय</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($meetings as $meeting)
            <tr>
                <th class="kalimati-font">{{ $loop->iteration }}</th>
                <td>{{ $meeting->name }}</td>
                <td id="date_bs_table-{{ $meeting->id }}">
                </td>
                <td class="kalimati-font">
                    <?php
                    $time = strtotime($meeting->time . 'Asia/Kathmandu');
                    $formatted_time = date('g:i a', $time);
                    
                    if (date('a', $time) == 'am') {
                        echo 'बिहानको';
                    } elseif (date('a', $time) == 'pm') {
                        echo 'दिनको';
                    }
                    ?>
                    {{ date('g:i', strtotime("$meeting->time Asia/Kathmandu")) }}
                    बजे
                </td>
            </tr>
            @push('scripts')
                <script>
                    document.getElementById("date_bs_table-{{ $meeting->id }}").innerHTML = NepaliFunctions.GetBsFullDate(
                        NepaliFunctions.AD2BS("{{ $meeting->date }}"), true, "YYYY-MM-DD");
                </script>
            @endpush
        @empty
            <tr>
                <td colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
    </tbody>
</table>
