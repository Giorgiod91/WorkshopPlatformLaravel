<x-layout>
		<form action="/workshops/{{$workshop->id}}" enctype="multipart/form-data" method="POST">
			@csrf
			@method('PUT')

			<label for="title" name="title">
				<input id="title" class="bg-white" name="title" value="{{ old('title', $workshop['title']) }}">
			</label>

					<label for="description" name="description">
				<textarea id="description" name="description" class="bg-white">{{ old('description', $workshop['description']) }}</textarea>
			</label>
  <label for="image_path" class="label">
        <span class="label-text">Workshopbild ändern</span>



    </label>

@dump($workshop->image_path)
    <input type="file" name="image_path" id="image_path" class="file-input file-input-accent" />


			<button class="btn btn-primary text-white" type="submit"> Workshopänderung abschließen </button>
		</form>
        <div>
            <p>Aktuelles Bild </p>
            <img src="{{asset($workshop->image_path)}}" />
        </div>
</x-layout>
