<div class="sidebar close">
    <div class="logo-details">
        <i class='bx bxs-dashboard' style='color:#ffffff'></i>      
        <span class="logo_name">CodeAtlas</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="/perfil">
          <i class='bx bxs-user-rectangle' style='color:#ffffff' ></i>
          <span class="link_name">Meu Perfil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/perfil">Meu Perfil</a></li>
        </ul>
      </li>
      <li>
      <li>
        <a href="/dashboard">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/dashboard">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <li>
            <a href="/midia">
                <i class='bx bx-images'></i>              
                <span class="link_name">Midia</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/midia">Midia</a></li>
            </ul>
          </li>
          <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Publicar</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Publicar</a></li>
          <li><a href="#">Matéria</a></li>
          <li><a href="/album">Album</a></li>
          <li><a href="#">Seções</a></li>
        </ul>
      </li>
      <li>
        <a href="/usuario">
            <i class='bx bx-user-circle' style='color:#ffffff' ></i>            
            <span class="link_name">Usuarios</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/usuario">Usuarios</a></li>
        </ul>
      </li>
      <li>
        <a href="/fale-conosco">
          <i class='bx bxs-contact' style='color:#ffffff' ></i>
          <span class="link_name">Fale conosco</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/fale-conosco">Fale conosco</a></li>
        </ul>
      </li>
      <li>
        <a href="/depoimento">
          <i class='bx bx-spreadsheet'></i>
          <span class="link_name">Depoimentos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/depoimento">Depoimentos</a></li>
        </ul>
      </li>
      <li>
        <a href="/configurações">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Configuração</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/configurações">Configuração</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{ asset(Auth::user()->avatar) }}" alt="{{Auth::user()->nome}}">
      </div>
      <div class="name-job">
        <div class="profile_name">{{Auth::user()->nome}}</div>
        <div class="job">{{Auth::user()->nivel_acesso}}</div>
      </div>
      <a href="/logout"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
  </div>
 
  