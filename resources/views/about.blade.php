@extends('layout')

@section('content')

<!-- ABOUT -->
<div class="about">
    <div class="about__us">
        <div class="container">
            <div class="row mt-5 mb-5">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-7 pr-0">
                    <div class="flexible">
                        <a href="/">
                            <span>{{__('главная')}}</span>
                        </a>
                        <span>/</span>
                        <h4>{{__('о компании')}}</h4>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-5"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    {!!Block::_('XjaFhOpNU9ovuxoS')!!}
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider about-player">
                    @if($interviews->count())
                        @foreach($interviews as $interview)
                        <div>
                            {!!$interview->lazyIframe!!}
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="purchases__block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    {!!Block::_('YGL3uLmZrfdcnMAz')!!}
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6 col-12 col-md-6">
                    {!!Block::_('kd7GgvxxrRMVFEVU')!!}
                </div>
                <div class="col-xl-6 col-12 col-md-6">
                    {!!Block::_('xniF58UyUrV4OejF')!!}
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="arrowBox">
                        {!!Block::_('ijbwC4bEGmp3ZYAw')!!}
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="smart__shopping">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h1>{{__('Что такое')}} “<span>{{__('SMART SHOPPING')}}</span>”?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="smart__wrapper">
                        <img src="images/smart-shopping_img-01.png">
                        {!!Block::_('3Xjyx6TBXY8mmws8')!!}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="smart__wrapper">
                        <img src="images/smart-shopping_img-02.png">
                        {!!Block::_('Es7yunl3KSL7vLRM')!!}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="smart__wrapper">
                        <img src="images/smart-shopping_img-03.png">
                        {!!Block::_('rdVEPlRukZ1CO5f1')!!}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="smart__wrapper">
                        <img src="images/smart-shopping_img-04.png">
                        {!!Block::_('caeOBGdCA6M7oXfH')!!}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-md-4">
                    <div class="smart__wrapper">
                        <img src="images/smart-shopping_img-05.png">
                        {!!Block::_('U7BdHBzPNDC9cKTI')!!}
                    </div>
                </div>
                <div class="col-xl-4 col-sm-12 col-md-8 col-lg-4">
                    <div class="makeSure">
                        <div>
                            <h1>{{__('Узнайте точно')}}</h1>
                            <div class="no-spacing">
                                {!!Block::_('6tOPu9JcT6fHv2gG')!!}
                            </div>
                            <button type="button" class="getConsultation">{{__('Получить консультацию')}}</button>
                            <div class="no-spacing">
                                {!!Block::_('GQfI1j13nUJYFsFp')!!}
                            </div>
                        </div>
                        <div class="no-spacing">
                            {!!Block::_('lExW48dKxvQSpsmY')!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container text__border" data-text="И это еще не все">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-7 col-lg-7">
                        {!!Block::_('4Tgj268eCPXj6N2V')!!}
                        <ul>
                            <li>
                                {!!Block::_('gv5VeBhgR6o4rVkV')!!}
                            </li>
                            <li>
                                {!!Block::_('iBoN400wg086YSKh')!!}
                            </li>
                            <li>
                                {!!Block::_('bXW4xo1tMfTeG10h')!!}
                            </li>
                            <li>
                                {!!Block::_('1iDBivkL2Mtotrvq')!!}
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-5">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="whyUs">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2>{{__('Сколько у нас бутиков?')}}</h2>
                </div>
                <div class="col-xl-12">
                    <h1>{{__('1000 брендов')}}</h1>
                </div>
                <div class="col-xl-7 col-lg-7"></div>
                <div class="col-xl-5 col-md-6 col-lg-5">
                    <div class="reasons__01">
                        {!!Block::_('2KuzI1u3XbwVbvn3')!!}
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-5">
                    <div class="reasons__02">
                        {!!Block::_('3Gr8oLX1MwL4m6T2')!!}
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">

                </div>
            </div>
        </div>
    </div>

    <div class="quality__wrapper">
        <div class="container quality__container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <h1>{{__('Как у нас с качеством?')}}</h1>
                    {!!Block::_('YcwIwsMHp17pJF6w')!!}
                    <div class="quotes">
                        {!!Block::_('IAczmBIWjF83RYYK')!!}
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    {!!Block::_('Vq0KyoL1SsxpMcpc')!!}
                    <ul>
                        <li>
                            {!!Block::_('EBHC23Gv15LF0uqa')!!}
                        </li>
                        <li>
                            {!!Block::_('2SLemyr1Iv89ir6k')!!}
                        </li>
                        <li>
                            {!!Block::_('udEM0wCQavSIYkzP')!!}
                        </li>
                        <li>
                            {!!Block::_('IHwGiAMuo3SQP3y5')!!}
                        </li>
                        <li>
                            {!!Block::_('yNIXAdIqWFGCIjwz')!!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container whyImportant">
        <div class="row">
            <div class="col-xl-7 col-md-7">
                {!!Block::_('pkQXTlRkyDZV3cuk')!!}
                {!!Block::_('gI4DI9YOYL8Gk4nL')!!}
                <ul>
                    <li>
                        {!!Block::_('TAjZJ0X3gq2apvPA')!!}
                    </li>
                    <li>
                        {!!Block::_('69QV3qjsD8bQ736x')!!}
                    </li>
                    <li>
                        {!!Block::_('hw6rORlxxX4WdNGt')!!}
                    </li>
                </ul>
                {!!Block::_('yzabdeapzcVYYcSh')!!}
            </div>
            <div class="col-xl-5 col-md-5">
                <img src="images/whyImporatntImg.png">
            </div>
        </div>
    </div>

    <div class="instructions__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    {!!Block::_('l6Ieiqe8rarlqW0W')!!}
                </div>
                <div class="col-xl-6 col-md-6">
                    {!!Block::_('3j59dt4heXHgGtpx')!!}
                </div>
                <div class="col-xl-6 col-md-6">
                    <ul>
                        <li>
                            {!!Block::_('uccp4lhAhc43K6xf')!!}
                        </li>
                        <li>
                            {!!Block::_('3hv6kkQTEnWC5tv6')!!}
                        </li>
                        <li>
                            {!!Block::_('K4Yrq0UR4Q5Fkta4')!!}
                        </li>
                        <li>
                            {!!Block::_('0u46LFDuRDh1fNVW')!!}
                        </li>
                        <li>
                            {!!Block::_('AKmjEM1GSFQo9Epr')!!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container app__get">
        <div class="row">
            <div class="col-xl-12">
                {!!Block::_('z2PKyTvUJBMplnbw')!!}
            </div>
            <div class="col-xl-6 col-md-6">
                {!!Block::_('pykgRWrSUUDFqQzo')!!}
                <div class="app__flexer">
                    <img src="images/windows__imac.png">
                    {!!Block::_('GwxTBEdUjb5hCYq7')!!}
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                {!!Block::_('iCGrzFcS7ed7yCaq')!!}
                <div class="app__flexer">
                    <img src="images/android__ios.png">
                    {!!Block::_('h9yxf7903vAu2RlE')!!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT END -->
@endsection
