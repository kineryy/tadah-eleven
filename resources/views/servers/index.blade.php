@inject('user', 'App\Http\Controllers\UsersController')

@extends('layouts.app')

@section('content')
<div id="PlaceTemplate" style="display: none">
	<div style="float:left;">
		<div class="GameItem">
			<div class="AlwaysShown">
				THUMBNAIL
				<div class="GameName" style="font-weight:bold;font-size:12px;overflow: hidden;white-space: nowrap;">
					<a href="GAMENAVIGATEURL">GAMENAME</a>
				</div>
				<div class="PlayerCount" style="color:Red;float:left;">
					CURRENTPLAYERSCOUNT
				</div>
				<div class="GenreIcons" style="float:right;">
					<img class="GenreIcon" alt="GENREICONALT" />
					<img class="GearIcon" alt="GEARICONALT" />
				</div>
				<div class="CreatorName" style="clear:both;display:none;">
					by <a href="CREATORURL">CREATORNAME</a>
				</div>
			</div>
			<div class="HoverShown">
				<div class="StatsPlayed">
					Played PLAYSCOUNT
				</div>
				<div class="StatsFavorited">
					Favorited FAVORITESCOUNT
				</div>
				<div class="StatsUpdated">
					Updated LASTUPDATED
				</div>
			</div>
		</div>
	</div>
</div>
<div class="Column1e">
	<div class="StandardBoxHeader">
		<span>Games </a>
		</span>
	</div>
	<div class="StandardBox" id="GamesLeftColumn" style="padding: 20px 5px;">
		<div id="Timespan" class="GameFilter">
			<div>Time:</div>
			<ul>
				<li><a class='GamesFilter SelectedFilter' filter="Now"
					href="#">Now</a></li>
				<li><a class='GamesFilter ' filter="PastDay"
					href="#">Past Day</a></li>
				<li><a class='GamesFilter ' filter="PastWeek"
					href="#">Past Week</a></li>
				<li><a class='GamesFilter ' filter="AllTime"
					href="#">All Time</a></li>
			</ul>
		</div>
		<div id="Genres" class="GameFilter" style="margin-top:20px;">
			<div>Genres:</div>
			<ul>
				<li>
					<a class='GamesGenre SelectedGenre' genre="all"
						href="/all-games" genresinfotext=""
						title='All Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>All</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="town-and-city"
						href="/town-and-city-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of town and city games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online town and city games with their friends while also meeting new friends. Whether you are interested in Town and City games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Town and City Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Town and City</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="medieval"
						href="/medieval-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of medieval games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online medieval games with their friends while also meeting new friends. Whether you are interested in Medieval games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience."
						title='Fantasy Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Fantasy</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="sci-fi"
						href="/sci-fi-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of sci-fi games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online sci-fi games with their friends while also meeting new friends. Whether you are interested in Sci-Fi games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Sci-Fi Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Sci-Fi</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="ninja"
						href="/ninja-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of ninja games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play ninja games online with their friends while also meeting new friends. Whether you are interested in Ninja games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Ninja Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Ninja</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="scary"
						href="/scary-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of scary games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online scary games with their friends while also meeting new friends. Whether you are interested in scary games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Scary Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Scary</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="pirate"
						href="/pirate-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of pirate games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online pirate games with their friends while also meeting new friends. Whether you are interested in Pirate games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Pirate Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Pirate</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="adventure"
						href="/adventure-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of adventure games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online adventure games with their friends while also meeting new friends. Whether you are interested in Adventure games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Adventure Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Adventure</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="sports"
						href="/sports-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of sports games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online sports games with their friends while also meeting new friends. Whether you are interested in Sports games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Sports Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Sports</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="funny"
						href="/funny-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of funny games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online funny games with their friends while also meeting new friends. Whether you are interested in Funny games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Funny Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Funny</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="wild-west-cowboy"
						href="/wild-west-cowboy-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of wild west cowboy games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online wild west cowboy games with their friends while also meeting new friends. Whether you are interested in Wild West Cowboy games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='Wild West Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Wild West</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="war"
						href="/war-games" genresinfotext="Roblox is proud to offer the web&#39;s best collection of war games, other free online games and 3D virtual worlds. We are committed to making sure that all of our free games are fun and safe. Roblox members can create their own virtual world online games; customize their avatar character with the best virtual goods like hats, shirts and gear; and play free online war games with their friends while also meeting new friends. Whether you are interested in War games, Action games, Adventure games, Funny games, Car games, or even Tycoon games, count on Roblox to deliver the best free online games for you to play. Check out our Builders Club membership service for an enhanced building games experience. "
						title='War Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>War</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="skatepark"
						href="/skatepark-games" genresinfotext=""
						title='Skate Park Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Skate Park</h3>
					</a>
				</li>
				<li>
					<a class='GamesGenre ' genre="gametutorials"
						href="/gametutorials-games" genresinfotext="Game Tutorials - Learn more about ROBLOX virtual world and online games through useful games with game tutorials. ROBLOX also provides game design software to let users design and make a 3D game. Play ROBLOX and the millions of free virtual world and online games now. It&#39;s always free to play games at ROBLOX!"
						title='Tutorial Games'
						onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'Games Genre Page' });">
						<h3>Tutorial</h3>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- Filters / genres -->
</div>
<div class="Column2e">
	<div id="PlayTabs" style="float:left;">
		<!-- DO NOT PUT NEW LINES IN BETWEEN TABS... This will add a 4px margin because of the display: inline-block -->
		<div id="PlayMostPopularTab" class="StandardTabGrayActive GamesSort" sort="MostPopular">
			<span>
				<a href="">
					<h2>Popular</h2>
				</a>
			</span>
		</div>
		<div id="PlayTopFavoritesTab" class="StandardTabGray GamesSort" sort="TopFavorites">
			<span>
				<a href="#">
					<h2>Most Favorited</h2>
				</a>
			</span>
		</div>
		<div id="PlayFeaturedTab" class="StandardTabGray GamesSort" sort="Featured">
			<span>
				<a href="#">
					<h2>Featured</h2>
				</a>
			</span>
		</div>
	</div>
	<div style="position:relative;float:right;">
		<input id="searchbox" type="text" name="search" value="Search" style="color:#888;height:20px;" onKeyPress="if (event.keyCode == 13) { return Search(); }" />
		<div class="SearchIconButton" onclick="Search()"></div>
	</div>
	<div class="StandardBoxGray" style="float: left">
		<div id="Games">
			<div id="BCOnlyPlaces" style='display: none'>
				<div class="StandardBoxHeaderGray">
					<span style="text-align: center; padding-top: 3px; height: 33px;">
						<div class="BCHat" style="position: relative; vertical-align: middle"></div>
						<div id="BCOnlyPlacesTitle">Builders Club Games</div>
					</span>
				</div>
				<div class="StandardBox" style="width: 410px; padding-top: 20px;">
					<div id="BCOnlyGamesContentPrevNavButton" class="SkinnyLeftArrow"></div>
					<div id="BCOnlyGamesContent"></div>
					<div id="BCOnlyGamesContentNextNavButton" class="SkinnyRightArrow"></div>
				</div>
			</div>
			<div id="GamesContent">
				@foreach ($servers as $server)
					<div style="float:left;">
						<div class="GameItem">
							<div class="AlwaysShown">
								<a href="{{ route('servers.server', $server->id) }}" style="text-decoration: none"><img width="160" height="100" src="{{ asset('images/placeholdergame.png') }}"></a>
								<div class="GameName" style="font-weight:bold;font-size:12px;overflow: hidden;white-space: nowrap;">
									<a href="{{ route('servers.server', $server->id) }}">{{ $server->name }}</a>
								</div>
								<div class="PlayerCount" style="color:Red;float:left;">
									0 players online
								</div>
								<div class="CreatorName" style="clear: both; display: none;">
									by <a href="{{ route('users.profile', $server->user->id) }}">{{ $server->user->username }}</a>
								</div>
							</div>
							<div class="HoverShown" style="display: none;">
								<div class="StatsPlayed">
									Played 0 times
								</div>
								<div class="StatsFavorited">
									Favorited 0 times
								</div>
								<div class="StatsUpdated">
									Updated {{ $server->updated_at->diffForHumans() }}
								</div>
							</div>
						</div>						
					</div>
				@endforeach
			</div>
			<div style="text-align:center; padding-bottom:20px;color:#888;font-size:14px; clear:both">
				<div id="GamesContentPrevNavButton" class="BlueLeftArrow" style="position:relative;top:12px;visibility: hidden;" onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'GamesPaging' });"></div>
				<span style="margin:0 5px;"><span id="GamesContentCurrPageNum">1</span> of <span id="GamesContentTotalPageNums"></span></span>
				<div id="GamesContentNextNavButton" class="BlueRightArrow" style="position:relative;top:12px;" onclick="RobloxEventManager.triggerEvent('rbx_evt_generic', { type: 'GamesPaging' });"></div>
			</div>
		</div>
		<div id="GenreDescriptionPanel">
			<span id="GenreDescriptionPanelGenresInfoText"></span> 
		</div>
	</div>
</div>
<br style="clear: both" />
@endsection