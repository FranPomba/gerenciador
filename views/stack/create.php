{% extends 'base.php' %}

{% block main %}
<form action="" method="post" class="max-w-lg p-6 mx-auto roudend-lg shadow-md">
    <div class="flex flex-col gap-4">
        <div>
            <label for="nome" class="block text-sm font-medium text-gray-300 mb-1">Tecnologia</label>
            <input type="text" name="nome" id="nome" placeholder="Digite a tecnologia"
                class="w-full bg-gray-700 text-gray-300 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-cyan-500">
        </div>
        <button
            type="submit"
            name="submit"
            class="w-full bg-cyan-600 hover:bg-cyan-700 text-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">Salvar
        </button>
    </div>
</form>

{% endblock %}