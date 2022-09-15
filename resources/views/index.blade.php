<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sosmed | Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <header class='header'>
                <h2 class="title">Pos</h2>
                <p class="user">
                    {{ strtoupper('Zura') }}
                    <span class="separator"></span>
                    <a href="/logout" class="logout">Keluar</a>
                </p>
            </header>

            <div class="container-post">
                {{-- <div class="create-post-button">
                    <img src="{{ asset('icons/plus-solid.svg') }}" alt="Ikon Tambah" class="create-post-icon">
                    <p class="create-post-text">Buat Pos</p>
                </div> --}}

                <form action="#" class="create-post-form">
                    <textarea name="post" id="post" cols="50" rows="5" class="textarea"></textarea>

                    <button class="submit">Buat Pos</button>
                </form>

                <article class="single-post">
                    <h3 class="author">{{ strtoupper('Zura') }}</h3>

                    <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus
                        enim
                        repellat
                        repudiandae inventore. Excepturi quo eos velit consectetur ex.</p>

                    <p class="date">{{ strtoupper('September 15, 2022 10:37 WIB') }} | <a href="#"
                            class="comment">Komen</a>
                    </p>

                    <form action="#" class="create-comment-form">
                        <textarea name="comment" id="comment" cols="50" rows="3" class="textarea"></textarea>

                        <button class="submit">Buat Komen</button>
                    </form>

                    <div class="container-comment">
                        <article class="single-comment">
                            <h3 class="author">{{ strtoupper('Zura') }}</h3>

                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
                                delectus
                                enim
                                repellat
                                repudiandae inventore. Excepturi quo eos velit consectetur ex.</p>

                            <p class="date">{{ strtoupper('September 15, 2022 10:37 WIB') }}</p>
                        </article>

                        <article class="single-comment">
                            <h3 class="author">{{ strtoupper('Zura') }}</h3>

                            <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
                                delectus
                                enim
                                repellat
                                repudiandae inventore. Excepturi quo eos velit consectetur ex.</p>

                            <p class="date">{{ strtoupper('September 15, 2022 10:37 WIB') }}</p>
                        </article>
                    </div>
                </article>

                <article class="single-post">
                    <h3 class="author">{{ strtoupper('Zura') }}</h3>

                    <p class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia delectus
                        enim
                        repellat
                        repudiandae inventore. Excepturi quo eos velit consectetur ex.</p>

                    <p class="date">{{ strtoupper('September 15, 2022 10:37 WIB') }} | <a href="#"
                            class="comment">Komen</a>
                    </p>
                </article>
            </div>
        </div>
    </main>
</body>

</html>
