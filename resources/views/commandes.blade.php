@extends('layouts.layout0')

@section('title/addFile')
    <title>XManager - Commandes</title>
@endsection

@section('commande')
    active
@endsection

@section('nav')
    <div class="navtous">
        <div class="navtous1">
            <span class="txt">Commandes</span>
        </div>
        <div class="navtous2">
            <i class="f1 fa-solid fa-house fcmd1"></i>
            <span class="f2 fcmd2">|</span>
            <p class="f3 fcmd3">Commandes</p>
        </div>
    </div>
@endsection

@section('table')
    <div class="dataField datacmd">
        <table id="articles">
            <thead>
                <tr>
                    <th id="id">Code commande</th>
                    <th id="id">Fournisseur</th>
                    <th id="id">Vehicule</th>
                    <th id="id">Total</th>
                    <th id="id">Status</th>
                    <th id="id">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($op as $item)
                    <tr>
                        @foreach ($articles as $article)
                            @if ($article->id == $item->article_id)
                                <td id="id">{{$article->code}}</td>
                            @endif
                        @endforeach
                        <td id="id">{{$item->pa }}</td>
                        <td id="id">{{$item->pa}}</td>
                        <td id="id">{{$item->quantite}}</td>
                        <td id="id">{{$item->remise}}</td>
                        <td id="id">
                            <form action="{{route('commande.destroy', ['id' => $id])}}" method="post">
                                @csrf
                                @method('delete')
                                    <button name="delete" value="{{$item->id}}" class="iconAct" type="submit"> 
                                        <i class="fa-solid fa-circle-minus fcmd1s"></i>
                                    </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('tabs')
    <div class="yard2 yardcmd">
        <div id="tsum-tabs">
            <form id="myForm" action="{{route('commande.store')}}" method="post">
                @csrf
                <main>
                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1">Commande</label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2">Vehicule</label>

                <input id="tab3" type="radio" name="tabs">
                <label for="tab3">Articles</label>

                <section id="content1">
                    <div class="myForm">
                            <input id="store_route" type="hidden" id="store_route" value="{{route('article.store')}}">
                            <div class="form-group">
                                <span>Code fournisseurs : </span>
                                <select id="categorie" name="code" class="form-select" aria-label="Default select example">
                                    <option selected>Code Fournisseur</option>
                                    @foreach ($fournisseurs as $fournisseur)
                                        <option value="{{$fournisseur->code}}">{{$fournisseur->code}}</option>
                                    @endforeach
                                </select>

                                <span>Remise : </span>
                                <input id="pv" name="remise" type="text" class="form-control" value="" placeholder="Remise">
                            </div>
                            <button onMouseOver="this.style.color='#7c73e6' ; this.style.background='white'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='white' ; this.style.background='#7c73e6'" 
                            style="color: white; background: #7c73e6; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="submit" name="action" value="enregistrer" class="btn btn-primary ed"
                            id="submit_btn">
                                {{isset($id) ? "Modifier" : "Enregistrer"}}
                            </button>
                            <button onMouseOver="this.style.color='white' ; this.style.background='#7c73e6'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='#7c73e6' ; this.style.background='white'" 
                            style="float: right; color: #7c73e6; background: white; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="button" class="btn btn-primary ed"
                            id="clear_btn">
                                Annuler
                            </button>
                            <br>
                            {{session('msg')}}
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                    </div>
                </section>

                <section id="content2">
                    <div class="myForm">
                            <div class="form-group">
                                <span>Matricule : </span>
                                <input id="matricule" name="matricule" type="text" class="form-control" value="" placeholder="Matricule">

                                <span>MEC : </span>
                                <input id="mec" name="mec" type="text" class="form-control" value="" placeholder="MEC">
                            </div>
                            <button onMouseOver="this.style.color='#7c73e6' ; this.style.background='white'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='white' ; this.style.background='#7c73e6'" 
                            style="color: white; background: #7c73e6; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="submit" class="btn btn-primary ed"
                            id="submit_btn">
                                Enregistrer
                            </button>
                            <button onMouseOver="this.style.color='white' ; this.style.background='#7c73e6'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='#7c73e6' ; this.style.background='white'" 
                            style="float: right; color: #7c73e6; background: white; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="button" class="btn btn-primary ed"
                            id="clear_btn">
                                Annuler
                            </button>
                    </div>
                </section>

                <section id="content3">
                    <div class="myForm">
                            <input id="store_route" type="hidden" id="store_route" value="{{route('article.store')}}">
                            <div class="form-group">
                                <span>Article : </span>
                                <select name="code_article" class="form-select" aria-label="Default select example" placeholder="text">
                                    <option selected>Select</option>
                                    @foreach ($articles as $article)
                                        <option value="{{$article->code}}">{{$article->code}}</option>
                                    @endforeach
                                </select>

                                <span>Designation : </span>
                                <input  name="designation" type="text" class="form-control" placeholder="Designation">

                                <span>P.A : </span>
                                <input  name="pa" type="text" class="form-control" placeholder="P.A">

                                <span>Quantite : </span>
                                <input  name="quantite" type="text" class="form-control" placeholder="Quantite">

                                <span>Remise : </span>
                                <input  name="remise_article" type="text" class="form-control" placeholder="Remise">

                                <span>Remise utilisateur : </span>
                                <input  name="remise_utilisateur" type="text" class="form-control" placeholder="Remise utilisateur">
                            </div>
                            <button onMouseOver="this.style.color='#7c73e6' ; this.style.background='white'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='white' ; this.style.background='#7c73e6'" 
                            style="color: white; background: #7c73e6; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="submit" name="action" value="enregistrer" class="btn btn-primary ed"
                            id="submit_btn">
                                {{isset($id) ? "Modifier" : "Enregistrer"}}
                            </button>
                            <button onMouseOver="this.style.color='white' ; this.style.background='#7c73e6'; this.style.borderColor='#7c73e6'"
                            onMouseOut="this.style.color='#7c73e6' ; this.style.background='white'" 
                            style="float: right; color: #7c73e6; background: white; transition-duration: 0.4s; border:1px solid #7c73e6 ;" 
                            type="button" class="btn btn-primary ed"
                            id="clear_btn">
                                Annuler
                            </button>
                            <br>
                            {{session('msg')}}
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                    </div>
            </form>

                </section>
            </main>
        </div>
    </div>
@endsection