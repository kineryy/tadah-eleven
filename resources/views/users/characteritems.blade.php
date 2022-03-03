@extends('layouts.app')

@section('title')
Character
@endsection

@section('meta')
<meta property="og:title" content="Character - Tadah" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current(); }}" />
<meta property="og:image" content="/images/tadaht.png" />
<meta property="og:description" content="Change your character" />
<meta name="theme-color" content="#0000FF">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">Character</div>
					<div class="card-body text-center">
						<button id="regenerateThumbnail" class="btn btn-primary btn-block">Regenerate</button>
						<img id="userThumbnail" src="{{ route('users.thumbnail', Auth::user()->id) }}" class="img-fluid" alt="Character image">
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item"><a class="nav-link{!! (!isset($type) ? ' active' : '') !!}" href="{{ route('users.characterbodycolors') }}">Body Colors</a></li>
							<li class="nav-item"><a class="nav-link{!! ($type == "Hat" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'hats') }}">Hats</a></li>
							<li class="nav-item"><a class="nav-link{!! ($type == "T-Shirt" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'tshirts') }}">T-Shirts</a></li>
							<li class="nav-item"><a class="nav-link{!! ($type == "Shirt" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'shirts') }}">Shirts</a></li>
							<li class="nav-item"><a class="nav-link{!! ($type == "Pants" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'pants') }}">Pants</a></li>
							<li class="nav-item"><a class="nav-link{!! ($type == "Face" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'faces') }}">Faces</a></li>
                            <li class="nav-item"><a class="nav-link{!! ($type == "Head" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'heads') }}">Heads</a></li>
                            <li class="nav-item"><a class="nav-link{!! ($type == "Package" ? ' active' : '') !!}" href="{{ route('users.characteritems', 'packages') }}">Packages</a></li>
						</ul>
					</div>
					<div class="card-body">
                        @if ($items->count() > 0)
                            <div class="row mx-auto -mb-2 -m-2">
                                @foreach ($items->all() as $item)
                                    <div class="col-12 col-sm-4 col-md-2 p-2">
                                        <div class="card mb-2 border-0 text-center" style="width: 100%; height: 175px">
                                            <img class="card-img-top" style="object-fit: contain;" src="@if ($item->thumbnail_url) {{ $item->thumbnail_url }} @else {{ route('catalog.getthumbnail', $item->id) }} @endif" width="100" height="100" alt="{{ $item->name }} thumbnail">
                                            <div class="card-body p-1" style="display: block;">
                                                <div class="text-truncate"><a href="{{ route('catalog.item', $item->id) }}">{{ $item->name }}</a></div>
                                                <form method="POST" action="{{ url('/character/toggle/' . $item->id) }}">
                                                    @csrf
                                                    <button type="submit" style="width: 100%" class="btn btn-sm btn-{{ ($item->wearing) ? "danger" : "primary" }}">{{ ($item->wearing) ? "Remove" : "Equip" }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col text-center">
                                <h2>Nothing found</h2>
                                <p>You don't own any items in this category.</p>
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
        // Inherited from RBLXhue circa. 2016 (with permission)
        // Thanks, Raymonf
        $(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			})

            $('#regenerateThumbnail').click(function(evt) {
                $.ajax({
                    type: "POST",
                    url: "/character/regen",
                    success: function (msg){
                        if (msg.startsWith("OK")) {
                            $('#regenerateThumbnail').html("Regenerating");
                            $('#regenerateThumbnail').addClass("disabled");
                            $('#userThumbnail').attr("src", "{{ asset('images/asset-loading.gif') }}");
                        } else {
							$('#regenerateThumbnail').html("In Queue");
                            $('#regenerateThumbnail').addClass("disabled");
                            alert("You're already in the queue!");
                        }
                    }
                });

                evt.preventDefault();
            });
		});
	</script>
@endsection