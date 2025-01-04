{% extends 'base.php'%}

{% block main %}
<div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-8 relative">
    <div class="absolute top-0 right-0 m-4 space-x-1">
        <a href="{{ url('stack') }}"
            class="inline-flex bg-lime-600 hover:bg-lime-700 rounded-md px-2 py-1 h-6 font-semibold text-xs">
            Cadastrar
        </a>
    </div>
    <p class="text-2xl font-semibold text-cyan-500 mb-4">Tecnologias</p>
    <dl class="grid grid-cols-2 gap-4 bg-gray-800 p-6 rounded-lg shadow-md">
        {% for stack in stacks %}
        <div class="flex items-center gap-2">
            <dt class="font-semibold text-cyan-400">Tech:</dt>
            <dd class="text-gray-300">{{ stack.nome }}</dd>
        </div>
        {% endfor %}
    </dl>
</div>
{% endblock %}