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
    <div class="modal" id="colorPicker" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Choose a color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-color text-center">
                        <tbody>
                            <tr>
                                @foreach($codes as $color)
                                    <td data-toggle="tooltip" data-placement="top" title="{{ $color['name'] }}" onclick="sendColorRequest({{ $color['id'] }})" class="color" style="background-color: rgb({{ $color['rgb'] }}); color: rgb({{ $color['rgb'] }}); display: inline-block; height: 40px; width: 40px; border-color: #fff; border-style: solid; border-width: 2px;"> </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="colorPicker2" tabindex="-1" role="dialog" aria-labelledby="colorPickerLbl">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="colorPickerLbl">Choose color</h4>
                </div>
                <div class="modal-body">
                    <div class="back-color">
                        <h3 class="h3-color">Select a color</h3>
                        <table class="table-color">
                            <tbody>
                                <tr>
                                    @foreach($codes as $color)
                                        <td data-toggle="tooltip" data-placement="left" title="{{ $color['name'] }}" onclick="sendColorRequest({{ $color['id'] }})" class="color" style="background-color: rgb({{ $color['rgb'] }}); color: rgb({{ $color['rgb'] }}); display: inline-block; height: 40px; width: 40px; border-color: #fff; border-style: solid; border-width: 2px;"> </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <div style="height:240px;width:194px;text-align:center;margin:0 auto;">
                            <div style="position: relative; margin: 11px 4px; height: 1%;">
                                <div style="position: absolute; left: 72px; top: 0px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="head" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->head_color), array_column($codes, 'id'))]['rgb']; }});height:44px;width:44px;"> </div>
                                </div>
                                <div style="position: absolute; left: 0px; top: 52px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="leftarm" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->left_arm_color), array_column($codes, 'id'))]['rgb']; }});height:88px;width:40px;"> </div>
                                </div>
                                <div style="position: absolute; left: 48px; top: 52px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="torso" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->torso_color), array_column($codes, 'id'))]['rgb']; }});height:88px;width:88px;"> </div>
                                </div>
                                <div style="position: absolute; left: 144px; top: 52px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="rightarm" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->right_arm_color), array_column($codes, 'id'))]['rgb']; }});height:88px;width:40px;"> </div>
                                </div>
                                <div style="position: absolute; left: 48px; top: 146px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="leftleg" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->left_leg_color), array_column($codes, 'id'))]['rgb']; }});height:88px;width:40px;"> </div>
                                </div>
                                <div style="position: absolute; left: 96px; top: 146px; cursor: pointer">
                                    <div class="ColorChooserRegion" data-toggle="modal" id="rightleg" data-target="#colorPicker" style="background-color:rgb({{ $codes[array_search(strval($colors->right_leg_color), array_column($codes, 'id'))]['rgb']; }});height:88px;width:40px;"> </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
    <script>
        // Inherited from RBLXhue circa. 2016 (with permission) (semi-cleaned up)
        // Thanks, Raymonf
        var bodyPart = "";
        var main = function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            // Worst code in the history of code:
            // ray wrote it not me
            $("#head").click(function() {
                bodyPart = "head";
            });
            $("#leftarm").click(function() {
                bodyPart = "leftarm";
            });
            $("#torso").click(function() {
                bodyPart = "torso";
            });
            $("#rightarm").click(function() {
                bodyPart = "rightarm";
            });
            $("#leftleg").click(function() {
                bodyPart = "leftleg";
            });
            $("#rightleg").click(function() {
                bodyPart = "rightleg";
            });

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
        }

        function sendColorRequest(color) {
            if(!bodyPart) { return; }

            var request = $.ajax({
                url: "/character/setcolor",
                method: "POST",
                data: { "color": color, "part": bodyPart },
                dataType: "html"
            });

            request.done(function(msg) {
                switch (bodyPart) {
                    case "head":
                        $("#head").css('background-color', 'rgb(' + msg + ')');
                        break;
                    case "torso":
                        $("#torso").css('background-color', 'rgb(' + msg + ')');
                        break;
                    case "leftarm":
                        $("#leftarm").css('background-color', 'rgb(' + msg + ')');
                        break;
                    case "rightarm":
                        $("#rightarm").css('background-color', 'rgb(' + msg + ')');
                        break;
                    case "leftleg":
                        $("#leftleg").css('background-color', 'rgb(' + msg + ')');
                        break;
                    case "rightleg":
                        $("#rightleg").css('background-color', 'rgb(' + msg + ')');
                        break;
                }

                $("#colorPicker").modal('hide');
            }).fail(function(jqXHR, textStatus) {
                alert("Could not set body color.");
            });
        }
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready(main);
    </script>
@endsection