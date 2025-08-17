@extends('layouts.master')
@section('page_title', 'Mon Tableau de Bord')
@section('content')

    @if(Qs::userIsTeamSA())
       <div class="row">
           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-blue-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'student')->count() }}</h3>
                           <span class="text-uppercase font-size-xs font-weight-bold">Total Élèves</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users4 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-danger-400 has-bg-image">
                   <div class="media">
                       <div class="media-body">
                           <h3 class="mb-0">{{ $users->where('user_type', 'teacher')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Professeurs</span>
                       </div>

                       <div class="ml-3 align-self-center">
                           <i class="icon-users2 icon-3x opacity-75"></i>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-success-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-pointer icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'admin')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Administrateurs</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-sm-6 col-xl-3">
               <div class="card card-body bg-indigo-400 has-bg-image">
                   <div class="media">
                       <div class="mr-3 align-self-center">
                           <i class="icon-user icon-3x opacity-75"></i>
                       </div>

                       <div class="media-body text-right">
                           <h3 class="mb-0">{{ $users->where('user_type', 'parent')->count() }}</h3>
                           <span class="text-uppercase font-size-xs">Total Parents</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       @endif

    @if(Qs::userIsTeamSA())
    {{--Accès Rapide--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Accès Rapide</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route('classes.index') }}" class="text-decoration-none">
                        <div class="card card-body bg-primary-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mb-0 text-white">Classes</h6>
                                    <span class="text-white-50 font-size-xs">Gérer les classes</span>
                                </div>
                                <div class="ml-3 align-self-center">
                                    <i class="icon-windows2 icon-2x opacity-75 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route('sections.index') }}" class="text-decoration-none">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mb-0 text-white">Sections</h6>
                                    <span class="text-white-50 font-size-xs">Gérer les sections</span>
                                </div>
                                <div class="ml-3 align-self-center">
                                    <i class="icon-fence icon-2x opacity-75 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route('series.index') }}" class="text-decoration-none">
                        <div class="card card-body bg-warning-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mb-0 text-white">Séries</h6>
                                    <span class="text-white-50 font-size-xs">Gérer les séries</span>
                                </div>
                                <div class="ml-3 align-self-center">
                                    <i class="icon-library2 icon-2x opacity-75 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route('subjects.index') }}" class="text-decoration-none">
                        <div class="card card-body bg-info-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mb-0 text-white">Matières</h6>
                                    <span class="text-white-50 font-size-xs">Gérer les matières</span>
                                </div>
                                <div class="ml-3 align-self-center">
                                    <i class="icon-pin icon-2x opacity-75 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--Fin Accès Rapide--}}
    @endif

    {{--Events Calendar Begins--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Calendrier des Événements Scolaires</h5>
         {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="fullcalendar-basic"></div>
        </div>
    </div>
    {{--Events Calendar Ends--}}
    @endsection
