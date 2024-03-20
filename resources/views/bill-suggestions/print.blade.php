<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> {{ $title = $bill->name . '-सुझापहरु' }}</title>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            {{ $title = $bill->name . ' - सुझाप' }}
                        </div>

                    </div>

                    <div class="card-body">
                        @forelse($bill->billSuggestions as $billSuggestion)

                            @if ($billSuggestion->billSuggestionSectionWise->isNotEmpty())
                                <div>
                                    <table class="table table-md table-bordered kalimati-font">

                                        <tbody>

                                            <tr>
                                                <th>नाम</th>
                                                <td>{{ $billSuggestion->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>इमेल</th>
                                                <td>{{ $billSuggestion->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>सम्पर्क</th>
                                                <td>{{ $billSuggestion->contact_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>ठेगाना</th>
                                                <td>{{ $billSuggestion->address }}</td>
                                            </tr>

                                            {{-- <tr>
                                            <th>फाइल</th>
                                            <td>

                                                @if ($billSuggestion->file)
                                                    <a href="{{ asset('storage/' . $billSuggestion->file) }}"
                                                        class="btn btn-primary" target="_blank"
                                                        rel="noopener noreferrer">डाउनलोडस्</a>
                                                @else
                                                    फाइल छैन
                                                @endif
                                            </td>
                                        </tr> --}}
                                        </tbody>
                                    </table>
                                    @foreach ($billSuggestion->billSuggestionSectionWise as $item)
                                        <table class="table table-md table-bordered kalimati-font">
                                            <tbody>
                                                <tr>
                                                    <td><b>दफा :</b> {{ $item->section }} </td>
                                                    <td><b>उपदफा :</b> {{ $item->sub_section }}</td>
                                                    <td><b>खण्ड :</b> {{ $item->sec }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="width: 33%;">
                                                        हालको व्यवस्था
                                                    </th>
                                                    <th class="text-center" style="width: 33%;">
                                                        संशोधनको व्यहोरा
                                                    </th>
                                                    <th class="text-center" style="width: 34%;">
                                                        कारण
                                                    </th>
                                                </tr>

                                                <tr>

                                                    <td>
                                                        <p>
                                                            {{ $item->current_arrangement }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>
                                                            {{ $item->procedure_of_amendment }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $item->reason }}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    @endforeach
                                </div>
                                <hr class="my-5">
                            @endif
                        @empty

                            <div colspan="42" class="font-italic text-center">कुनैपनि डाटा उपलब्ध छैन !!!
                            </div>

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
