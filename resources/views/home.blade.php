@extends('default')

@section('content')
    <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')">
      <md-toolbar class=" md-hue-2">
        <span flex></span>
        <div layout="column" layout-align="center center" class="md-toolbar md-toolbar-tools-bottom inset">
          <user-avatar></user-avatar>
          <span></span>
        </div>
      </md-toolbar>
      <md-toolbar class="md-tall md-hue-2">
        <span flex></span>
        <div layout="column" class="md-toolbar-tools-bottom inset" layout-align="center center">
          <div>
			<p class="toolbar">
          Le projet a besoin de vous pour gérer la communication, et répondre aux questions des utilisateurs. Envoyez nous un mail pour nous donner un coup de main.<br>Merci
          </p>
          </div>
          <div>zoubair@alaoui.in</div>
        </div>
      </md-toolbar>
      <md-subheader >Phase 1</md-subheader>  
      <md-list>
	      <md-list-item class=" list-item" layout-align="start center" >
	            <div class="inset">
	              <i class="material-icons">hourglass_empty</i>
	            </div>
	            <div layout="column" layout-align="start center" >
                Atteindre 100 inscriptions
	            </div>
	      </md-list-item>
	    <md-divider></md-divider>
    </md-list>
    </md-sidenav>
    <div layout="column" class="relative" layout-fill role="main">
      <md-toolbar ng-show="!showSearch">
        <div class="md-toolbar-tools">
          <md-button ng-click="toggleSidenav('left')" hide-gt-md aria-label="Menu">
            <md-icon md-svg-src="img/icons/menu.svg"></md-icon>
          </md-button>
          <h3>
            La Passerelle
          </h3>
          <span flex></span>
          <h4 class="nb-inscrit" hide-xs>{{$nbInscriptions}} Inscrits</h4>
        </div>
        <md-tabs md-stretch-tabs class="md-primary" layout-fill flex layout="column" md-selected="data.selectedIndex">
          <md-tab id="tab1" aria-controls="tab1-content">
            DESCRIPTION
          </md-tab>
          <md-tab id="tab2" aria-controls="tab2-content">
            INSCRIPTION
          </md-tab>
        </md-tabs>
      </md-toolbar>

      <md-content flex md-scroll-y>
        <ui-view layout="column" layout-fill layout-padding>
          <div class="inset" hide-sm></div>
            <ng-switch on="data.selectedIndex" class="tabpanel-container">
              <div role="tabpanel"
                   id="tab1-content"
                   aria-labelledby="tab1"
                   ng-switch-when="0"
                   md-swipe-left="next()"
                   md-swipe-right="previous()"
                   layout="row" layout-align="center center">
                  <md-card flex-gt-sm="90" flex-gt-md="80">
                    <md-card-content >
                      <h2>Description</h2>
	                      <div layout="row" layout-sm="column" layout-xs="column" layout-align="center center">
		                      <div flex="65" flex-sm="100" flex-xs="100">
			                      <p class="description">
			                      L'<b>information</b> a toujours été la frontière entre le savoir et l'ignorance, entre la vie et la survie. Aujourd'hui, si l'<b>éducation</b> est la voie vers l'information, l'<b>orientation</b> est la boussole. Pour cela, <b>La Passerelle</b> a un seul objectif: Orienter les jeunes <b>talents</b> <i>Marocains</i>  dans leur parcours scolaire. Pour atteindre cet objectif, votre <b>expérience</b> proffessionelle est importante, et nous vous encourageons à la partager.
			                      <br><br>
									En participant, vous serez invité à répondre à un seul email par semaine au maximum. Dans cet email, un <b>étudiant</b> intéressé, séduit, passionné par votre domaine vous demandera quel était votre <b>parcours</b> scolaire et professionel, ainsi qu'une courte description de votre activité.
									<br>
									Ces informations étant négligeable, voire sans importance pour la plupart d'entre nous, risquent de jouer un rôle crucial dans l'orientation d'innombrables jeunes pour découvrir de nouveaux horizons et saisir des <b>opportunités</b> qui semblent à ce jour improbables.
									</p>
		                        </div>
		                      <div flex>
		                      	<img src="{{asset('images/educ2.png')}}" >
		                      </div>
	                      </div>
                    </md-card-content>
                  </md-card>
              </div>
              <div role="tabpanel"
                   id="tab2-content"
                   aria-labelledby="tab2"
                   ng-switch-when="1"
                   md-swipe-left="next()"
                   md-swipe-right="previous()" 
                   layout="row" layout-align="center center">
                  <md-card flex-gt-sm="90" flex-gt-md="80">
                    <md-card-content>
                      <h2>Inscription</h2>
                      <div layout="row" layout-sm="column" layout-xs="column">
				    		<div flex="60" flex-sm="100" flex-xs="100">
				    			<form class="registration-form"  layout="column"  layout-align="center stretch" >

				    				{!! csrf_field() !!}

						    		<md-input-container flex >
							    		<label>Nom</label>
							    		<input name="last_name" ng-model="user.last_name" type="text" required />
						    		</md-input-container>

						    		<md-input-container flex >
							    		<label>Prénom</label>
							    		<input name="first_name" ng-model="user.first_name" type="text" required/>
						    		</md-input-container>

						    		<div layout="row">
							    		<md-input-container flex >
								    		<label>Domaine</label>
								    		<input name="domain" ng-model="user.domain" type="text" required/>
							    		</md-input-container>
							    		<md-input-container flex >
								    		<label>Spécialité</label>
								    		<input name="skill" ng-model="user.skill" type="text" />
							    		</md-input-container>
						    		</div>

						    		<md-input-container flex >
							    		<label>Email</label>
							    		<input name="email" ng-model="user.email" type="email" required/>
						    		</md-input-container>

						    		<div layout="row" flex layout-align="center center" >
							    		<md-button class="md-fab md-primary md-hue-2 "  ng-click="registerUser($event)">
								            <i class="material-icons" layout="column" layout-align="center center">done</i>
								        </md-button>
							        </div>
						        </form>

						        <div flex hide class="registration-complete">
						        	<h1>Merci de votre participation
						        </div>

				    		</div>
				    		<span flex></span>
				    		<div flex="30" class="graphic-inscription" layout="row" layout-align="center center">
				    			<img src="{{asset('images/mrc2.png')}}" >
				    		</div>
			    		</div>
                    </md-card-content>
                  </md-card>
              </div>
              
          </ng-switch>
          
        </ui-view>
      </md-content>
    </div>
    
@endsection