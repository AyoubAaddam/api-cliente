<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Provedores CRUD AYOUB</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-figtree bg-gray-100 p-8">
    <div>
        <a href="{{ route('main.index') }}" class="w-1/2 flex justify-center py-1 px-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">ATRAS</a>
        <a href="{{ route('logout') }}" class="w-1/2 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-400">LOGOUT</a>

    </div>

    <div class="container mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-orange-500 mb-8 text-center">Provedores CRUD AYOUB</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200">ID</th>
                    <th class="py-2 px-4 border-b border-gray-200">Name</th>
                    <th class="py-2 px-4 border-b border-gray-200">Obs</th>
                    <th class="py-2 px-4 border-b border-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)


                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $categoria['id'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $categoria['cat_nom'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $categoria['cat_obs'] }}</td>
                        <td class="py-2 px-4 border-b border-gray-200 flex space-x-2">
                            <!-- Edit Button -->
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#editModal{{ $categoria['id'] }}">Edit</button>
                            <!-- Delete Button -->
                            <form action="{{ route('categorias.delete', ['id'=>$categoria['id']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div id="editModal{{ $categoria['id'] }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-8 rounded-lg shadow-lg">
                            <h5 class="text-xl font-bold mb-4">Edit Categoria</h5>
                            <form action="{{ route('categorias.update', ['id'=>$categoria['id']]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="cat_nom" class="block text-gray-700 font-bold mb-2">Categoria Name</label>
                                    <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" id="cat_nom" name="cat_nom" value="{{ $categoria['cat_nom'] }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="cat_obs" class="block text-gray-700 font-bold mb-2">Categoria Observation</label>
                                    <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" id="cat_obs" name="cat_obs" value="{{ $categoria['cat_obs'] }}" required>
                                </div>
                                <div class="flex justify-end space-x-4">
                                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <!-- Add New Categoria Button -->
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4" data-toggle="modal" data-target="#addModal">Add New Categoria</button>

        <!-- Add Modal -->
        <div id="addModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h5 class="text-xl font-bold mb-4">Add New Categoria</h5>
                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="cat_nom" class="block text-gray-700 font-bold mb-2">Categoria Name</label>
                        <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" id="cat_nom" name="cat_nom" required>
                    </div>
                    <div class="mb-4">
                        <label for="cat_obs" class="block text-gray-700 font-bold mb-2">Categoria Observation</label>
                        <input type="text" class="form-control w-full p-2 border border-gray-300 rounded" id="cat_obs" name="cat_obs" required>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle modal visibility
        document.querySelectorAll('[data-toggle="modal"]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = document.querySelector(button.getAttribute('data-target'));
                modal.classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-dismiss="modal"]').forEach(button => {
            button.addEventListener('click', () => {
                const modal = button.closest('.fixed');
                modal.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
