<?php
$items = [
    ['href' => '#projetos', 'texto' => 'Projetos'],
    ['href' => '#', 'texto' => 'GitHub'],
    ['href' => '#', 'texto' => 'LinkedIn'],
    ['href' => '#', 'texto' => 'Twitter'],
]
?>
<header class="mx-auto max-w-screen-lg items-center justify-between px-3 py-6 flex">
    <div class="font-bold text-xl text-cyan-600">Meu Portifolio</div>
    <div class="">
        <ul class="flex gap-x-3 font-medium text-gray-200">
            <?php foreach ($items as $item): ?>
                <li><a href="<?= $item['href'] ?>" class="hover:underline"> <?= $item['texto'] ?> </a></li>
            <?php endforeach ?>
        </ul>
    </div>
</header>