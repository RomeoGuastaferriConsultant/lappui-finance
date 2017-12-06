    <table id="id-tbl-banniere">
        <tr>
            <td style="width:20%;">
                    <ul class="nav navbar-nav navbar-right" style="left-margin:-10px;">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="dropdown" style="margin-top: 5px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <span id="id-menu-hello"></span> {{ ucwords(Auth::user()->name) }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                    {{-- section réservée aux admins qui peuvent créer des nouveaux comptes --}}
                                    @can('create', App\User::class)
                                    <li id="id-itm-register">
                                        <a id="id-menu-register" href="{{ route('register') }}"></a>
                                    </li>
                                    @endcan

                                    <li id="id-itm-accueil">
                                        <a id="id-menu-home" href="{{ route('accueil') }}"></a>
                                    </li>

                                    <li>
                                        <a id="id-menu-logout" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
            </td>
            <td style="width:45%; direction:rtl;">
                :<span id="id-lbl-suivez-nous">Suivez-nous</span>
            </td>
            <td>
                <img id="id-img-suivez-nous"
                    @lang('fr')
                     src="{{ asset('img/banniere_fr.png') }}"
                    @elselang('en')
                     src="{{ asset('img/banniere_en.png') }}"
                    @endlang
                     usemap="#banner-map"
                     alt="Suivez-nous sur Facebook, Twitter et YouTube !"/>
            </td>
        </tr>
    </table>
    <hr/>
    <img id="id-img-lappui"
         src="{{ asset('img/lappui.png') }}"
         height="42"
         width="269"
         onclick="javascript:window.open('https://www.lappui.org/');"
         alt="L'Appui pour les proches aidants d'ainés"/>
    <img id="id-img-vous-etes-la"
        @lang('fr')
         src="{{ asset('img/vous-etes-la.png') }}"
        @elselang('en')
         src="{{ asset('img/you care.png') }}"
        @endlang
         height="44"
         width="258"
         alt="L'Appui pour les proches aidants d'ainés"/>
    <map id="banner-map">
        <area shape="circle"
              coords="23,28,12"
              href="https://www.facebook.com/lappui/"
              target="_blank"
              alt="Notre page Facebook">
        <area shape="circle"
              coords="57,28,12"
              href="https://twitter.com/LAppui"
              target="_blank"
              alt="Notre fil Twitter">
        <area shape="circle"
              coords="91,28,12"
              href="https://www.youtube.com/channel/UCIp6M9MLm6quRZfsVRtNRVA"
              target="_blank"
              alt="Notre canal YouTube">
        <area shape="rect"
              coords="129,10,168,45"
              href="javascript:resizeText(-1);"
              alt="Agrandir le texte">
        <area shape="rect"
              coords="174,10,214,45"
              href="javascript:resizeText(+1);"
              alt="Réduire le texte">
        <area shape="rect"
              coords="235,10,275,45"
              href="javascript:locale.toggleLanguage();"
              alt="traduire en anglais">
    </map>