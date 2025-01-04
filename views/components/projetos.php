<section id="projetos" class=" space-y-3 py-6">
    <h2 class="font-bold text-2xl">Projetos Recentes</h2>
    {%for project in projects %}
    <div class="bg-slate-800 rounded-lg p-3 flex items-center space-x-3">
        <div class="w-1/5 flex items-center justify-items-center">
            <img class="h-28 hover:animate-pulse rounded-md"
                src="" alt="foto do projeto">
        </div>
        <div class="w-4/5 space-y-3">
            <div class="flex gap-3 justify-between">
                <h3 class="font-semibold">
                    {{project.titulo}}
                    <span class="text-xs text-gray-400 opacity-50 italic">(
                        {% if project.status == 'completo' %}
                        {{project.ano}}
                        {% else %}
                        {{project.status}}
                        {% endif %}
                        )</span>
                </h3>
                <div class="space-x-1">
                    {% for stack in stacks %}
                    {% if stack.project_id == project.id %}
                    <span class="bg-orange-500 rounded-md px-2 py-1 font-semibold text-xs">
                        {{stack.nome}}</span>
                    {% endif %}
                    {% endfor %}
                </div>
            </div>
            <p class="text-gray-500 text-sm leading-6">
                {{ project.descricao }}
            </p>
            <div class="flex gap-4 mt-6">
                <a href="{{ url('project/' ~ project.id ~ '/edit') }}"
                    class="inline-flex bg-cyan-600 hover:bg-cyan-700 rounded-md px-2 py-1 h-6 font-semibold text-xs">
                    Editar
                </a>
                <a href="{{ url('project/' ~ project.id ) }}"
                    class="inline-flex bg-lime-600 hover:bg-lime-700 rounded-md px-2 py-1 h-6 font-semibold text-xs">
                    Visualizar
                </a>
                <form action="{{ url('project/' ~ project.id ~ '/delete') }}"
                    method="post"
                    onsubmit="return confirm('Tem certeza que deseja excluir este projeto?')">
                    <button type="submit"
                        class="inline-flex bg-red-600 hover:bg-red-700 rounded-md px-2 py-1 h-6 font-semibold text-xs">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
    {% endfor %}
</section>