<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.index') }}">
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.categories.index') }}">
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.news.index') }}">
                    Новости
                </a>
            </li>
        </ul>
    </div>
</nav>
