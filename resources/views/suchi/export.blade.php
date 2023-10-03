<table>
    <thead>
        <tr>
            <th>क्र.स.</th>
            <th>दर्ता नं.</th>
            <th>संस्था</th>
            <th>दर्ता मिति</th>
            <th>प्रकार</th>
            <th>माेबाइल नंं.</th>
            <th>रकम</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suchis as $suchi)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $suchi->full_reg_no }}</td>
            <td>{{ $suchi->name }}</td>
            <td>{{ $suchi->reg_date }}</td>
            <td>{{ $suchi->suchiType->title }}</td>
            <td>{{ $suchi->mobile }}</td>
            <td>{{ $suchi->receipt_amount ? 'रु ' . $suchi->receipt_amount : '-'  }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
