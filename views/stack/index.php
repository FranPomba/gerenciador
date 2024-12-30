{% extends 'base.php'%}

{% block main %}
<div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-cyan-500 mb-4">{{ project.titulo }}</h1>

    <form action="{{url('project/' ~ project.id ~ '/stacks')}}" method="post" class="text-gray-300 p-4">
        <p class="mb-4"><span class="font-semibold">Descrição:</span> {{ project.descricao }}</p>
        <p class="text-2xl font-semibold text-cyan-500 mb-4">Tecnologias</p>
        <div class="grid grid-cols-2 gap-4">
            {% for stack in stacks %}
            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    id="stack_{{ stack.id }}"
                    class="w-4 h-4 text-cyan-600 bg-gray-700 border-gray-600 rounded focus:ring-cyan-500 focus:ring-2"
                    value="{{ stack.id }}"
                    name="tecnologias[]"
                    {% if stack.id in list_stacks %}checked{% endif %}
                    <label
                    for="stack_{{ stack.id }}"
                    class="text-sm font-medium text-gray-300">
                {{ stack.nome }}
                </label>
            </div>
            {% endfor %}
        </div>
        <button
            type="submit"
            name="submit"
            class="mt-4 w-24 bg-cyan-600 hover:bg-cyan-700 text-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            Salvar
        </button>
        <a href="{{url()}}">
            <button
                type="button"
                class="mt-4 w-24 bg-red-600 hover:bg-red-700 text-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                Cancelar
            </button>
        </a>
    </form>
</div>
{% endblock %}