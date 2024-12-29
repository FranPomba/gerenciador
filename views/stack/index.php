{% extends 'base.php'%}

{% block main %}
<div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-cyan-500 mb-4">{{ project.titulo }}</h1>
    <div class="text-gray-300">
        <p class="mb-4"><span class="font-semibold">Descrição:</span> {{ project.descricao }}</p>
        <div>
            <h2 class="text-2xl font-bold text-cyan-500 mb-4">{{ project.titulo }}</h2>

            {% for stack in stacks %}
            <input type="checkbox" name="nome" id="nome"
                class="w-full bg-gray-700 text-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                value="{{ stack.id }}"
                name="tecnologias[]">
            <label for=" nome" class="block text-sm font-medium text-gray-300 mb-1">{{stack.nome}}</label>
            {% endfor %}
        </div>
        <button
            type="submit"
            name="submit"
            class="w-full bg-cyan-600 hover:bg-cyan-700 text-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            Salvar
        </button>
    </div>
</div>
{% endblock %}