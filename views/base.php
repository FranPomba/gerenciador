<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('public/css/styles.css')}}">
    <title>Gestor De Projetos</title>
</head>

<body class="bg-slate-900 text-gray-200">
    {% include 'components/headers.php' %}
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6 gap-y-6">
        {% block  main %}
        {% if success %}
        <div class="text-gray-300 bg-green-400">
            <p class="flex items-center justify-center">
                <span class="bg-green-600 ">
                    {{success}}
                </span>
            </p>
        </div>
        {% endif%}
        {% include 'components/sobre.php' %}
        {% include 'components/projetos.php' %}
        {%endblock%}
    </main>
    {% include 'components/footer.php'%}
</body>

</html>