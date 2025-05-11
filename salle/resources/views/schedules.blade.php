@extends('layouts.app')

@section('title', 'Horaires')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<section class="section" id="schedule">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading dark-bg">
                    <h2>Horaires des <em>Cours</em></h2>
                    <img src="{{ asset('images/line-dec.png') }}" alt="">
                    <p>Consultez nos plannings hebdomadaires pour organiser vos séances d'entraînement.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="filters">
                    <ul class="schedule-filter">
                        <li class="active" data-tsfilter="monday">Lundi</li>
                        <li data-tsfilter="tuesday">Mardi</li>
                        <li data-tsfilter="wednesday">Mercredi</li>
                        <li data-tsfilter="thursday">Jeudi</li>
                        <li data-tsfilter="friday">Vendredi</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <div class="schedule-table filtering">
                    <table>
                        <tbody>
                            <tr>
                                <td class="day-time">Cours de Fitness</td>
                                <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                <td>William G. Stewart</td>
                            </tr>
                            <tr>
                                <td class="day-time">Musculation</td>
                                <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Paul D. Newman</td>
                            </tr>
                            <tr>
                                <td class="day-time">Bodybuilding</td>
                                <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                <td>Boyd C. Harris</td>
                            </tr>
                            <tr>
                                <td class="day-time">Yoga</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                <td>Hector T. Daigle</td>
                            </tr>
                            <tr>
                                <td class="day-time">Cours Avancé</td>
                                <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                <td>Bret D. Bowers</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection