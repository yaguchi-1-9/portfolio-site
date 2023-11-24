<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポートフォリオ</title>
    <link rel="stylesheet" href="{{ asset('css/portfolio/index.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>

<header>
    <h1>ポートフォリオ</h1>
    <nav>
        <ul>
            <li><a href="#about">About Me</a></li>
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<section id="about">
    <h2>About Me</h2>
    <p>こんにちは！<br>
        Webエンジニアの屋口です。
    </p>
    <p>
        私の座右の銘は<strong class="red-text">「怠け者であれ」</strong>です。<br>
        ここで言う怠け者とは、目先の怠惰ではなく未来の怠惰を渇望し、怠けるための努力を怠らないダメ人間のことです。<br>
    </p>
</section>

<section id="introduction">
    <h2>Introduction</h2>
    <p>
        私がまだ中学生のころ、担任の先生から将来やりたい仕事について尋ねられたことがあります。<br>
        そのとき私が<strong>「楽で実入りの良い仕事」</strong>と答えると、先生から<strong>「それは良いね」</strong>と褒められました。<br>
        <br>
        学校の成績も悪く、先生から褒められることが極端に少なかった私は今でもそのことを覚えています。<br>
        今にして思えば、その望みは私の本質を捉えていたような気がします。<br>
    </p>
    <p>ここでは、そんな怠け者が晴れてWebエンジニアとなり、プライベートで開発したWebサイトを紹介していきます。<br>
        まだ新卒1年目で拙い点も多いですが、生暖かい目で見守っていただければ幸いです。</p>
</section>

<section id="projects">
    <h2>Projects</h2>
    <p>
        自己管理や自己啓発を目的として開発した<strong class="red-text">私の私による私のための</strong>プロジェクトの紹介です。<br>
        将来的には、他のやる気ある怠け者の方にも役立てるようなサービスを開発していきたいと考えています。<br>
    </p>
    <div class="project-card">
        <h3>個人ブログ</h3>
        <p>人生の指針を忘れないようにしておくための個人ブログです。<br>
            自分にとって大切な考え方や刺激を受けた考え方を言語化して、やりたいこと・やるべきことを見失ったときに見返すことが目的です。</p>
        <a href="{{ route('blog') }}">プロジェクトを見る</a>
    </div>

    <div class="project-card">
        <h3>生成AIニュースまとめ</h3>
        <p>生成AIには興味があるけど、有益な情報をサルベージングすることがめんどくさい、そんな自分自身のためのサイトです。<br>
            生成AI関連の記事をクローリングして、自分の興味のある記事をフィルタリングしていきます。</p>
        </p>
        <a href="#">プロジェクトを見る</a>
    </div>

</section>

<section id="contact">
    <h2>Contact</h2>
    <p>連絡を取りたい場合は、<a href="https://twitter.com/9BeWuMebzLPKwKY">Twitter</a>からお願いします。</p>
</section>

<footer>
    <p>&copy; 2023 屋口</p>
</footer>

</body>
</html>
