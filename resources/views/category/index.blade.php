<x-app-layout>
    <div class="m-24 text-white">
        <a>boton crear nuevo post</a>
        @foreach ($posts as $post)
            <div class="">
                <?php
                echo '<br>';
                echo 'IDPOST: ' . $post['idPost'] . '<br>';
                echo 'TITULO: ' . $post['titlePost'] . '<br>';
                echo 'TEXTO: ' . $post['contentPost'] . '<br>';
                echo 'HABILITATED: ' . $post['habilitated'] . '<br>';
                echo 'POSTER: ' . $post['poster'] . '<br>';
                ?>
                <br>
                <a href="#">boton editar</a>
                <br>
                <a href="#">boton eliminar</a>
            </div>
        @endforeach
    </div>
</x-app-layout>
