    <table id="id-tbl-banniere">
        <tr>
            <td style="width:20%;">
                    <ul class="nav navbar-nav navbar-right" style="left-margin:-10px;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown" style="margin-top: 5px;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <span>Bonjour,</span> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
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
                :<span id="id-lbl-suivez-nous"></span>
            </td>
            <td>
                <img id="id-img-suivez-nous"
                     src="img/banniere_fr.png"
                     usemap="#banner-map"
                     alt="Suivez-nous sur Facebook, Twitter et YouTube !"/>
            </td>
        </tr>
    </table>
    <hr/>
    <img id="id-img-lappui"
         src="img/lappui.png"
         height="42"
         width="269"
         onclick="javascript:window.open('https://www.lappui.org/');"
         alt="L'Appui pour les proches aidants d'ainés"/>
    <img id="id-img-vous-etes-la"
         src="img/vous-etes-la.png"
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
              href="javascript:toggleLanguage();"
              alt="traduire en anglais">
    </map>