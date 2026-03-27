<x-layout>
<div class="flex flex-col items-center justify-center min-h-screen">


<form method="POST" action="/workshops" enctype="multipart/form-data" class="space-y-6 w-full max-w-lg">
    @csrf

    <div class="form-control w-full">
        <label class="label" for="title">
            <span class="label-text">Workshop Name</span>
        </label>
        <input type="text" name="title" id="title" class="input input-bordered w-full" value="{{ old('title') }}">
    </div>

    <div class="form-control w-full">
        <label class="label" for="description">
            <span class="label-text">Workshop Beschreibung</span>
        </label>
        <textarea name="description" id="description" class="textarea textarea-bordered w-full" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="form-control w-full">
        <label class="label" for="price">
            <span class="label-text">Preis (EUR)</span>
        </label>
        <input type="number" step="0.01" min="0" name="price" id="price" class="input input-bordered w-full" value="{{ old('price') }}">
    </div>

    <div class="form-control w-full">
        <label class="label" for="workshop_date">
            <span class="label-text">Datum</span>
        </label>
        <input type="date" name="workshop_date" id="workshop_date" class="input input-bordered w-full" value="{{ old('workshop_date') }}">
    </div>

    <div class="form-control w-full">
        <label class="label" for="workshop_time">
            <span class="label-text">Uhrzeit</span>
        </label>
        <input type="time" name="workshop_time" id="workshop_time" class="input input-bordered w-full" value="{{ old('workshop_time') }}">
    </div>

    <div class="form-control w-full">
        <label class="label" for="image_path">
            <span class="label-text">Workshopbild hinzufügen</span>
        </label>
        <input type="file" name="image_path" id="image_path" class="file-input file-input-bordered file-input-accent w-full" />
    </div>

    <div class="form-control mt-4">
        <button type="submit" class="btn btn-primary w-full">Workshop anlegen</button>
    </div>
</form>

</div>
</x-layout>
