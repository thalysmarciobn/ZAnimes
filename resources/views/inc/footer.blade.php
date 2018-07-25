
<footer id="main-footer">

    <div id="info">
        <div class="container wrap">

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-9 pull-right">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div id="column">
                                        <b>Menu</b>
                                        <ul class="inline-list">
                                            <li><a dhref="">Termos de Uso</a></li>
                                            <li><a href="{{ route('dmca') }}">DMCA</a></li>
                                            <li><a dhref="">Facebook</a></li>
                                            <li><a dhref="">Contato</a></li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div id="column">
                                        <b>Parceiros</b>
                                        <ul class="inline-list">
                                            @if(Request::is('/'))
                                                <li><a href="http://game.micemixy.pro" target="_blank">Transformice Pirata</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div id="logo">
                                <p>Copyright <i class="fa fa-copyright"></i> <strong>{{ config('app.name', 'Laravel') }}</strong> - 2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dev">
        <div class="container wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <p class="dev">
                            Desenvolvido por Thalys Márcio
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
