{% extends 'base.php'%}

{% block main %}
<div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-md mt-8">
    <h1 class="text-2xl font-bold text-cyan-500 mb-4">{{ project.titulo }}</h1>
    <div class="text-gray-300">
        <p class="mb-4"><span class="font-semibold">Descrição:</span> {{ project.descricao }}</p>
        <p class="mb-4"><span class="font-semibold">Ano:</span> {{ project.ano }}</p>
        <p class="mb-4">
            <span class="font-semibold">Status:</span>
            <span class="
                {% if project.status == 'em desenvolvimento' %} text-yellow-500 
                {% elseif project.status == 'em espera' %} text-orange-500 
                {% else %} text-green-500 
                {% endif %}
            ">
                {{ project.status | capitalize }}
            </span>
        </p>
        {% if project.img %}
        <div class="mb-6">
            <h2 class="font-semibold text-lg mb-2">Imagem:</h2>
            <img src="{{ project.img }}" alt="Imagem do projeto" class="rounded-lg w-full">
        </div>
        {% endif %}
    </div>
    <div class="flex p-6 gap-5 items-center justify-items-start">
        <div>
            <a href="/project/{{ project.id }}/edit"
                class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium  p-1 rounded-md">Editar</a>
        </div>
        <form action="/project/{{ project.id }}/delete"
            method="post"
            onsubmit="return confirm('Tem certeza que deseja excluir este projeto?')">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium p-1 rounded-md">
                Excluir
            </button>
        </form>
    </div>
</div>
{% endblock %}