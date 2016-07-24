@extends('default')

@section('content')
	
	<md-toolbar class="md-hue-2">
      <div class="md-toolbar-tools">
        <h2>
          <span>LA PASSERELLE&nbsp;&nbsp;&nbsp;</span>
        </h2>
        <h6>(PROJECT-PUMPKIN)</h6>
        <div flex></div>
        <md-button class="md-icon-button" aria-label="Settings" >
          <md-icon md-svg-icon="img/icons/menu.svg"></md-icon>
        </md-button>
      </div>
    </md-toolbar>

	<div layout-xs="column" layout-sm="column" layout-md="row" layout-xl="row" ng-controller="AppCtrl"  class="mainContainer">
		
		<md-content  flex  layout="column" class="contentOne">
		    <md-tabs class="" md-selected="data.selectedIndex" md-align-tabs="top" layout-margin>
		    	<md-tab id="tab1">
		    		<md-tab-label>Description</md-tab-label>
			    	<md-tab-body>
			    		<div class="description-tab" layout="row">
			    			<div flex="20">
			    				<img src="{{asset('images/educ2.png')}}" >
			    			</div>

			    			<div flex>
			    				<p>

			    				</p>
			    			</div>
			    		</div>
			    	</md-tab-body>
		    	</md-tab>
		    	<md-tab id="tab2">
		    		<md-tab-label>Inscription</md-tab-label>
			    	<md-tab-body >
			    		<div class="inscription-tab" layout="row">
				    		<div flex>
				    			<form class="registration-form"  layout="column"  layout-align="center stretch" >

				    				{!! csrf_field() !!}

						    		<md-input-container flex >
							    		<label>Nom</label>
							    		<input name="last_name" ng-model="user.last_name" type="text" />
						    		</md-input-container>

						    		<md-input-container flex >
							    		<label>Prénom</label>
							    		<input name="first_name" ng-model="user.first_name" type="text" />
						    		</md-input-container>

						    		<md-input-container flex >
							    		<label>Spécialité</label>
							    		<input name="skill" ng-model="user.skill" type="text" />
						    		</md-input-container>

						    		<md-input-container flex >
							    		<label>Email</label>
							    		<input name="email" ng-model="user.email" type="email" />
						    		</md-input-container>

						    		<div layout="row" flex layout-align="center center" >
							    		<md-button class="md-fab md-primary md-hue-2" type="submit" aria-label="Comment" ng-click="registerUser($event)">
								            <md-icon md-font-set="material-icons" > done </md-icon>
								        </md-button>
							        </div>
						        </form>

						        <div flex class="registration-complete">
						        	<h1>Merci de votre participation
						        </div>

				    		</div>
				    		<div flex class="graphic-inscription" layout="row" layout-align="center center">
				    			<img src="{{asset('images/mrc2.png')}}" >
				    		</div>
			    		</div>
			    	</md-tab-body>
		    	</md-tab>
		    </md-tabs>

		</md-content>

		<md-sidenav layout="column" class="right-side-nav" flex="25" md-is-locked-open='true'>
		
			<md-content layout-margin layout="column" layout-align="start center" md-theme="docs-dark">
					
				<h4><span>PROJECT PUMPKIN</span></h4>
				<h1>100 inscriptions</h1>
				<p >
					L'objectif que nous nous sommes mis est d'atteindre 100 inscriptions avant de développer l'application web. Cette phase peut durer entre un et deux mois. Durant le developpement, certains parmi vous seront	contacter via email pour tester et évaluer l'application pour donner des propositions et des pistes d'améliorations. 
					<br><br>
					Le projet est mis à votre disposition. Vous pouvez consulter le code source sur github
					<a href="https://github.com/alaouizoubair/project-pumpkin" class="md-caption" target="_blank"> 
						<md-icon style="color:gold;" md-font-set="material-icons" > cloud </md-icon>
					</a>.
					<br><br>
					Le nom du projet reste le votre à choisir. Envoyez moi vos propositions dans un premier lieu. 
					Je préparerai ensuite un vote pour choisir le meilleur nom.


				</p>
				<br><br>
				<form method="POST" action="{{route('user.create')}}" layout="row" layout-align="center center"  >
					<md-input-container  flex="80">
			    		<label>www.exemple.com</label>
			    		<input nam="sample" ng-model="user.suggestion" />
		    		</md-input-container>

		    		<a ng-click="sendSuggestion()" href="#">
		    			<md-icon md-font-set="material-icons" class="send-link" flex="10"> send </md-icon>
		    		</a>
		    		
	    		</form>
			            
	
			</md-content>
			
		</md-sidenav>
	</div>
	

@endsection