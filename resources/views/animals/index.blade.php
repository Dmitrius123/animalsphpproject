<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  @include('partials._search')

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($Animals) == 0)

    @foreach($Animals as $Animal)
    <x-Animal-card :Animal="$Animal" />
    @endforeach

    @else
    <p>No Animals found</p>
    @endunless

  </div>

  <div class="mt-6 p-4">
    {{$Animals->links()}}
  </div>
</x-layout>
