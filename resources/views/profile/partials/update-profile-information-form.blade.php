<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nombre -->
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre *</label>
            <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $user->nombre) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @error('nombre')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Paterno -->
        <div>
            <label for="ap" class="block text-sm font-medium text-gray-700">Apellido Paterno *</label>
            <input id="ap" name="ap" type="text" value="{{ old('ap', $user->ap) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @error('ap')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Apellido Materno -->
        <div>
            <label for="am" class="block text-sm font-medium text-gray-700">Apellido Materno *</label>
            <input id="am" name="am" type="text" value="{{ old('am', $user->am) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @error('am')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Edad -->
        <div>
            <label for="edad" class="block text-sm font-medium text-gray-700">Edad *</label>
            <input id="edad" name="edad" type="number" value="{{ old('edad', $user->edad) }}" min="1" max="120" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @error('edad')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="md:col-span-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Género -->
        <div>
            <label for="genero_id" class="block text-sm font-medium text-gray-700">Género *</label>
            <select id="genero_id" name="genero_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecciona un género</option>
                @foreach($generos as $genero)
                    <option value="{{ $genero->id }}" {{ $user->genero_id == $genero->id ? 'selected' : '' }}>
                        {{ $genero->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('genero_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nivel Educativo -->
        <div>
            <label for="nivel_educativo_id" class="block text-sm font-medium text-gray-700">Nivel Educativo *</label>
            <select id="nivel_educativo_id" name="nivel_educativo_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecciona un nivel educativo</option>
                @foreach($nivelesEducativos as $nivel)
                    <option value="{{ $nivel->id }}" {{ $user->nivel_educativo_id == $nivel->id ? 'selected' : '' }}>
                        {{ $nivel->descripcion }}
                    </option>
                @endforeach
            </select>
            @error('nivel_educativo_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Intereses -->
        <div class="md:col-span-2">
            <label for="intereses" class="block text-sm font-medium text-gray-700">Intereses *</label>
            <textarea id="intereses" name="intereses" rows="4" required
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('intereses', $user->intereses) }}</textarea>
            @error('intereses')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex items-center gap-4">
        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Guardar cambios
        </button>

        @if (session('status') === 'profile-updated')
            <p class="text-sm text-green-600">Perfil actualizado correctamente.</p>
        @endif
    </div>
</form>
