<nav id="principal">
    <ul>
        <li>
            <a href="{{ route('user.index')}}">
                <i class="fas fa-address-book"></i></i>
                <h3>Usuário</h3>
            </a>
        </li>
                <li>
            <a href="{{ route('institution.index') }}">
                <i class="fas fa-building"></i>
                <h3>Instituições</h3>
            </a>
        </li>
        </li>
                <li>
            <a href="{{ route('group.index') }}">
                <i class="fas fa-users"></i>
                <h3>Grupos</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviment.application') }}">
           <i class="fas fa-money-bill-wave"></i>


                <h3>Investir</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviments.getback') }}">
           <i class="fas fa-money-bill-wave"></i>


                <h3>Resgatar</h3>
            </a>
        </li>
                <li>
            <a href="{{ route('moviment.index') }}">
           <i class="fas fa-dollar"></i>


                <h3>Investimentos</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('moviments.all') }}">
           <i class="fas fa-dollar"></i>


                <h3>Extrato</h3>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i>


                <h3>Sair</h3>
            </a>
        </li>
    </ul>
</nav>