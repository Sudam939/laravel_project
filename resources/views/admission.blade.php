<x-frontend-layout>

    <section class="py-10">
        <h1 class="text-center text-2xl font-semibold mb-5">Admission</h1>
        <div class="container">
            <form action="/save-admission" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-10 p-10 shadow-lg">
                    <div>
                        <label for="name">Enter Your Name <span class="text-red-600">*</span></label>
                        <input type="text" name="name" id="name" class="w-full rounded mt-2" required>
                    </div>

                    <div>
                        <label for="phone">Enter Your Phone Number<span class="text-red-600">*</span></label>
                        <input type="text" name="phone" id="phone" class="w-full rounded mt-2" required>
                    </div>

                    <div>
                        <label for="course">Enter Course</label>
                        <select name="course" id="course" class="w-full rounded mt-2">
                            @foreach ($courses as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
                        <th class="py-2 border border-gray-400">Student Name</th>
                        <th class="py-2 border border-gray-400">Student Phone</th>
                        <th class="py-2 border border-gray-400">Image</th>
                        <th class="py-2 border border-gray-400">Name</th>
                        <th class="py-2 border border-gray-400">Price</th>
                        <th class="py-2 border border-gray-400">Duration</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($admissions as $index => $admission)
                        <tr>
                            <td class="py-2 border border-gray-400">{{ ++$index }}</td>
                            <td class="py-2 border border-gray-400">{{ $admission->name }}</td>
                            <td class="py-2 border border-gray-400">{{ $admission->phone }}</td>

                            <td class="py-2 border border-gray-400">
                                <img class="w-20" src="{{ asset($admission->course->image) }}" alt="{{ $admission->course->name }}">
                            </td>
                            <td class="py-2 border border-gray-400">{{ $admission->course->name }}</td>
                            <td class="py-2 border border-gray-400">{{ $admission->course->price }}</td>
                            <td class="py-2 border border-gray-400">{{ $admission->duration }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </section>


</x-frontend-layout>
