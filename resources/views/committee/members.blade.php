@extends('layouts.app', ['title' => __('समिति')])

@section('content')
<div class="container-fluid">

    <x-committee-wizard-menu :committee="$committee" />

    <section class="box mt-4">
        <div class="box__header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="box__title">समिति सदस्यहरु</div>
                <div>
                    <a href="{{ route('committee.members.create', $committee) }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            
            <table class="table table-bordered table-hover">
                <tr>
                    <td>क्र स</td>
                    <td>फोटो</td>
                    <td>नाम</td>
                    <td>पद</td>
                    <td></td>
                </tr>
                @foreach ($committeeMembers as $committeeMember)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img id="newProfilePhotoPreview"
                        src="{{ $committeeMember->member->profile ? asset('storage/' . $committeeMember->member->profile) : asset('assets/img/no-image.png') }}"
                        class="profile-nav">
                    </td>
                    <td>{{ $committeeMember->member->name }}</td>
                    <td>
                       
                        {{ $committeeMember->designation }}
                    </td>
                    <td>
                        <div class="d-flex">

                            <a href="{{ route('committee.members.edit', [$committee, $committeeMember]) }}" class="btn btn-primary btn-sm mx-2">Edit</a>
                            <form action="{{ route('committee.members.destroy', [$committee, $committeeMember]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('के तपाई सुनिचित गर्नुहुन्छ  ?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>
@endsection
