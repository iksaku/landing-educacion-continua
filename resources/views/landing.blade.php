<x-include.alpine />

<x-templates.master>
    <x-landing.hero />

    @foreach($course_types as $type)
        <x-landing.course :type="$type" />
    @endforeach

    <footer class="w-full flex items-center justify-center text-gray-500 pb-6">
        Hecho por Jorge González
    </footer>
</x-templates.master>
