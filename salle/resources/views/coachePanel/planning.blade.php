@extends('layouts.app')
@section('title', 'Planning Hebdomadaire')
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
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                @foreach($plannings as $p)
                                    <tr class="ts-item {{ strtolower($p->jour) }}" data-tsmeta="{{ strtolower($p->jour) }}">
                                        <td class="day-time">{{ $p->cour->titre }}</td>
                                        <td>{{ \Carbon\Carbon::parse($p->heure_debut)->format('g:iA') }} - {{ \Carbon\Carbon::parse($p->heure_fin)->format('g:iA') }}</td>
                                        <td>-</td>
                                        <td>{{ $p->coache->nom_complet ?? $p->nom_complet ?? '-'}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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