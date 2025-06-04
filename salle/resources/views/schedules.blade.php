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
                @if(auth()->user() && auth()->user()->isMember()) <!-- Check if the user is a member -->
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
                @else <!-- If not a member, show blurred content and card -->
                    <div class="schedule-table filtering" style="filter: blur(3px); position: relative;">
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
                    <div class="overlay-card" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); display: flex; justify-content: center; align-items: center; color: white; text-align: center;">
                        <div class="card" style="background-color: #333; padding: 20px; border-radius: 10px;">
                            <h3 class="text-white">Devenez membre pour voir plus!</h3>
                            <p>Inscrivez-vous dès aujourd'hui pour accéder à tous les cours et plus encore.</p>
                            <a href="{{ route('membership') }}" class="btn" style="background-color: #ed563b;color:white" onmouseover="this.style.backgroundColor='#d04a2b'" onmouseout="this.style.backgroundColor='#ed563b'">Devenir membre</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection