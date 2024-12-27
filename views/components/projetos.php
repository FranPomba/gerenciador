{%
    set projetos = [
        {
            'titulo' : 'Gestor de Projetos',
            'descricao' : 'Gestor de Projetos escrito com PHP, HTML e Tailwind.',
            'ano' : 2024,
            'finalizado' : false,
            'tecnologias' : ['PHP', 'HTML', 'Tailwind'],
            'img' : '/public/img/projetos/gestor de projetos.png'
        }
        ,

        
        { 
            'titulo' : 'Gestor de Tarefas',
            'descricao' : 'Gestor de tarefas escrito com PHP, HTML e Tailwind.',
            'ano' : 2025,
            'finalizado' : false,
            'tecnologias' : ['PHP', 'HTML', 'Tailwind', 'JScript'],
            'img' : '/public/img/projetos/1691265603245.jpg' 
        }
    ]
%}
<section id="projetos" class=" space-y-3 py-6">
    <h2 class="font-bold text-2xl">Projetos Recentes</h2>
    {%for projeto in projetos%}
    <div class="bg-slate-800 rounded-lg p-3 flex items-center space-x-3">
        <div class="w-1/5 flex items-center justify-items-center">
            <img class="h-28 hover:animate-pulse rounded-md"
                src="{{projeto.img}}" alt="foto do projeto">
        </div>
        <div class="w-4/5 space-y-3">

            <div class="flex gap-3 justify-between">
                <h3 class="font-semibold"><?= $projeto['titulo'] ?>
                    <span class="text-xs text-gray-400 opacity-50 italic">(
                        {% if projeto.finalizado %}
                        {{projeto.ano}}
                        {% else %}
                        Projeto em desenvolvimento
                        {% endif %}
                        )</span>
                </h3>
                <div class="space-x-1">
                    {% for tecnologia in projeto.tecnologias %}
                    <span class="bg-orange-500 rounded-md px-2 py-1 font-semibold text-xs">
                        {{tecnologia}}</span>
                    {% endfor %}
                </div>
            </div>
            <p class="text-gray-500 text-sm leading-6">
                {{ projeto.descricao }}
            </p>
        </div>
    </div>
    {% endfor %}
</section>