{{-- Header --}}
@include('layouts.header')

{{-- Main section --}}
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-white">
                {{-- Information --}}
                <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                    <div class="flex items-end">
                        <h1 class="text-3xl font-bold">Build your PC</h1>
                    </div>
                </div>
                
                {{-- Table of parts --}}
                <div class="overflow-x-auto relative rounded-md">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class=image.png"py-3 px-6 w-1">
                                    Component
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Selection
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold underline">
                                    <a href="#">CPU</a>
                                </th>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    Ryzen 5 5600X
                                </td>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    $160.49
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-800 border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white font-bold underline">
                                    <a href="#">GPU</a>
                                </th>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    <a href="#">
                                        <button class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Choose GPU...</button>
                                    </a>
                                </td>
                                <td class="py-4 px-6 font-medium whitespace-nowrap text-white">
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function copyList() {
        var copyText = document.getElementById("copyList");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
</script>

{{-- Footer --}}
@include('layouts.footer')
