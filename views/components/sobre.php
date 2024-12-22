<?php
$items = [
    ['href' => '#', 'src' => '/public/img/redes_sociais/github_git_icon_145985.ico', 'alt' =>  'GitHub'],
    ['href' => '#', 'src' => '/public/img/redes_sociais/LinkedIn.ico', 'alt' =>  'LinkedIn'],
    ['href' => '#', 'src' => '/public/img/redes_sociais/Twitter-blueberry.ico', 'alt' =>  'Twitter'],
    ['href' => '#', 'src' => '/public/img/redes_sociais/Facebook-blueberry.ico', 'alt' =>  'Facebook']
]
?>
<section class="flex gap-x-3">
    <div class="w-2/3">
        <h1 class="text-3xl font-bold">Olá, eu sou o Francisco!</h1>
        <p class="text-xl leading-6 mt-6">Sou desenvolvedor Backend, adoro criar softwares e aprender novas tecnologias.
            Programo em PHP e HTML bem como possuo conhecimento de outras linguagens como Python e JavaScript.
        </p>
        <ul class="flex gap-x-3 mt-3">
            <?php foreach ($items as $item): ?>
                <li><a target="_blank" href="<?= $item['href'] ?>"><img class="h-8 hover:animate-bounce"
                            src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>"></a></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="w-1/3 ">
        <div class="flex items-center justify-center">
            <img class="h-60 -mt-6 hover:animate-pulse"
                src="/public/img/IMG-20240624-WA0094.jpg" alt="Foto Francisco Pomba">
        </div>
    </div>
</section>