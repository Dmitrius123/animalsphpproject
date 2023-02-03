@props(['Animal'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$Animal->logo ? asset('storage/' . $Animal->logo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/Animals/{{$Animal->id}}">{{$Animal->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$Animal->price}}</div>
      <x-Animal-tags :tagsCsv="$Animal->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$Animal->location}}
      </div>
    </div>
  </div>
</x-card>