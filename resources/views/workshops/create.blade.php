<x-layout>
<div class="flex flex-row">

<form method="POST" action="/workshops" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <label for="title">Workshop Name</label>
    <input type="text" class="bg-white" name="title" id="title" value="{{ old('title') }}">

    <label for="description">Workshop Beschreibung</label>
    <textarea class="bg-white" name="description" id="description">{{ old('description') }}</textarea>

    <label for="image_path" class="label">
        <span class="label-text">Workshopbild hinzufügen</span>
    </label>
    <input type="file" name="image_path" id="image_path" class="file-input file-input-accent" />

    <button type="submit">Workshop anlegen</button>
    @can('workshops')
 <label for="Rolle">User anlegen</label>
    <input type="text" class="bg-white" name="rolle" id="rolle" value="{{ old('rolle') }}">

@endcan
</form>

</div>
</x-layout>
