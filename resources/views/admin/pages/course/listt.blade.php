<x-app-layout>




<div id="kt_content_container" class="container-xxl">
    <div class="card card-flush">
        
        
        <!-- component -->
<!-- This is an example component -->
        <div class="max-w-2xl mx-auto">

            <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-auto ">
                        <table class="text-left text-sm font-light overflow-auto rounded-md w-max mt-10 divide-y divide-gray-200 table-auto dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4">
                                        No.
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Kelas
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        View
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Harga
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Customer
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Tanggal Pendaftaran
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Tanggal Selesai
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($course as $c)
                                        
                                        <tr>
                                            <td class="px-16 py-2">
                                                {{ $c->id }}
                                            </td>
                                            <td class="px-16 py-2">
                                                {{ $c->course_name }}
                                            </td>
                                            <td class="px-16 py-2">
                                                <img src="{{ Storage::url('public/posts/'.$c->image) }}" class="w-48 rounded-md">
                                            </td>
                                            <td class="px-16 py-2">
                                                {{ $c->harga }}
                                            </td>
                                            <td class="px-16 py-2">
                                                {{ $c->user_id }}
                                            </td>
                                            <td class="px-16 py-2">
                                                {!! $c->content !!}
                                            </td>
                                        </tr>
                                    
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>



</x-app-layout>