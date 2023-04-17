<nav class="top-menu-container">
  <div class="logo-header">
    <a href=""><img src="" alt="Anh nay co 2 con vit"></a>
  </div>
  <ul>
    <li>
      <a href="/" class="{{ request()->is('/') ? 'active' :''}}">Home</a>
    </li>
    <li>
      <a href="about"class="{{ request()->is('/') ? 'active' :''}}">About</a>
    </li>
    <li>
      <a href="portfolio"class="{{ request()->is('/') ? 'active' :''}}">Portfolio</a>
    </li>
    <li>
      <a href=""class="{{ request()->is('/') ? 'active' :''}}">Contact</a>
    </li>
  </ul>
</nav>