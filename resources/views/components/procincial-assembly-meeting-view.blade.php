

    @foreach ($meetingTypes as $type )

    <div class="col-md-6">
        <div class="bg-theme-color-blue py-3 text-center">
            {{$type->name}} बैठक सम्बन्धी सूचना
        </div>

        <x-procincial-committee-meeting-view  :meeting-type="$type"/>
    </div>

    @endforeach