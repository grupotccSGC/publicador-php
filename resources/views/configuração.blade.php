@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 d-block pr-5 w-100">
        <h3 class="text mt-5 mb-3">configurações do sistema</h3>
        <p>Aqui o usuário poder alterar as configurações do publicador.</p>
        <div class="container pt-4 pb-4 ml-0">
          <h4 class="text mb-3">Tema</h4>
          <div class="ml-3 mt-4">
            <input type="checkbox" class="checkbox" name="theme" id="chk">
            <label class="label" for="chk">
              <i class="fas fa-moon"></i>
              <i class="fas fa-sun"></i>
              <div class="ball"></div>
            </label>
          </div>
        </div>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>