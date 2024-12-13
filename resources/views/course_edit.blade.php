<x-frontend-layout>

    <section class="py-10">
        <h1 class="text-center text-2xl font-semibold mb-5">Edit Course</h1>
        <div class="container">
            <form action="/update-course/{{ $course->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="grid grid-cols-2 gap-10 p-10 shadow-lg">
                    <div>
                        <label for="name">Enter Course Name <span class="text-red-600">*</span></label>
                        <input type="text" name="name" id="name" class="w-full rounded mt-2"
                            value="{{ $course->name }}" required>
                    </div>

                    <div>
                        <label for="price">Enter Course Price<span class="text-red-600">*</span></label>
                        <input type="text" name="price" id="price" class="w-full rounded mt-2"
                            value="{{ $course->price }}" required>
                    </div>

                    <div>
                        <label for="duration">Enter Course Duration <span class="text-red-600">*</span></label>
                        <input type="text" name="duration" id="duration" class="w-full rounded mt-2"
                            value="{{ $course->duration }}">
                    </div>

                    <div>
                        <label for="image">Enter Course Image <span class="text-red-600">*</span></label>
                        <input type="file" name="image" id="image" class="w-full rounded mt-2">
                        <img src="{{ asset($course->image) }}" class="h-20" alt="{{ $course->name }}">
                    </div>

                    <div>
                        <button type="submit"
                            class="hover:shadow-lg py-2 px-6 bg-blue-500 text-white rounded-3xl">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>


</x-frontend-layout>
