<x-layout>
	<form action="/workshops/{{$workshops->id}}" enctype="multipart/form-data" method="POST" class="space-y-4 w-full max-w-lg">
		@csrf
		@method('PUT')

		<div class="form-control w-full">
			<label class="label" for="title">
				<span class="label-text">Workshop Name</span>
			</label>
			<input id="title" name="title" class="input input-bordered w-full" value="{{ old('title', $workshops['title']) }}">
		</div>

		<div class="form-control w-full">
			<label class="label" for="description">
				<span class="label-text">Beschreibung</span>
			</label>
			<textarea id="description" name="description" class="textarea textarea-bordered w-full">{{ old('description', $workshops['description']) }}</textarea>
		</div>

		<div class="form-control w-full">
			<label class="label" for="price">
				<span class="label-text">Preis (EUR)</span>
			</label>
			<input id="price" type="number" step="0.01" min="0" name="price" class="input input-bordered w-full" value="{{ old('price', $workshops['price']) }}">
		</div>

		<div class="form-control w-full">
			<label class="label" for="workshop_date">
				<span class="label-text">Datum</span>
			</label>
			<input id="workshop_date" type="date" name="workshop_date" class="input input-bordered w-full" value="{{ old('workshop_date', $workshops['workshop_date']) }}">
		</div>

		<div class="form-control w-full">
			<label class="label" for="workshop_time">
				<span class="label-text">Uhrzeit</span>
			</label>
			<input id="workshop_time" type="time" name="workshop_time" class="input input-bordered w-full" value="{{ old('workshop_time', $workshops['workshop_time']) }}">
		</div>

		<div class="form-control w-full">
			<label class="label" for="image_path">
				<span class="label-text">Workshopbild ändern</span>
			</label>
			<input type="file" name="image_path" id="image_path" class="file-input file-input-bordered file-input-accent w-full" />
		</div>

		<button class="btn btn-primary w-full" type="submit">Workshopänderung abschließen</button>
	</form>
	<div class="mt-6">
		<p class="mb-2">Aktuelles Bild</p>
		<img src="{{asset($workshops->image_path)}}" class="rounded-lg object-cover max-h-48" />
	</div>
</x-layout>
