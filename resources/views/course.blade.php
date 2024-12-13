<x-frontend-layout>

    <section class="py-10">
        <h1 class="text-center text-2xl font-semibold mb-5">Courses</h1>
        <div class="container">
            <form action="{{ route('store_course') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-10 p-10 shadow-lg">
                    <div>
                        <label for="name">Enter Course Name <span class="text-red-600">*</span></label>
                        <input type="text" name="name" id="name" class="w-full rounded mt-2" required>
                    </div>

                    <div>
                        <label for="price">Enter Course Price<span class="text-red-600">*</span></label>
                        <input type="text" name="price" id="price" class="w-full rounded mt-2" required>
                    </div>

                    <div>
                        <label for="duration">Enter Course Duration <span class="text-red-600">*</span></label>
                        <input type="text" name="duration" id="duration" class="w-full rounded mt-2">
                    </div>

                    <div>
                        <label for="image">Enter Course Image <span class="text-red-600">*</span></label>
                        <input type="file" name="image" id="image" class="w-full rounded mt-2">
                    </div>

                    <div>
                        <button type="submit"
                            class="hover:shadow-lg py-2 px-6 bg-blue-500 text-white rounded-3xl">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <section class="py-10">



        <div class="container">

            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th class="py-2 border border-gray-400">SN</th>
                        <th class="py-2 border border-gray-400">Image</th>
                        <th class="py-2 border border-gray-400">Name</th>
                        <th class="py-2 border border-gray-400">Price</th>
                        <th class="py-2 border border-gray-400">Duration</th>
                        <th class="py-2 border border-gray-400">Action</th>
                    </tr>
                </thead>

                <tbody>



                    @foreach ($courses as $index => $item)
                        <tr>
                            <td class="py-2 border border-gray-400">{{ ++$index }}</td>
                            <td class="py-2 border border-gray-400">
                                <img class="w-20" src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                            </td>
                            <td class="py-2 border border-gray-400">{{ $item->name }}</td>
                            <td class="py-2 border border-gray-400">{{ $item->price }}</td>
                            <td class="py-2 border border-gray-400">{{ $item->duration }}</td>
                            <td class="py-2 border border-gray-400">
                                <form action="/course-delete/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button>Delete</button>
                                    <a href="{{ route('edit_course', $item->id) }}" class="ml-2">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </section>


</x-frontend-layout>
