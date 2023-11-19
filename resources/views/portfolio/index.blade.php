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
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<section id="about">
    <h2>About Me</h2>
    <p>こんにちは！<br>
        物理学専攻で大学院を修了後、23卒でWebエンジニアになった屋口正鷹と申します。
    </p>
    <p>
        座右の銘は「真の怠け者であれ！」です。<br>
        私の考える真の怠け者とは、目先のことを超越した高い視座を持ち、怠けるための努力を続けられる人間を指す言葉です。<br>
        長期的な視点を持って怠けるためには努力を惜しまない人間こそが「真の怠け者」であり、目先の怠惰に逃げる人間は本当の意味で怠け者ではありません。<br>
    </p>
    <p>ここは新卒1年目のエンジニアの取り組みを紹介するページです。<br>
        拙い点も多いですが、生暖かい目で見てください。</p>
</section>

<section id="projects">
    <h2>Projects</h2>

    <div class="project-card">
        <h3>個人ブログ</h3>
        <p>人生の指針を忘れないようにしておくための個人ブログです。<br>
            自分にとって大事な考え方や刺激を受けた考え方を言語化して、やりたいこと・やるべきことを見失ったときに見返すためのものです。</p>
        <a href="{{ route('blog') }}">プロジェクトを見る</a>
    </div>

    <div class="project-card">
        <h3>Project 2</h3>
        <p>プロジェクト2の説明。このプロジェクトでは、...</p>
        <a href="#">プロジェクトを見る</a>
    </div>

</section>

<section id="contact">
    <h2>Contact</h2>
    <p>連絡を取りたい場合は、<a href="https://twitter.com/9BeWuMebzLPKwKY">Twitter</a>からお願いします。</p>
</section>

<footer>
    <p>&copy; 2023 屋口正鷹</p>
</footer>

</body>
</html>
