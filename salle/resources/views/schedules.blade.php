@extends('layouts.app')

@section('title', 'Horaires')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
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
            <!-- Filter Buttons -->
            <div class="col-lg-12">
                <div class="filters">
                    <ul class="schedule-filter">
                        <li class="active" data-tsfilter="lundi">Lundi</li>
                        <li data-tsfilter="mardi">Mardi</li>
                        <li data-tsfilter="mercredi">Mercredi</li>
                        <li data-tsfilter="jeudi">Jeudi</li>
                        <li data-tsfilter="vendredi">Vendredi</li>
                    </ul>
                </div>
            </div>

            <!-- Schedule Table -->
            <div class="col-lg-10 offset-lg-1">
                @if(auth()->user() && auth()->user()->isMember())
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                @foreach($plannings as $p)
                                    <tr class="ts-item {{ strtolower($p->jour) }}" data-tsmeta="{{ strtolower($p->jour) }}">
                                        <td class="day-time">{{ $p->cour->titre }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->heure_debut)->format('g:iA') }} - {{ \Carbon\Carbon::parse($p->heure_fin)->format('g:iA') }}</td>
                                        <td>-</td>
                                        <td>{{ $p->coache->nom_complet }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Blurred dummy table -->
                    <div class="schedule-table filtering" style="filter: blur(3px); position: relative;">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time">Cours de Fitness</td>
                                    <td class="monday ts-item show" data-tsmeta="lundi">10:00AM - 11:30AM</td>
                                    <td class="tuesday ts-item" data-tsmeta="mardi">2:00PM - 3:30PM</td>
                                    <td>William G. Stewart</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Musculation</td>
                                    <td class="friday ts-item" data-tsmeta="vendredi">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="jeudi" data-tsmeta="vendredi">2:00PM - 3:30PM</td>
                                    <td>Paul D. Newman</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Bodybuilding</td>
                                    <td class="tuesday ts-item" data-tsmeta="mardi">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="lundi">2:00PM - 3:30PM</td>
                                    <td>Boyd C. Harris</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga</td>
                                    <td class="wednesday ts-item" data-tsmeta="mercredi">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="vendredi">2:00PM - 3:30PM</td>
                                    <td>Hector T. Daigle</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Cours Avancé</td>
                                    <td class="thursday ts-item" data-tsmeta="jeudi">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="mercredi">2:00PM - 3:30PM</td>
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

<!-- Filtering script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filters = document.querySelectorAll('.schedule-filter li');
        const items = document.querySelectorAll('.ts-item');

        filters.forEach(filter => {
            filter.addEventListener('click', function () {
                filters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');

                const day = this.getAttribute('data-tsfilter');

                items.forEach(item => {
                    const parent = item.closest('tr');
                    if (parent.classList.contains(day)) {
                        parent.style.display = '';
                    } else {
                        parent.style.display = 'none';
                    }
                });
            });
        });

        // Trigger default (lundi) filter
        document.querySelector('.schedule-filter li.active').click();
    });
</script>
@endsection
