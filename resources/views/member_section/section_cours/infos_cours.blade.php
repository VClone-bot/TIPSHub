<!-- CONTIENT LE PLANNING DES COURS ET DES INFOS SUR LES GROUPES -->
<!-- AJOUTER UNE SECTION SPECIALE POUR ROBIN ? -->
@extends('layouts.page_template')

@section('head')
<title>Infos cours</title>
@endsection

@section('content')
@if(Session::get('IS_OFFICE') || Session::get('IS_ADMIN'))
  <button class="btn btn-primary btn-lg" style="background-color:#1b1b1b;"><a href="add_cours" style="color:#FFFFFF">Ajouter un cours</a></button>
@endif

<script>
  var choices = document.querySelectorAll('calendar light');
  var maxHeight = 0;
  // read
  for (i = 0; i < choices.length; ++i) {
      maxWidth = Math.max(maxHeight, choices[i].offsetHeight)
  };

  // write
  for (i = 0; i < choices.length; ++i) {
      choices[i].style.height = maxHeight + "px";
  };
</script>

<div class="container d-flex">
<div class="row">
@foreach ($nom_cours as $nom)
<div class="col-md-4 col-md-offset-6">
  <div class="calendar light">
    <div class="calendar_header">
      <h1 class='header_title'>{{ $nom->nom_du_cours }}</h1>
      <p class="header_copy">Plan du cours</p>
    </div>
    <!-- First item -->
    @if(sizeof($cours[$nom->nom_du_cours]) > 0)
      @php $fc = $cours[$nom->nom_du_cours]->first() @endphp
      <div class="calendar_plan">
        <div class="cl_plan">
          <div class="cl_title">Prochain cours @if($fc->presentiel) présentiel @else distanciel @endif</div>
          <div class="cl_copy">{{ date("d-m-Y", strtotime($fc->date)) }} {{ date("H:i", strtotime($fc->heure)) }}<br>
          @if($fc->presentiel)
            <div class="cl_copy">Lieu: {{ $fc->lieu }}</div>        
          @else
            <a href='{{ $fc->lien_visio }}' style="color:#000000; text-decoration:underline;">Lien visio</a><br>
            Mot de passe: {{ $fc->mot_de_passe_visio }}
          @endif
          </div>
        </div>
      </div>       
    @endif
    <div class="calendar_events">
      <p class="ce_title">Cours suivants</p>
      <!-- Following items -->
      @for ($i = 1; $i < sizeof($cours[$nom->nom_du_cours]); $i++)
        <div class="event_item">
          <div class="ei_Title">{{ date("d-m-Y", strtotime($cours[$nom->nom_du_cours][$i]->date)) }} {{ date("H:i", strtotime($cours[$nom->nom_du_cours][$i]->heure)) }}</div>
          <div class="ei_Copy">Cours en @if($cours[$nom->nom_du_cours][$i]->presentiel) présentiel @else distanciel @endif</div>
        </div>
      @endfor
    </div>
  </div>
</div>
@endforeach
</div>
</div>
@endsection

<style>
$off_white:#fafafa;
$light_grey:#A39D9E;
*{
  box-sizing:border-box;
}

body{
  background-color: $off_white;
}

.col-md-4 {
  display: flex;
  flex-direction: row;
}

.container {
  margin: auto;
}

.light{
  background-color: #fff;
}
.dark{
  margin-left: 65px;
}

.calendar{
  width:370px;
  box-shadow: 0px 0px 35px -16px rgba(0,0,0,0.75);
  font-family: 'Roboto', sans-serif;
  padding: 20px 30px;
  color:#363b41;
}

.calendar_header{
  border-bottom: 2px solid rgba(0, 0, 0, 0.08);
}

.header_copy{
  color:$light_grey;
  font-size:20px;
}
.calendar_plan{
  margin:20px 0 40px;
}
.cl_plan{
  width:100%;
  height: 140px;
  background-image: linear-gradient(-222deg, #552D84, #ffa9b7);
  box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
  padding:15px;
  color:#fff;
}
.cl_title{
  font-size:18px;
}
.cl_copy{
  font-size:16px;
  margin: 10px 0;
  display: inline-block;
}

.calendar_events{
  color:$light_grey;
}
.ce_title{
  font-size:14px;
}

.event_item{
  margin: 18px 0;
  padding:5px;
  cursor: pointer;
  &:hover{
    background-image: linear-gradient(-222deg, #FF8494, #ffa9b7);
    box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
    .ei_Dot{
      background-color: #fff;
    }
    .ei_Copy,.ei_Title{
      color:#fff;
    }
  }
}

.ei_Dot,.ei_Title{
  display:inline-block;
}

.ei_Dot{
  border-radius:50%;
  width:10px;
  height: 10px;
  background-color: $light_grey;
  box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
}
.dot_active{
  background-color: #FF8494;
}

.ei_Title{
  margin-left:10px;
  color:#363b41;
}

.ei_Copy{
  font-size:12px;
  margin-left:27px;
}

.dark{
  background-image: linear-gradient(-222deg, #646464, #454545);
  color:#fff;
  .header_title,.ei_Title,.ce_title{
    color:#fff;
  }
  
}
</style>