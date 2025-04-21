<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="mb-4">
        <label class="block">Nom</label>
        <input type="text" name="name" required class="w-full p-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block">Email</label>
        <input type="email" name="email" required class="w-full p-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block">Contrasenya</label>
        <input type="password" name="password" required class="w-full p-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block">Rol</label>
        <select name="role" class="w-full p-2 border rounded">
            <option value="admin">Admin</option>
            <option value="consultor">Consultor</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Crear Usuari</button>
</form>