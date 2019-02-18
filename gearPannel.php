@extends ('layouts/app')

@section('titre') 
    VRT - GEAR PANNEL 
@endsection

@section('script')
    <script src="/js/gearPannelWorking.js"></script>
    <script src="https://secure.xivdb.com/tooltips.js"></script>
@endsection


@section('content') 
    @isset($personnages) 
        @foreach($personnages as $personnage)
            <div id="{{$personnage->id_lodestone}}" class="perso" name="{{$personnage->job}}">
                <!-- card -->
                <div class="card bg-dark">
                    <!-- en-tête, partie cliquable -->
                    <div class="card-header" id="header{{$personnage->id_lodestone}}">
                        <div class="container-fluid">
                            <div class="row" style="color: white;">
                                <div class="col-auto mr-auto">
                                    <div class="row">
                                        <table>
                                            <td id="avatar{{$personnage->id_lodestone}}" class=""></td>
                                            <td id="name{{$personnage->id_lodestone}}" class="info"></td>
                                            <td id="title{{$personnage->id_lodestone}}" class="info"></td>
                                        </table>

                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <table>
                                            <td id="ilvl{{$personnage->id_lodestone}}" class="info"></td>
                                            <td id="class{{$personnage->id_lodestone}}" class="info"></td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- body, partie depliable -->
                    <div class="card-body bg-secondary" id="body{{$personnage->id_lodestone}}">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_mainhand{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/mhand.png" /></div>
                                <div class="col-md-5 row">
                                    
                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="arme"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->arme == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>
        
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_offhand{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/ohand.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="auxiliaire"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->auxiliaire == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_head{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/head.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="tete"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->tete == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>
                                    
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_body{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/body.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="torse"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->torse == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_hands{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/hands.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="main"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->main == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_waist{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/waist.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="ceinture"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->ceinture == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_legs{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/legs.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="jambe"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->jambe == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_feet{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/feet.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="pied"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->pied == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_necklace{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/necklace.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="collier"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->collier == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_earrings{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/earrings.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="boucle_oreille"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->boucle_oreille == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_bracelets{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/bracelets.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="bracelet"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->bracelet == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_ring1{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/ring.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="bague_1"  style="width:80%;">';
                                                  foreach ($cats as $cat){
                                                    if($cat->bague_1 == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-5">
                                    <div id="slot_ring2{{$personnage->id_lodestone}}"></div>
                                </div>
                                <div class="col-md-2 text-center"><img src="/img/ring.png" /></div>
                                <div class="col-md-5 row">

                                        <?php
                                            if(Auth::user()->id == $personnage->id_user){
                                                echo '<select class="ajaxClass valign form-control" id="bague_2"  style="width:80%;">';
                                                foreach ($cats as $cat){
                                                    if($cat->bague_2 == 1){
                                                        echo '<option value="'.$cat->libelle_categorie.'">'.$cat->libelle_categorie.'</option>';
                                                    }
                                                }                                                  
                                                echo '</select><img src="/img/slot.png" class="slot slot-active" />';
                                            }
                                            else echo '<img src="/img/slot.png" class="slot" />';
                                        ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
        @endforeach
    <div class="btnMenu">
        <a href="#app"><button id="btn1" type="button" class="btn btn-default btn-info btnGP"><i class="fas fa-home"></i></button></a>
        <br><br>
        <button id="btn2" type="button" class="btn btn-default btn-info btnGP"><i class="fas fa-times"></i></button>
    </div>

    @endisset 
@endsection
