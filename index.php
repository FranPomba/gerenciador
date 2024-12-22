<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Meu Portifolio</title>
</head>

<body class="bg-slate-900 text-gray-200">
    <?php include('./components/headers.php'); ?>
    <main class="mx-auto max-w-screen-lg min-h-20 px-3 py-6 gap-y-6">
        <?php include('./components/sobre.php') ?>
        <?php include('./components/projetos.php') ?>
    </main>
    <?php include('./components/footer.php') ?>
</body>

</html>