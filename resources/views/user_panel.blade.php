<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Ev Dizayn</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset('style.css')}}">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
    <header class="main-header">
      <div class="container container--flex">
        <h1 class="main-title">Ev <span class="color-span">Dizayncısı</span></h1>
        <nav class="main-nav">
          <span class="icon-menu" id="btn-menu"><i class="fas fa-bars"></i></span>
          <ul class="menu" id="menu">
              <li class="menu__item"><a href="" class="menu__link"><span>Hakkımızda</span></a></li>
              <li class="menu__item"><a href="{{route('logout')}}" class="menu__link"><span>Çıkış Yap</span></a></li>
            <div class="nav-social">
            </div>
          </ul>
        </nav>
      </div>
    </header>
    <div class="banner">
      <div class="banner__content">
        <div class="container">
          {{-- <h2 class="banner__title">01</h2> --}}
          <p class="banner__txt">Evleriniz için özel ve komplike tasarımların adresi.</p>
        </div>
      </div>
    </div>

    <main class="main">
      <section class="welcome">
        <h2 class="section__title">Neler Yapıyoruz?</h2>
        <p class="welcome__txt">Bir iç mekan tasarımcısı, iç mekanlarda sanat ve işlevselliği ustalıkla birleştiren öncü bir profesyoneldir. İstanbul'da doğup büyüyen tasarımcı, her zaman çevresinden ilham alan yaratıcı bir ruha sahipti. Onun için her ev, hikayelerin, hayallerin ve yaşamın birleştiği bir tuvaldir.Tasarımcı, kendine özgü tarzıyla, yaşam alanlarına sıcaklık ve karakter kazandırmayı amaçlar. Doğadan ve şehir hayatının dinamiklerinden ilham alarak oluşturduğu tasarımlar, modern yaşamın gereksinimlerini karşılamanın ötesinde, estetik bir deneyim sunar.İç mekan tasarımında, her projenin benzersiz olduğunu vurgulayan tasarımcı, müşterilerinin kişisel zevklerine ve ihtiyaçlarına uygun çözümler üretir. Minimalist çizgilerle şekillenen modern tasarımları, doğal malzemeler ve zarif detaylarla zenginleştirir. Her odada, hem işlevsellik hem de görsel çekicilik ön planda tutulur.Tasarımcının işlerinde sıkça rastlanan bir diğer özellik, mekanların ferahlık hissi vermesidir. Geniş cam yüzeyler, açık renk paletleri ve sade mobilya seçimleriyle, mekanlarda huzur ve dinginlik sağlanır. Ayrıca, tasarımlarında sürdürülebilirlik ilkesi de önemlidir. Geri dönüştürülebilir malzemeler ve enerji tasarrufu sağlayan çözümlerle, çevre dostu bir yaklaşımı benimser.İç mekan tasarımcısı, projelerinde müşterileriyle yakın işbirliği yaparak, onların beklentilerini aşmayı hedefler. Her detayı titizlikle planlayan ve uygulayan tasarımcı, yaşam alanlarını sanatsal birer başyapıt haline getirir. Modern yaşamın estetik ve fonksiyonel ihtiyaçlarını karşılayan tasarımlarıyla, iç mekan tasarımında iz bırakmaya devam ediyor.</p>
        {{-- <a href="" class="welcome__btn"></a> --}}
      </section>
      <section class="container-design">
        <div class="design__item">
          <h3 class="design__title">Atöyle Tasarımları</h3>
          <img src="https://images.pexels.com/photos/584399/living-room-couch-interior-room-584399.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="design__img">
        </div>
        <div class="design__item">
          <h3 class="design__title">Konut Tasarımları</h3>
          <img src="https://images.pexels.com/photos/1457842/pexels-photo-1457842.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="" class="design__img">
        </div>
        <div class="design__item">
          <h3 class="design__title">Yatak Odası Tasarımları</h3>
          <img src="https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="design__img">
        </div>
        <div class="design__item">
          <h3 class="design__title">Modern Mutfak Dizaynları</h3>
          <img src="https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="design__img">
        </div>
      </section>
      <section class="container-testimonials">
        <h3 class="section__title">İnsanlar hakkımızda ne düşünüyor?</h3>
        <p class="testimonials__name">Ahmet Yıldız</p>
        <img src="{{asset('dist/img/user2-128x128.jpg')}}" alt="" class="testimonials__img">
        <p class="testimonials__txt">Yoğun iş temposundan dolayı evimde huzurlu ve rahatlatıcı bir ortam yaratmak istiyordum. Tasarımcı ile çalışmaya karar verdikten sonra, beklentilerimin fazlasıyla karşılandığını gördüm. Evimin her köşesi, tam da hayal ettiğim gibi oldu. Doğal malzemelerin kullanımı ve sade tasarım anlayışı, bana gerçekten huzur veriyor. Tasarımcının profesyonelliği ve detaylara gösterdiği özen sayesinde, kendimi her gün evimde tatildeymiş gibi hissediyorum.</p>
      </section>
      <section class="container-testimonials">
        <h3 class="section__title"></h3>
        <p class="testimonials__name">Zeynep Kara</p>
        <img src="{{asset('dist/img/user5-128x128.jpg')}}" alt="" class="testimonials__img">
        <p class="testimonials__txt">Yeni taşındığım evin iç tasarımında modern ve şık bir görünüm elde etmek istiyordum. Tasarımcı ile çalıştıktan sonra, sonuçlardan son derece memnun kaldım. Tasarımcı, benim tarzımı ve ihtiyaçlarımı çok iyi anladı. Modern ve zarif dokunuşlarıyla evim, adeta bir dergi sayfasından fırlamış gibi görünüyor. Her detayı özenle düşünülmüş ve bu da yaşam kalitemi arttırdı.</p>
    </section>
    <section class="container-testimonials">
        <h3 class="section__title"></h3>
        <p class="testimonials__name">Murat Demir</p>
        <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="" class="testimonials__img">
        <p class="testimonials__txt">Ailemle birlikte daha işlevsel ve estetik bir yaşam alanı yaratmak istiyorduk. Tasarımcı ile çalıştıktan sonra, evimiz tamamen değişti. Tasarımcının vizyonu ve yaratıcılığı sayesinde, evimiz hem fonksiyonel hem de estetik açıdan mükemmel bir hale geldi. Çocuklar için güvenli ve eğlenceli alanlar yaratıldı, aynı zamanda bizim için de dinlenme ve çalışma alanları harika oldu. İşbirliği sürecinde gösterdiği sabır ve anlayış için minnettarız.</p>
      </section>
      <form action="{{ route('messageChat.post') }}" method="post" class="mb-3" style="width: 20%; margin-left: 40%;">
        @csrf
        <div class="input-group">
            <input name="message" placeholder="Mesaj yaz..." class="form-control py-2 rounded-start"
                   style="border: 1px solid #ced4da; outline: none;">
            <input name="sender_id" value="{{ Auth::user()->id }}" type="hidden">
            <input name="receiver_id" value="{{ 2 }}" type="hidden">

        </div>
        <button type="submit" class="btn btn-primary py-2 px-4 rounded-end" style="margin-left: 40%;">Gönder</button>
    </form>

      <section class="container-tips">
        <div class="design__item">
          <h3 class="design__title">Ustasından İpuçları</h3>
          <img src="https://images.pexels.com/photos/1909791/pexels-photo-1909791.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="design__img">
        </div>
        <div class="container-box">
          <div class="box">
            <div class="box__icon"><i class="fas fa-cog"></i></div>
            <div class="box__content">
              <h3 class="box__title">YATAK ODALARI</h3>
              <p class="box__txt">Yumuşak ve nötr renk paletleri kullanarak dinlendirici bir atmosfer oluşturun.</p>
            </div>
          </div>
          <div class="box">
            <div class="box__icon"><i class="fas fa-university"></i></div>
            <div class="box__content">
              <h3 class="box__title">MUTFAKLAR</h3>
              <p class="box__txt">Açık raf sistemleri kullanarak mutfağınızı daha ferah ve ulaşılabilir hale getirin.</p>
            </div>
          </div>
          <div class="box">
            <div class="box__icon"><i class="fas fa-wrench"></i></div>
            <div class="box__content">
              <h3 class="box__title">ÇOCUK ODALARI</h3>
              <p class="box__txt">Çok amaçlı mobilyalar tercih ederek hem oyun hem de depolama alanı yaratın.</p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="main-footer">
      <div class="container">
        <div class="column column--50-25">
          <h2 class="footer__title">Şirketimiz</h2>
          <p class="footer__txt">Şirketimizin kuruluşunda en büyük hedefim, insanların evlerini sadece yaşadıkları değil, aynı zamanda kendilerini en iyi şekilde ifade edebildikleri, huzur ve mutluluğu buldukları mekanlar haline getirmekti. Her projede, müşterilerimizin ihtiyaçlarını ve hayallerini dinleyerek onlara özel, fonksiyonel ve estetik çözümler sunmayı amaçlıyoruz. Ekip olarak, detaylara verdiğimiz önem ve yaratıcı yaklaşımımızla, yaşam alanlarınıza değer katmak için buradayız. Bizimle birlikte, evinizi hayal ettiğiniz gibi bir yaşam alanına dönüştürmek için sabırsızlanıyoruz.</p>
          <cite class="footer__author">-Sümeyye, CEO</cite>
        </div>
        <div class="column column--50-25">
          <h2 class="footer__title">Bağlantı Kur</h2>
          <div class="footer__socials">
            <div class="social-icon">
              <i class="fab fa-facebook-f"></i>
              <a class="social__link" href="">Facebook</a>
            </div>
            <div class="social-icon">
              <i class="fab fa-twitter"></i>
              <a class="social__link" href="">Twiter</a>
            </div>

            <div class="social-icon">
              <i class="fab fa-dribbble"></i>
              <a class="social__link" href="">Dribbble</a>
            </div>
            <div class="social-icon">
              <i class="fab fa-pinterest"></i>
              <a class="social__link" href="">Pinterest</a>
            </div>
          </div>
        </div>
        <div class="column column--50-25">
          <h2 class="footer__title">İletişim Kur</h2>
          <div class="contact-icon">
            <i class="fas fa-phone-alt"></i>
            <p class="contact__txt">35325424343553245</p>
          </div>
          <div class="contact-icon">
            <i class="fas fa-envelope"></i>
            <p class="contact__txt">info@evdizayn.com</p>
          </div>
        </div>
      </div>
        <p class="copy">© 2024 Ev Dizayn  <span class="color-span">Hakları Saklıdır</span></p>
    </footer>
<!-- partial -->
  <script  src="{{asset('script.js')}}"></script>

</body>
</html>
