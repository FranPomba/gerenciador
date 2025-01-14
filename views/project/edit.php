{% extends "base.php" %}
{% block main %}
<form action="" method="post" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 rounded-lg shadow-md">
    <div class="flex flex-col gap-4">
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-300 mb-1">Nome:</label>
            <input
                type="text"
                id="titulo"
                name="titulo"
                required
                class="w-full px-4 py-2 bg-gray-700 text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Digite o nome do projeto"
                value="{{ project.titulo }}">
        </div>

        <div>
            <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Descrição:</label>
            <textarea
                id="descricao"
                name="descricao"
                required
                class="w-full px-4 py-2 bg-gray-700 text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Descreva o projeto"
                rows="4">{{ project.descricao }}</textarea>
        </div>

        <div>
            <label for="ano" class="block text-sm font-medium text-gray-300 mb-1">Ano:</label>
            <input
                type="number"
                id="ano"
                name="ano"
                required
                class="w-full px-4 py-2 bg-gray-700 text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                placeholder="Ano de criação"
                value="{{ project.ano }}">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-300 mb-1">Status:</label>
            <select
                id="status"
                name="status"
                class="w-full px-4 py-2 bg-gray-700 text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
                <option value="em desenvolvimento" {{ project.status == 'em desenvolvimento' ? 'selected' }}>Em desenvolvimento</option>
                <option value="em espera" {{ project.status == 'em espera' ? 'selected' }}>Em espera</option>
                <option value="completo" {{ project.status == 'completo' ? 'selected' }}>Completo</option>
            </select>
        </div>

        <div>
            <label for="img" class="block text-sm font-medium text-gray-300 mb-1">URL da Imagem:</label>
            <input
                type="file"
                id="img"
                name="img"
                class="w-full px-4 py-2 bg-gray-700 text-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            {% if project.img %}
            <p class="text-sm text-gray-400 mt-2">Imagem atual: <a href="{{ project.img }}" class="text-cyan-500 hover:underline" target="_blank">Visualizar</a></p>
            {% endif %}
        </div>

        <button
            type="submit"
            name="submit"
            class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500">
            Salvar
        </button>
    </div>
</form>
{% endblock %}